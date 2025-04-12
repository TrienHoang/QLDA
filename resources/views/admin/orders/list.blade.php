@extends('admin.layouts.main');
{{-- @php
dd($orders);
@endphp --}}

@section('title')
    Order List Page
@endsection

@section('content')
    <!-- Table Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>Order List</h5>
                            <a href="{{ route('admin.orders.trashed') }}" class="btn btn-solid">Thùng rác</a>
                            {{-- <a href="#" class="btn btn-solid">Download all orders</a> --}}
                        </div>
                        <!-- Form tìm kiếm -->
                        <div class="mb-3">
                            <form method="GET" action="{{ route('admin.orders.index') }}">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control"
                                        placeholder="Tìm kiếm theo Mã đơn hàng hoặc trạng thái"
                                        value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary">Tìm</button>
                                </div>
                            </form>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table all-package order-table theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Order Code</th>
                                            <th>Date</th>
                                            <th>Orderer</th>
                                            <th>Payment Method</th>
                                            <th>Delivery Status</th>
                                            <th>Amount</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $order)
                                            <tr data-bs-toggle="offcanvas" href="#order-details">
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->created_at->format('M d, Y') }}</td>
                                                <td>
                                                    {{ $order->user->name }}
                                                </td>
                                                <td>{{ $order->payment->payment_method ?? 'N/A' }}</td>
                                                <!-- Giả sử bảng payments có cột method -->
                                                @php
                                                    $status = strtolower($order->status); // đảm bảo viết thường hết cho chắc
                                                    if ($status === 'completed') {
                                                        $class = 'order-success';
                                                    } elseif ($status === 'cancelled') {
                                                        $class = 'order-cancle';
                                                    } else {
                                                        $class = 'order-pending';
                                                    }
                                                @endphp

                                                <td class="{{ $class }}">
                                                    <span>{{ ucfirst($order->status) }}</span>
                                                </td>
                                                <td>${{ number_format($order->total_price, 2) }}</td>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('admin.orders.show', $order) }}"
                                                                title="Xem chi tiết">
                                                                <i class="ri-eye-line"></i>
                                                            </a>
                                                        </li>
                                                        {{-- <li>
                                                            <a href="{{ route('admin.orders.show', $order) }}" title="Chỉnh sửa">
                                                                <i class="ri-pencil-line"></i>
                                                            </a>
                                                        </li> --}}
                                                        <li>
                                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                data-bs-target="#deleteModal{{ $order->id }}"
                                                                title="Xóa">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </a>
                                                        </li>
                                                        {{-- <li>
                                                            <a class="btn btn-sm btn-solid text-white" href="{{ route('orders.track', $order) }}">
                                                                Tracking
                                                            </a>
                                                        </li> --}}
                                                    </ul>
                                                </td>
                                            </tr>
                                            <!-- Modal xác nhận xóa -->
                                            <div class="modal fade" id="deleteModal{{ $order->id }}" tabindex="-1"
                                                aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Bạn có chắc muốn chuyển đơn hàng #{{ $order->id }} vào thùng
                                                            rác?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Hủy</button>
                                                            <form action="{{ route('admin.orders.destroy', $order) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Xóa</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Không có đơn hàng nào.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Phân trang -->
                        <div class="mt-3">
                            {{ $orders->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
