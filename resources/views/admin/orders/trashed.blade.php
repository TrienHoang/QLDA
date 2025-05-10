@extends('admin.layouts.main');

@section('title')
Order Track Page
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="title-header option-title">
                        <h5>Đơn hàng đã xóa</h5>
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-solid">Quay lại danh sách đơn hàng</a>
                    </div>
                    <!-- Form tìm kiếm -->
                    <div class="mb-3">
                        <form method="GET" action="{{ route('admin.orders.trashed') }}">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm theo ID, User ID hoặc trạng thái" value="{{ request('search') }}">
                                <button type="submit" class="btn btn-primary">Tìm</button>
                            </div>
                        </form>
                    </div>
                    <div>
                        <div class="table-responsive">
                            <table class="table all-package order-table theme-table" id="table_id">
                                <thead>
                                    <tr>
                                        {{-- <th>Order Image</th> --}}
                                        <th>Order Code</th>
                                        <th>Ngày xóa</th>
                                        <th>Payment Method</th>
                                        <th>Delivery Status</th>
                                        <th>Amount</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($trashedOrders as $order)
                                        <tr>
                                            {{-- <td>
                                                <a class="d-block">
                                                    <span class="order-image">
                                                        @if ($order->orderDetails->isNotEmpty() && $order->orderDetails->first()->product->image)
                                                            <img src="{{ asset('storage/' . $order->orderDetails->first()->product->image) }}" class="img-fluid" alt="product">
                                                        @else
                                                            <img src="{{ asset('assets/images/product/default.png') }}" class="img-fluid" alt="default">
                                                        @endif
                                                    </span>
                                                </a>
                                            </td> --}}
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->deleted_at ? $order->deleted_at->format('M d, Y') : 'N/A' }}</td>
                                            <td>{{ $order->payment->payment_method ?? 'N/A' }}</td>
                                            <td class="{{ $order->status == 'completed' ? 'order-success' : ($order->status == 'pending' ? 'order-pending' : 'order-cancle') }}">
                                                <span>{{ ucfirst($order->status) }}</span>
                                            </td>
                                            <td>${{ number_format($order->total_price, 2) }}</td>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <form action="{{ route('admin.orders.restore', $order->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Bạn có chắc muốn khôi phục đơn hàng #{{ $order->id }}?')">
                                                                <i class="ri-refresh-line"></i> Khôi phục
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('admin.orders.forceDelete', $order->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa vĩnh viễn đơn hàng #{{ $order->id }}?')">
                                                                <i class="ri-delete-bin-line"></i> Xóa vĩnh viễn
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Không có đơn hàng nào trong thùng rác.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Phân trang -->
                    <div class="mt-3">
                        {{ $trashedOrders->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection