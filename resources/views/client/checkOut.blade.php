@extends('client.layouts.main')

@section('content')
    <!-- checkout-area start -->
    <section class="checkout-area pt-80 pb-85">
        <div class="container">
            <!-- Hiển thị thông báo lỗi và thành công -->
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf
                <div class="row">
                    <!-- Billing Details -->
                    <div class="col-lg-8">
                        <div class="checkbox-form">
                            <h3 class="mb-30">Billing Details</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Full Name <span class="required">*</span></label>
                                        <input type="text" name="name"
                                            value="{{ old('name', auth()->user()->name ?? '') }}" placeholder="Nguyễn Văn A"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email <span class="required">*</span></label>
                                        <input type="email" name="email"
                                            value="{{ old('email', auth()->user()->email ?? '') }}"
                                            placeholder="you@example.com" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Phone Number <span class="required">*</span></label>
                                        <input type="text" name="phone"
                                            value="{{ old('phone', auth()->user()->phone ?? '') }}"
                                            placeholder="0123 456 789" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Shipping Address <span class="required">*</span></label>
                                        <input type="text" name="shipping_address"
                                            value="{{ old('shipping_address', auth()->user()->address ?? '') }}"
                                            placeholder="123 Nguyễn Trãi, Q1, TP.HCM" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Note (Optional)</label>
                                        <textarea name="note" placeholder="Ghi chú đơn hàng nếu có...">{{ old('note') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Cart Summary -->
                    <div class="col-lg-4">
                        <div class="shop_cart_widget xc-accordion">
                            <div class="accordion" id="shop_size">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="size__widget">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#size_widget_collapse" aria-expanded="true"
                                            aria-controls="size_widget_collapse">Shopping Cart</button>
                                    </h2>
                                    <div id="size_widget_collapse" class="accordion-collapse collapse show"
                                        aria-labelledby="size__widget" data-bs-parent="#shop_size">
                                        <div class="accordion-body">
                                            <!-- Coupon Form -->
                                            <div class="cart-coupon-code mb-20">
                                                <div class="coupon-input-group">
                                                    <input type="text" name="coupon_code" placeholder="Nhập mã giảm giá"
                                                        value="{{ old('coupon_code') }}" >
                                                    <button type="submit" name="apply_coupon" value="1">Áp dụng</button>
                                                </div>
                                                @error('coupon_code')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <!-- Gửi dữ liệu giỏ hàng -->
                                            @if ($cart && $cart->details)
                                                @foreach ($cart->details as $index => $item)
                                                    <input type="hidden" name="cart[{{ $index }}][product_id]"
                                                        value="{{ $item->product_id }}">
                                                    <input type="hidden" name="cart[{{ $index }}][quantity]"
                                                        value="{{ $item->quantity }}">
                                                @endforeach
                                            @else
                                                <div class="alert alert-warning">
                                                    Giỏ hàng trống. Vui lòng thêm sản phẩm trước khi thanh toán.
                                                </div>
                                            @endif

                                            <div class="cart-checkout">
                                                <h4>Shipping</h4>
                                                <div class="shop__widget-list">
                                                    <div class="shop__widget-list-item-2 has-orange">
                                                        <input type="radio" name="pay" id="c-Free">
                                                        <label for="c-Free">Free shipping</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Payment -->
                                            <div class="cart-checkout">
                                                <h4>Payment Method</h4>
                                                <div class="shop__widget-list">
                                                    @foreach ($payments as $payment)
                                                        <div class="shop__widget-list-item-2">
                                                            <input type="radio" name="payment_id"
                                                                id="payment_{{ $payment->id }}"
                                                                value="{{ $payment->id }}">
                                                            <label
                                                                for="payment_{{ $payment->id }}">{{ $payment->payment_method }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <!-- Cart Total -->
                                            <div class="cart-totails">
                                                <h4>Total</h4>
                                                <h4 class="subtotal-amount">
                                                    {{ number_format($cart->total_price ?? 0, 0, ',', '.') }}
                                                    VND</h4>
                                            </div>

                                            <!-- Submit -->
                                            <button type="submit" class="cart-checkout-btn">Place Order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
