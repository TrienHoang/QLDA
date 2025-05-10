@extends('admin.layouts.main');

@section('title')
    Order Details Page
@endsection

{{-- @php
dd($order);
@endphp --}}
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Thông tin tổng quan -->
                        <div class="title-header title-header-block package-card">
                            <div>
                                <h5>Order #{{ $order->id }}</h5>
                            </div>
                            <div class="card-order-section">
                                <ul>
                                    <li>{{ $order->created_at->format('F d, Y \a\t h:i A') }}</li>
                                    <li>{{ $order->orderDetails->count() }} items</li>
                                    <li>Total ${{ number_format($order->total_price, 2) }}</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Form chỉnh sửa trạng thái -->
                        <div class="mb-4">
                            <div class="mb-4">
                                <form action="{{ route('admin.orders.update', $order) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row g-2 align-items-end">
                                        <div class="col-auto">
                                            <label for="status" class="form-label">Trạng thái đơn hàng</label>
                                            <select name="status" id="status"
                                                class="form-select @error('status') is-invalid @enderror">
                                                @foreach (\App\Models\Order::$statusTransitions[$order->status] as $allowedStatus)
                                                    <option value="{{ $allowedStatus }}"
                                                        {{ $order->status == $allowedStatus ? 'selected' : '' }}>
                                                        {{ ucfirst($allowedStatus) }}
                                                    </option>
                                                @endforeach
                                                <!-- Luôn hiển thị trạng thái hiện tại -->
                                                @if (!in_array($order->status, \App\Models\Order::$statusTransitions[$order->status]))
                                                    <option value="{{ $order->status }}" selected>
                                                        {{ ucfirst($order->status) }}</option>
                                                @endif
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-primary"
                                                {{ empty(\App\Models\Order::$statusTransitions[$order->status]) ? 'disabled' : '' }}>
                                                Cập nhật trạng thái
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                @if (session('success'))
                                    <div class="alert alert-success mt-2">{{ session('success') }}</div>

                                    @php
                                        // Xóa thông báo sau khi hiển thị
                                        session()->forget('success');
                                    @endphp
                                @endif
                            </div>

                            <!-- Bảng chi tiết sản phẩm -->
                            <div class="bg-inner cart-section order-details-table">
                                <div class="row g-4">
                                    <div class="col-xl-8">
                                        <div class="table-responsive table-details">
                                            <table class="table cart-table table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">Items</th>
                                                        <th class="text-end" colspan="2">
                                                            <a href="javascript:void(0)" class="theme-color">Edit Items</a>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($order->orderDetails as $detail)
                                                    {{-- @php
                                                    dd($detail);
                                                    @endphp --}}
                                                        <tr class="table-order">
                                                            <td>
                                                                <a href="javascript:void(0)">
                                                                    <img src="{{ $detail->product && $detail->product->image ? asset('storage/' . $detail->product->image) : asset('assets/images/product/default.png') }}"
                                                                        class="img-fluid blur-up lazyload"
                                                                        alt="{{ $detail->product->name ?? 'N/A' }}">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <p>Product Name</p>
                                                                <h5>{{ $detail->product->name ?? 'N/A' }}</h5>
                                                            </td>
                                                            <td>
                                                                <p>Quantity</p>
                                                                <h5>{{ $detail->quantity }}</h5>
                                                            </td>
                                                            <td>
                                                                <p>Price</p>
                                                                <h5>${{ number_format($detail->price, 2) }}</h5>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="4">Không có sản phẩm nào trong đơn hàng.</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                                <tfoot>
                                                    <tr class="table-order">
                                                        <td colspan="3">
                                                            <h5>Subtotal :</h5>
                                                        </td>
                                                        <td>
                                                            <h4>${{ number_format($order->orderDetails->sum('total_price'), 2) }}
                                                            </h4>
                                                        </td>
                                                    </tr>
                                                    <tr class="table-order">
                                                        <td colspan="3">
                                                            <h5>Shipping :</h5>
                                                        </td>
                                                        <td>
                                                            <h4>${{ number_format($order->shipping_fee ?? 0, 2) }}</h4>
                                                        </td>
                                                    </tr>
                                                    <tr class="table-order">
                                                        <td colspan="3">
                                                            <h5>Tax(GST) :</h5>
                                                        </td>
                                                        <td>
                                                            <h4>${{ number_format($order->tax ?? 0, 2) }}</h4>
                                                        </td>
                                                    </tr>
                                                    <tr class="table-order">
                                                        <td colspan="3">
                                                            <h4 class="theme-color fw-bold">Total Price :</h4>
                                                        </td>
                                                        <td>
                                                            <h4 class="theme-color fw-bold">
                                                                ${{ number_format($order->total_price, 2) }}</h4>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- Thông tin bổ sung -->
                                    <div class="col-xl-4">
                                        <div class="order-success">
                                            <div class="row g-4">
                                                <h4>Summery</h4>
                                                <ul class="order-details">
                                                    <li>Order ID: {{ $order->id }}</li>
                                                    <li>Order Date: {{ $order->created_at->format('F d, Y') }}</li>
                                                    <li>Order Total: ${{ number_format($order->total_price, 2) }}</li>
                                                </ul>

                                                <h4>Shipping Address</h4>
                                                <ul class="order-details">
                                                    <li>{{ $order->user->name ?? 'N/A' }}</li>
                                                    <li>{{ $order->shipping_address ?? 'N/A' }}</li>
                                                    <li>Contact No. {{ $order->user->phone ?? 'N/A' }}</li>
                                                </ul>

                                                <div class="payment-mode">
                                                    <h4>Payment Method</h4>
                                                    <p>{{ $order->payment->method ?? 'Pay on Delivery' }}</p>
                                                </div>

                                                <div class="delivery-sec">
                                                    <h3>Expected Date of Delivery:
                                                        <span>{{ $order->expected_delivery_date ? \Carbon\Carbon::parse($order->expected_delivery_date)->format('F d, Y') : 'N/A' }}</span>
                                                    </h3>
                                                    {{-- <a href="{{ route('orders.track', $order) }}">Track Order</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
