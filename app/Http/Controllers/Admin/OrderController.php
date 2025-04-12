<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Runner\Baseline\Writer;

class OrderController extends Controller
{
    // Danh sách đơn hàng
    public function index(Request $request)
    {
        $query = Order::with(['user', 'orderDetails.product', 'payment']);

        // Tìm kiếm theo order ID, user_id hoặc status
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('id', 'like', '%' . $search . '%')
                    //   ->orWhere('user_id', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%');
            });
        }

        $orders = $query->latest()->paginate(5);

        return view('admin.orders.list', compact('orders'));
    }

    // Hiển thị chi tiết đơn hàng
    public function show(Order $order)
    {
        $order->load(['user', 'orderDetails.product', 'payment', 'coupon']);
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,completed,cancelled',
        ]);

        $newStatus = $request->status;

        // Kiểm tra xem trạng thái mới có hợp lệ không
        if (!$order->canTransitionTo($newStatus)) {
            return redirect()->route('admin.orders.show', $order)
                ->withErrors(['status' => "Không thể chuyển từ '$order->status' sang '$newStatus'."]);
        }

        // Cập nhật trạng thái
        $order->update(['status' => $newStatus]);

        return redirect()->route('admin.orders.show', $order)
            ->with('success', "Cập nhật trạng thái đơn hàng thành '$newStatus' thành công.");
    }

    // Xóa đơn hàng
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Đơn hàng đã được xóa.');
    }

    //     public function download()
    // {
    //     $orders = Order::with(['orderDetails'])->get();
    //     $csv = Writer::createFromFileObject(new \SplTempFileObject());
    //     $csv->insertOne(['ID', 'User ID', 'Total Price', 'Status', 'Created At']);
    //     foreach ($orders as $order) {
    //         $csv->insertOne([$order->id, $order->user_id, $order->total_price, $order->status, $order->created_at]);
    //     }
    //     return response($csv->output('orders.csv'), 200, [
    //         'Content-Type' => 'text/csv',
    //         'Content-Disposition' => 'attachment; filename="orders.csv"',
    //     ]);
    // }

    // Danh sách đơn hàng đã xóa
    public function trashed(Request $request)
    {
        $query = Order::onlyTrashed()->with(['user', 'orderDetails.product', 'payment']);

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('id', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%');
            });
        }

        $trashedOrders = $query->latest('deleted_at')->paginate(10);

        return view('admin.orders.trashed', compact('trashedOrders'));
    }

    // Khôi phục đơn hàng
    public function restore($id)
    {
        $order = Order::onlyTrashed()->findOrFail($id);
        $order->restore();

        return redirect()->route('admin.orders.trashed')
            ->with('success', "Đơn hàng #{$order->id} đã được khôi phục thành công.");
    }

    // Xóa vĩnh viễn đơn hàng
    public function forceDelete($id)
    {
        $order = Order::onlyTrashed()->findOrFail($id);
        $order->forceDelete();

        return redirect()->route('admin.orders.trashed')
            ->with('success', "Đơn hàng #{$order->id} đã được xóa vĩnh viễn.");
    }
}
