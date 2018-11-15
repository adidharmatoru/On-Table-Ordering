@extends('layouts.app')

@section('content')
    <!-- Reset -->
    <section class="section-reservation bg1-pattern p-t-100 p-b-113">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-b-30">
                    <div class="t-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <span class="tit2 t-center">
							Little Grass
						</span>

                        <h3 class="tit3 t-center m-b-35 m-t-2">
                            Reset Password
                        </h3>
                    </div>

                    <form class="wrap-form-reservation size22 m-l-r-auto" method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="row">

                            <div class="col-md-12">
                                <!-- Email -->
                                <span class="txt9">
									E-Mail Address
								</span>

                                <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23 txt10 m-10 pos-relative">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" type="email" name="email" value="{{ $email }}" required autofocus placeholder="E-Mail Address">
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

                            <div class="col-md-6">
                                <!-- Password -->
                                <span class="txt9">
									Password
								</span>

                                <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23 txt10 m-10 pos-relative">
                                    <input id="password" type="password" class="bo-rad-10 sizefull txt10 p-l-20{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                                    <i class="fa fa-key ab-r-m m-r-18" aria-hidden="true"></i>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Password -->
                                <span class="txt9">
									Password Confirmation
								</span>

                                <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23 txt10 m-10 pos-relative">
                                    <input id="password-confirm" type="password" class="bo-rad-10 sizefull txt10 p-l-20" name="password_confirmation" required placeholder="Password">
                                    <i class="fa fa-key ab-r-m m-r-18" aria-hidden="true"></i>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="wrap-btn-booking flex-c-m m-t-6">
                            <!-- Button3 -->
                            <button type="submit" class="btn3 flex-c-m size17 txt11 trans-0-4">
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
