@extends('layouts.app')

@section('content')
    <section class="section-reservation bg1-pattern p-t-100 p-b-113">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-b-30">
                    <div class="t-center">
                        @if($errors->any())
                            <div class="row collapse">
                                <ul class="alert-box warning radius">
                                    @foreach($errors->all() as $error)
                                        <li> {{ $error }} </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <span class="tit2 t-center">
							Little Grass
						</span>

                        <h3 class="tit3 t-center m-b-35 m-t-2">
                            Update Profile
                        </h3>
                    </div>

                    <form class="wrap-form-reservation size22 m-l-r-auto" method="POST" action="{{ route('update') }}">
                        @csrf
                        <div class="row">

                            <div class="col-md-12">
                                <!-- Email -->
                                <span class="txt9">
									E-Mail Address
								</span>

                                <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23 txt10 m-10 pos-relative">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20{{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" type="email" name="email" value="{{Auth::user()->email}}" required autofocus placeholder="E-Mail Address">
                                    <i class="fa fa-envelope ab-r-m m-r-18" aria-hidden="true"></i>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <!-- Name -->
                                <span class="txt9">
									Name
								</span>

                                <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23 txt10 m-10 pos-relative">
                                    <input id="name" type="text" class="bo-rad-10 sizefull txt10 p-l-20{{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{Auth::user()->name}}" required placeholder="Name">
                                    <i class="fa fa-user-circle ab-r-m m-r-18" aria-hidden="true"></i>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <!-- Password -->
                                <span class="txt9">
									Phone Number
								</span>

                                <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23 txt10 m-10 pos-relative">
                                    <input id="phone_num" type="tel" class="bo-rad-10 sizefull txt10 p-l-20{{ $errors->has('phone_num') ? 'is-invalid' : '' }}" name="phone_num" value="{{Auth::user()->phone_num}}" required placeholder="Phone Number">
                                    <i class="fa fa-fw fa-phone ab-r-m m-r-18" aria-hidden="true"></i>
                                    @if ($errors->has('phone_num'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_num') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Password -->
                                <span class="txt9">
									Address
								</span>

                                <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23 txt10 m-10 pos-relative">
                                    <input id="address" type="text" class="bo-rad-10 sizefull txt10 p-l-20" name="address" value="{{Auth::user()->address}}" required placeholder="Address">
                                    <i class="fa fa-fw fa-address-book ab-r-m m-r-18" aria-hidden="true"></i>
                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="wrap-btn-booking flex-c-m m-t-6">
                            <!-- Button3 -->
                            <button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
