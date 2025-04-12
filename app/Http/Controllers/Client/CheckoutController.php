<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function showCheckoutForm()
    {
        // Lấy giỏ hàng từ session hoặc database
        $cart = session()->get('cart', []);
        $products = Product::whereIn('id', array_keys($cart))->get();

        return view('checkout', compact('cart', 'products'));
    }

    public function processCheckout(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'shipping_address' => 'required|string|max:255',
            'payment_id' => 'nullable|exists:payments,id',
            'coupon_id' => 'nullable|exists:coupons,id',
            'cart' => 'required|array',
            'cart.*.product_id' => 'required|exists:products,id',
            'cart.*.quantity' => 'required|integer|min:1',
        ]);

        // Lấy thông tin người dùng
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để thanh toán.');
        }

        // Lấy giỏ hàng
        $cart = $request->input('cart');
        $shipping_fee = $request->input('shipping_fee', 0);
        $tax = $request->input('tax', 0);

        try {
            DB::beginTransaction();

            // Tính tổng tiền
            $total_price = 0;
            foreach ($cart as $item) {
                $product = Product::findOrFail($item['product_id']);
                if ($product->stock < $item['quantity']) {
                    throw new \Exception("Sản phẩm {$product->name} không đủ tồn kho.");
                }
                $total_price += $item['quantity'] * $product->price;
            }

            // Áp dụng phí vận chuyển và thuế
            $total_price += $shipping_fee + $tax;

            // Tạo đơn hàng
            $order = Order::create([
                'user_id' => $user->id,
                'total_price' => $total_price,
                'status' => 'pending',
                'payment_id' => $request->payment_id,
                'coupon_id' => $request->coupon_id,
                'shipping_address' => $request->shipping_address,
                'shipping_fee' => $shipping_fee,
                'tax' => $tax,
            ]);

            // Tạo chi tiết đơn hàng
            foreach ($cart as $item) {
                $product = Product::findOrFail($item['product_id']);
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                    'total_price' => $item['quantity'] * $product->price,
                ]);

                // Cập nhật tồn kho
                $product->stock -= $item['quantity'];
                $product->save();
            }

            // Xóa giỏ hàng
            session()->forget('cart');

            DB::commit();

            return redirect()->route('order.confirmation', $order->id)
                            ->with('success', 'Đặt hàng thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Lỗi khi đặt hàng: ' . $e->getMessage());
        }
    }

    public function showConfirmation(Order $order)
    {
        // Chỉ cho phép người dùng xem đơn hàng của họ
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        return view('order_confirmation', compact('order'));
    }
}
