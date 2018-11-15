@extends('layouts.app')

@section('content')

    <!-- Slide1 -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1 item1-slick1" style="background-image: url(images/slide1-01.jpg);">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
                            Welcome to
                        </span>

                        <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                            Little Grass
                        </h2>

                        <div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
                            <!-- Button1 -->
                            @guest
                                <a href="{{ route('login') }}" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                    Login Now!
                                    @endguest

                                    @auth
                                        <a href="{{ route('home') }}" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                            Order Now!
                                            @endauth
                                        </a>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 item2-slick1" style="background-image: url(images/master-slides-02.jpg);">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
                            Welcome to
                        </span>

                        <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                            Little Grass
                        </h2>

                        <div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
                            <!-- Button1 -->
                            @guest
                                <a href="{{ route('login') }}" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                    Login Now!
                                    @endguest

                                    @auth
                                        <a href="{{ route('home') }}" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                            Order Now!
                                            @endauth
                                        </a>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 item3-slick1" style="background-image: url(images/master-slides-01.jpg);">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
                            Welcome to
                        </span>

                        <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                            Little Grass
                        </h2>

                        <div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
                            <!-- Button1 -->
                            @guest
                                <a href="{{ route('login') }}" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                    Login Now!
                                    @endguest

                                    @auth
                                        <a href="{{ route('home') }}" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                            Order Now!
                                            @endauth
                                        </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="wrap-slick1-dots"></div>
        </div>
    </section>

<!-- Welcome -->
<section class="section-welcome bg1-pattern p-t-120 p-b-105">
    <div class="container">
        <div class="row">
            <div class="col-md-6 p-t-45 p-b-30">
                <div class="wrap-text-welcome t-center">
                        <span class="tit2 t-center">
                            Balinese Restaurant
                        </span>

                    <h3 class="tit3 t-center m-b-35 m-t-5">
                        Welcome
                    </h3>

                    <p class="t-center m-b-22 size3 m-l-r-auto">
                        Little Grass Cafe adalah cafetaria sederhana dengan konsep nyaman dan banyak tumbuhan gantung untuk menambah kesan sejuk dan hijau. Dengan menu makanan yang unik dan ramah di kantong untuk membuat nongkrong kalian makin asik!
                    </p>

                    <a href="/about" class="txt4">
                        Our Story
                        <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            <div class="col-md-6 p-b-30">
                <div class="wrap-pic-welcome size2 bo-rad-10 hov-img-zoom m-l-r-auto">
                    <img src="images/our-story-01.jpg" alt="IMG-OUR">
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Video -->
    <section class="section-video parallax100" style="background-image: url(images/bg-cover-video-02.jpg);">
        <div class="content-video t-center p-t-225 p-b-250">
            <span class="tit2 p-l-15 p-r-15">
                Discover
            </span>

            <h3 class="tit4 t-center p-l-15 p-r-15 p-t-3">
                Our Profile Video
            </h3>

            <div class="btn-play ab-center size16 hov-pointer m-l-r-auto m-t-43 m-b-33" data-toggle="modal" data-target="#modal-video-01">
                <div class="flex-c-m sizefull bo-cir bgwhite color1 hov1 trans-0-4">
                    <i class="fa fa-play fs-18 m-l-2" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Video 01-->
    <div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog" role="document" data-dismiss="modal">
            <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

            <div class="wrap-video-mo-01">
                <div class="w-full wrap-pic-w op-0-0"><img src="images/icons/video-16-9.jpg" alt="IMG"></div>
                <video id="video" class="video-mo-01" src="2018-11-05 07-20-37.mp4" type="video/mp4" controls></video>
            </div>
        </div>
    </div>

<!-- Our menu -->
<section class="section-ourmenu bg2-pattern p-t-115 p-b-120">
    <div class="container">
        <div class="title-section-ourmenu t-center m-b-22">
                <span class="tit2 t-center">
                    Discover
                </span>

            <h3 class="tit5 t-center m-t-2">
                Our Menu
            </h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Item our menu -->
                        <div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
                            <img src="images/40133554_2065037687093795_5761314021852577792_n.jpg" alt="IMG-MENU">

                            <!-- Button2 -->
                            <a href="#" class="btn2 flex-c-m txt5 ab-c-m size4">
                                Main
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Item our menu -->
                        <div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
                            <img src="images/37734259_2030671107197120_7472824391563214848_n.jpg" alt="IMG-MENU">

                            <!-- Button2 -->
                            <a href="#" class="btn2 flex-c-m txt5 ab-c-m size4">
                                Beverage
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Item our menu -->
                        <div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
                            <img src="images/39536055_2059081621022735_4971973675084414976_n.jpg" alt="IMG-MENU">

                            <!-- Button2 -->
                            <a href="#" class="btn2 flex-c-m txt5 ab-c-m size7">
                                Snack
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Item our menu -->
                        <div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
                            <img src="images/37933236_2034394220158142_7285693143217864704_n.jpg" alt="IMG-MENU">

                            <!-- Button2 -->
                            <a href="#" class="btn2 flex-c-m txt5 ab-c-m size8">
                                Dessert
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

    </div>
</section>


<!-- Event -->
<section class="section-event">
    <div class="wrap-slick2">
        <div class="slick2">
            <div class="item-slick2 item1-slick2" style="background-image: url(images/bg-event-01.jpg);">
                <div class="wrap-content-slide2 p-t-115 p-b-208">
                    <div class="container">
                        <!-- - -->
                        <div class="title-event t-center m-b-52">
                                <span class="tit2 p-l-15 p-r-15">
                                    Little Grass
                                </span>

                            <h3 class="tit6 t-center p-l-15 p-r-15 p-t-3">
                                Special Menu
                            </h3>
                        </div>

                        <!-- Block2 -->
                        <div class="blo2 flex-w flex-str flex-col-c-m-lg animated visible-false" data-appear="zoomIn">
                            <!-- Pic block2 -->
                            <a href="#" class="wrap-pic-blo2 bg1-blo2" style="background-image: url(images/{{$special->image}});">
                                <div class="time-event size10 txt6 effect1">
                                        <span class="txt-effect1 flex-c-m t-center">
                                            {{$time}}
                                        </span>
                                </div>
                            </a>

                            <!-- Text block2 -->
                            <div class="wrap-text-blo2 flex-col-c-m p-l-40 p-r-40 p-t-45 p-b-30">
                                <h4 class="tit7 t-center m-b-10">
                                    {{$special->title}}
                                </h4>

                                <p class="t-center">
                                    {{$special->description}}
                                </p>

                                <div class="flex-sa-m flex-w w-full m-t-40">
                                    <div class="size11 flex-col-c-m">
                                            <span class="dis-block t-center txt7 m-b-2 hours">
                                            </span>

                                        <span class="dis-block t-center txt8">
                                                Jam
                                            </span>
                                    </div>

                                    <div class="size11 flex-col-c-m">
                                            <span class="dis-block t-center txt7 m-b-2 minutes">
                                            </span>

                                        <span class="dis-block t-center txt8">
                                                Menit
                                            </span>
                                    </div>

                                    <div class="size11 flex-col-c-m">
                                            <span class="dis-block t-center txt7 m-b-2 seconds">
                                            </span>

                                        <span class="dis-block t-center txt8">
                                                Detik
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrap-slick2-dots"></div>
    </div>
</section>

<!-- Review -->
<section class="section-review p-t-115">
    <!-- - -->
    <div class="title-review t-center m-b-2">
            <span class="tit2 p-l-15 p-r-15">
                Customers Say
            </span>

        <h3 class="tit8 t-center p-l-20 p-r-15 p-t-3">
            Review
        </h3>
    </div>

    <!-- - -->
    <div class="wrap-slick3">
        <div class="slick3">
            @foreach($rate as $rat)
            <div class="item-slick3 item1-slick3">
                <div class="wrap-content-slide3 p-b-50 p-t-50">
                    <div class="container">
                        <div class="pic-review size14 bo4 wrap-cir-pic m-l-r-auto animated visible-false" data-appear="zoomIn">
                            <img src="images/{{$rat->products->image}}" alt="IGM-AVATAR">
                        </div>
                        <div class="more-review txt4 t-center animated visible-false m-t-32" data-appear="fadeInUp">
                            {{$rat->products->title}}
                        </div>
                        <div class="content-review m-t-33 animated visible-false" data-appear="fadeInUp">
                            <p class="t-center txt12 size15 m-l-r-auto">
                                “ {{$rat->comment}} ”
                            </p>

                            <div class="star-review fs-18 color0 flex-c-m m-t-12">
                                @for($i=0;$i<$rat->rate;$i++)
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                    @endfor
                            </div>

                            <div class="more-review txt4 t-center animated visible-false m-t-32" data-appear="fadeInUp">
                                {{$rat->users->name}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

            <!-- <div class="item-slick3 item2-slick3">
                <div class="wrap-content-slide3 p-b-50 p-t-50">
                    <div class="container">
                        <div class="pic-review size14 bo4 wrap-cir-pic m-l-r-auto animated visible-false" data-appear="zoomIn">
                            <img src="images/avatar-04.jpg" alt="IGM-AVATAR">
                        </div>

                        <div class="content-review m-t-33 animated visible-false" data-appear="fadeInUp">
                            <p class="t-center txt12 size15 m-l-r-auto">
                                “ We are lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tellus sem, mattis in pre-tium nec, fermentum viverra dui ”
                            </p>

                            <div class="star-review fs-18 color0 flex-c-m m-t-12">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                            </div>

                            <div class="more-review txt4 t-center animated visible-false m-t-32" data-appear="fadeInUp">
                                Marie Simmons ˗ New York
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-slick3 item3-slick3">
                <div class="wrap-content-slide3 p-b-50 p-t-50">
                    <div class="container">
                        <div class="pic-review size14 bo4 wrap-cir-pic m-l-r-auto animated visible-false" data-appear="zoomIn">
                            <img src="images/avatar-05.jpg" alt="IGM-AVATAR">
                        </div>

                        <div class="content-review m-t-33 animated visible-false" data-appear="fadeInUp">
                            <p class="t-center txt12 size15 m-l-r-auto">
                                “ We are lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tellus sem, mattis in pre-tium nec, fermentum viverra dui ”
                            </p>

                            <div class="star-review fs-18 color0 flex-c-m m-t-12">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                            </div>

                            <div class="more-review txt4 t-center animated visible-false m-t-32" data-appear="fadeInUp">
                                Marie Simmons ˗ New York
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

        </div>

        <div class="wrap-slick3-dots m-t-30"></div>
    </div>
</section>

<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>


@endsection
