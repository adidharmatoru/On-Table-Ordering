@extends('layouts.app')

@section('content')
    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/bg-title-page-01.jpg);">
        <h2 class="tit6 t-center">
            Menu
        </h2>
    </section>

    <!-- Main menu -->
    <section class="section-mainmenu p-t-110 p-b-70 bg1-pattern">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-6 p-r-35 p-r-15-lg m-l-r-auto">
                    <div class="wrap-item-mainmenu p-b-22">
                        <h3 class="tit-mainmenu tit10 p-b-25">
                            SNACK
                        </h3>
                        <!-- Item mainmenu -->
                        @foreach($snack as $sna)
                        <div class="item-mainmenu m-b-36">
                            <div class="flex-w flex-b m-b-3">
                                <a href="#" class="name-item-mainmenu txt21">
                                    {{$sna->title}}
                                </a>

                                <div class="line-item-mainmenu bg3-pattern"></div>

                                <div class="price-item-mainmenu txt22">
                                    Rp {{$sna->price}}
                                </div>
                            </div>

                            <span class="info-item-mainmenu txt23">
								{{$sna->description}}
							</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-10 col-lg-6 p-l-35 p-l-15-lg m-l-r-auto">
                    <div class="wrap-item-mainmenu p-b-22">
                        <h3 class="tit-mainmenu tit10 p-b-25">
                            Main
                        </h3>

                        <!-- Item mainmenu -->
                        @foreach($main as $ma)
                        <div class="item-mainmenu m-b-36">
                            <div class="flex-w flex-b m-b-3">
                                <a href="#" class="name-item-mainmenu txt21">
                                    {{$ma->title}}
                                </a>

                                <div class="line-item-mainmenu bg3-pattern"></div>

                                <div class="price-item-mainmenu txt22">
                                    Rp {{$ma->price}}
                                </div>
                            </div>

                            <span class="info-item-mainmenu txt23">
								{{$ma->description}}
							</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-10 col-lg-6 p-l-35 p-l-15-lg m-l-r-auto">
                    <div class="wrap-item-mainmenu p-b-22">
                        <h3 class="tit-mainmenu tit10 p-b-25">
                            Beverage
                        </h3>

                        <!-- Item mainmenu -->
                        @foreach($beverage as $ma)
                            <div class="item-mainmenu m-b-36">
                                <div class="flex-w flex-b m-b-3">
                                    <a href="#" class="name-item-mainmenu txt21">
                                        {{$ma->title}}
                                    </a>

                                    <div class="line-item-mainmenu bg3-pattern"></div>

                                    <div class="price-item-mainmenu txt22">
                                        Rp {{$ma->price}}
                                    </div>
                                </div>

                                <span class="info-item-mainmenu txt23">
								{{$ma->description}}
							</span>
                            </div>
                        @endforeach
                    </div>
                </div>



                <div class="col-md-10 col-lg-6 p-l-35 p-l-15-lg m-l-r-auto">
                    <div class="wrap-item-mainmenu p-b-22">
                        <h3 class="tit-mainmenu tit10 p-b-25">
                            Dessert
                        </h3>

                        <!-- Item mainmenu -->
                        @foreach($dessert as $ma)
                            <div class="item-mainmenu m-b-36">
                                <div class="flex-w flex-b m-b-3">
                                    <a href="#" class="name-item-mainmenu txt21">
                                        {{$ma->title}}
                                    </a>

                                    <div class="line-item-mainmenu bg3-pattern"></div>

                                    <div class="price-item-mainmenu txt22">
                                        Rp {{$ma->price}}
                                    </div>
                                </div>

                                <span class="info-item-mainmenu txt23">
								{{$ma->description}}
							</span>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
