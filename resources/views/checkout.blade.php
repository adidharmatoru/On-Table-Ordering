@extends('layouts.app')

@section('content')
    <style>

        [type="radio"]:checked,
        [type="radio"]:not(:checked) {
            position: absolute;
            left: -9999px;
        }
        [type="radio"]:checked + label,
        [type="radio"]:not(:checked) + label
        {
            position: relative;
            padding-left: 28px;
            cursor: pointer;
            line-height: 20px;
            display: inline-block;
            color: #666;
        }
        [type="radio"]:checked + label:before,
        [type="radio"]:not(:checked) + label:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 18px;
            height: 18px;
            border: 1px solid #ddd;
            border-radius: 100%;
            background: #fff;
        }
        [type="radio"]:checked + label:after,
        [type="radio"]:not(:checked) + label:after {
            content: '';
            width: 12px;
            height: 12px;
            background: #669D31;
            position: absolute;
            top: 3px;
            left: 3px;
            border-radius: 100%;
            -webkit-transition: all 0.2s ease;
            transition: all 0.2s ease;
        }
        [type="radio"]:not(:checked) + label:after {
            opacity: 0;
            -webkit-transform: scale(0);
            transform: scale(0);
        }
        [type="radio"]:checked + label:after {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1);
        }
    </style>
    @php($total = 0)
    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/bg-title-page-01.jpg);">
        <h2 class="tit6 t-center">
            Little Grass
        </h2>
    </section>
                <!-- Content page -->
                <section class="section-reservation bg1-pattern">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="bread-crumb bo5-b p-t-17 p-b-17">
                        <div class="container">
                            <a href="{{route('home')}}" class="txt27">
                                Menu
                            </a>
                            >
                            <a href="{{route('checkout')}}" class="txt27">
                                Checkout
                            </a>
                        </div>
                    </div>

                    <div class="container" style="margin-top: 30px">
                        <div class="row">
                            <div class="col-md-4 order-md-2 mb-4">
                                <h4 class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-muted">Your cart</span>
                                    <span class="badge badge-secondary badge-pill">{{$counts}}</span>
                                </h4>
                                <ul class="list-group mb-3">
                                    @foreach($cart as $row)
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div>
                                            <h6 class="my-0">{{$row->products->title}} x {{$row['qty']}}</h6>
                                            <small class="text-muted">Rp {{$row->products->price}}</small>
                                        </div>
                                        <span class="text-muted">Rp {{$row->products->price*$row['qty']}}</span>
                                    </li>
                                        @php($total += $row->products->price*$row['qty'])
                                    @endforeach
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Total (Rp)</span>
                                        <strong>Rp {{$total}}</strong>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-8 order-md-1">
                                <h4 class="mb-3">Billing</h4>
                                <form class="needs-validation" novalidate="" action="{{'payment'}}" method="POST">
                                    @csrf
                                    <input type="text" hidden name="total" value="{{$total}}">
                                    <div class="row">
                                        <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23 txt10 m-10 pos-relative">
                                            <input type="text" class="bo-rad-10 sizefull txt10 p-l-20" id="name" name="name" placeholder="Name" value="{{Auth::user()->name}}" required="">
                                            <div class="invalid-feedback">
                                                Valid name is required.
                                            </div>
                                        </div>
                                        <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23 txt10 m-10 pos-relative">
                                            <input type="email" class="bo-rad-10 sizefull txt10 p-l-20" name="email" id="email" placeholder="Email" value="{{Auth::user()->email}}" required="">
                                            <div class="invalid-feedback">
                                                Valid email is required.
                                            </div>
                                        </div>

                                        <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23 txt10 m-10 pos-relative">
                                            <input type="text" class="bo-rad-10 sizefull txt10 p-l-20" name="address" id="address" placeholder="Address" value="{{Auth::user()->address}}" required="">
                                            <div class="invalid-feedback">
                                                Valid address is required.
                                            </div>
                                        </div>
                                        <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23 txt10 m-10 pos-relative">
                                            <input type="text" class="bo-rad-10 sizefull txt10 p-l-20" name="address" id="phonenum" placeholder="Phone Number" value="{{Auth::user()->phone_num}}" required="">
                                            <div class="invalid-feedback">
                                                Valid Phone Number is required.
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="mb-4">
                                    <h4 class="mb-3">Payment</h4>
                                    <div class="d-block my-3">
                                        <div class="">
                                            <input id="credit" name="paymentMethod" value="balance" type="radio" class="" required="" @if(Auth::user()->balance < $total) disabled @else checked @endif >
                                            <label class="" for="credit"><i class="fa fa-dollar"></i> Balance @if(Auth::user()->balance < $total) <span class="text-danger">(Balance tidak mencukupi)</span> @endif</label>
                                        </div>
                                        <div class="">
                                            <input id="cashier" name="paymentMethod" value="cashier" type="radio" class="" required="">
                                            <label class="" for="cashier"><i class="fa fa-money"></i> Cashier</label>
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <button class="btn3 size12 txt11" type="submit">Continue to checkout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
@endsection
