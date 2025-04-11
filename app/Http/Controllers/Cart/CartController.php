<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartDetail;
class CartController extends Controller
{

    public function listCart() {
        $cart = Cart::with('details.product')->where('user_id', Auth::id())->first();

        // Nếu không có giỏ hàng hoặc giỏ hàng trống
        if (!$cart || $cart->details->isEmpty()) {
            return view('client.cart.list-cart', [
                'cart' => null,
                'isEmpty' => true
            ])->with('message', 'Giỏ hàng của bạn đang trống');
        }
        return view('client.cart.list-cart', compact('cart'));
    }

    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);
    
        $product = Product::findOrFail($validated['product_id']);
        $user_id = Auth::id();
        
        // Tìm hoặc tạo giỏ hàng
        $cart = Cart::firstOrCreate(
            ['user_id' => $user_id],
            ['total_price' => 0]
        );
    
        // Kiểm tra sản phẩm đã có trong giỏ chưa
        $cartDetail = CartDetail::where('cart_id', $cart->id)
                              ->where('product_id', $product->id)
                              ->first();
    
        if ($cartDetail) {
            // Cập nhật số lượng nếu đã có
            $cartDetail->quantity += $validated['quantity'];
            $cartDetail->total_price = $cartDetail->quantity * $product->price;
            $cartDetail->save();
        } else {
            // Thêm mới nếu chưa có
            CartDetail::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => $validated['quantity'],
                'price' => $product->price,
                'total_price' => $validated['quantity'] * $product->price,
            ]);
        }
    
        // Cập nhật tổng giỏ hàng
        $cart->refresh(); // Làm mới dữ liệu quan hệ
        $cart->total_price = $cart->details->sum('total_price');
        $cart->save();
    
        return redirect()->route('cart.listCart')->with('success', 'Đã thêm sản phẩm vào giỏ hàng');
    }

    public function remove($id) {
        try {
            // Tìm chi tiết giỏ hàng
            $cartDetail = CartDetail::with('cart')->find($id);
            
            // Kiểm tra nếu không tìm thấy chi tiết giỏ hàng
            if (!$cartDetail) {
                return redirect()->back()->with('error', 'Không tìm thấy sản phẩm trong giỏ hàng');
            }
            
            // Kiểm tra xem giỏ hàng có thuộc về người dùng hiện tại không
            if ($cartDetail->cart->user_id != Auth::id()) {
                return redirect()->back()->with('error', 'Bạn không có quyền xóa sản phẩm này');
            }
            
            // Lưu lại cart_id để cập nhật tổng giá
            $cartId = $cartDetail->cart_id;
            
            // Xóa chi tiết giỏ hàng
            $cartDetail->delete();
            
            // Cập nhật tổng giá giỏ hàng
            $cart = Cart::find($cartId);
            if ($cart) {
                $cart->total_price = $cart->details->sum('total_price');
                $cart->save();
            }
            
            return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    // public function update(Request $request, $id) {
    //     $validated = $request->validate([
    //         'quantity' => 'required|integer|min:1'
    //     ]);
    
    //     $cartDetail = CartDetail::findOrFail($id);
        
    //     // Kiểm tra quyền sở hữu
    //     if ($cartDetail->cart->user_id != Auth::id()) {
    //         return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
    //     }
    
    //     // Cập nhật số lượng
    //     $cartDetail->quantity = $validated['quantity'];
    //     $cartDetail->total_price = $cartDetail->quantity * $cartDetail->price;
    //     $cartDetail->save();
    
    //     // Cập nhật tổng giá giỏ hàng
    //     $cart = $cartDetail->cart;
    //     $cart->total_price = $cart->details->sum('total_price');
    //     $cart->save();
    
    //     return response()->json([
    //         'success' => true,
    //         'new_total' => $cart->total_price
    //     ]);
    // }
    
}
