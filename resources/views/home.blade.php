@extends('layouts.app')

@section('content')
    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/bg-title-page-01.jpg);">
        <h2 class="tit6 t-center">
            Little Grass
        </h2>
    </section>
                <!-- Content page -->
                <section>
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
                        </div>
                    </div>

                    <div class="container">
                        <div class="row ">
                            <div class="col-md-8 col-lg-9">
                                <div class=" bo5-r p-r-50 h-full p-r-0-md bo-none-md">
                                    <div class="container">
                                        <div id="fetch_product" class="row p-t-50 p-b-70">
                                            @include('products')
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-3">
                                <div class="sidebar2 p-t-50 p-b-80 p-l-20 p-l-0-md p-t-0-md">
                                    <!-- Search -->
                                    <div class="search-sidebar2 size12 bo2 pos-relative">
                                        <input id="searchBox" class="input-search-sidebar2 txt10 p-l-20 p-r-55" type="text" name="search" placeholder="Search">
                                        <button class="btn-search-sidebar2 flex-c-m ti-search trans-0-4"></button>
                                    </div>

                                    <!-- Categories -->
                                    <div class="categories">
                                        <h4 class="txt33 bo5-b p-b-35 p-t-58">
                                            Categories
                                        </h4>

                                        <ul>
                                            @foreach($categories as $cat)
                                            <li class="bo5-b p-t-8 p-b-8">
                                                <a id="{{$cat->id}}" href="#" class="txt27 cat">
                                                    {{$cat->title}}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- Most Popular
                                    <div class="popular">
                                        <h4 class="txt33 p-b-35 p-t-58">
                                            Most popular
                                        </h4>

                                        <ul>
                                            <li class="flex-w m-b-25">
                                                <div class="size16 bo-rad-10 wrap-pic-w of-hidden m-r-18">
                                                    <a href="#">
                                                        <img src="images/blog-11.jpg" alt="IMG-BLOG">
                                                    </a>
                                                </div>

                                                <div class="size28">
                                                    <a href="#" class="dis-block txt28 m-b-8">
                                                        Nasi Ayam Katsu Sambal Embe
                                                    </a>

                                                    <span class="txt14">
											<button class="m-t-10 btn3 flex-c-m size1 txt8 trans-0-4 addtocart"><i class="fa fa-plus"></i> Add</button>
										</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        </div>
                    </div>
                </section>
@endsection
