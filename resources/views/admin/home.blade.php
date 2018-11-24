@extends('layouts.admin')
@section('content')
@php($total = 0)
@foreach ($income as $in)
@php($total += $in->amount)
@endforeach
    <div class="sidebar-overlay" id="sidebar-overlay"></div>
    <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
    <div class="mobile-menu-handle"></div>
    <article class="content dashboard-page">
        <section class="section">
            <div class="row sameheight-container">
                <div class="col col-12 col-sm-12 col-md-6 col-xl-8 stats-col">
                    <div class="card sameheight-item stats" data-exclude="xs">
                        <div class="card-block">
                            <div class="title-block">
                                <h4 class="title"> Stats </h4>
                            </div>
                            <div class="row row-sm stats-container">
                                <div class="col-12 col-sm-6 stat-col">
                                    <div class="stat-icon">
                                        <i class="fa fa-rocket"></i>
                                    </div>
                                    <div class="stat">
                                        <div class="value"> {{$product_count}} </div>
                                        <div class="name"> Active items </div>
                                    </div>
                                    <div class="progress stat-progress">
                                        <div class="progress-bar" style="width: 100%;"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 stat-col">
                                    <div class="stat-icon">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div class="stat">
                                        <div class="value"> {{$transaction_count}} </div>
                                        <div class="name"> Transactions done </div>
                                    </div>
                                    <div class="progress stat-progress">
                                        <div class="progress-bar" style="width: 100%;"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6  stat-col">
                                    <div class="stat-icon">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <div class="stat">
                                        <div class="value"> {{$user_count}} </div>
                                        <div class="name"> Total users </div>
                                    </div>
                                    <div class="progress stat-progress">
                                        <div class="progress-bar" style="width: 100%;"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 stat-col">
                                    <div class="stat-icon">
                                        <i class="fa fa-dollar"></i>
                                    </div>
                                    <div class="stat">
                                        <div class="value"> Rp {{$total}}  </div>
                                        <div class="name"> Total Income </div>
                                    </div>
                                    <div class="progress stat-progress">
                                        <div class="progress-bar" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card sameheight-item sales-breakdown" data-exclude="xs,sm,lg">
                        <div class="card-header">
                            <div class="header-block">
                                <h3 class="title"> Sales breakdown </h3>
                            </div>
                        </div>
                        <div class="card-block">
                            <div class="dashboard-sales-breakdown-chart" id="dashboard-sales-breakdown-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="row sameheight-container">
                <div class="col-xl-12">
                    <div class="card sameheight-item items" data-exclude="xs,sm,lg">
                        <div class="card-header bordered">
                            <div class="header-block">
                                <h3 class="title"> All Items </h3>
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-insert"> Add new </a>
                            </div>
                            <div class="header-block pull-right">
                                <label class="search">
                                    <input class="search-input" placeholder="search...">
                                    <i class="fa fa-search search-icon"></i>
                                </label>
                            </div>
                        </div>
                        <ul class="item-list striped">
                            <li id="products" class="item">
                                <div class="item-row">
                                    <div class="item-col fixed item-col-img">
                                            <div>Image</div>
                                    </div>
                                    <div class="item-col item-col-title no-wrap">
                                        <div>
                                            <a href="#" class="">
                                                <h4 class="item-title no-wrap"> Name</h4>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="item-col item-col-sales">
                                        <div>Sales</div>
                                    </div>
                                    <div class="item-col item-col-stats">
                                            <span>Special</span>
                                    </div>
                                    <div class="item-col item-col-category no-overflow">
                                        <div class="no-overflow">
                                            Category
                                        </div>
                                    </div>
                                    <div class="item-col item-col-stats">
                                        <div> DateTme </div>
                                    </div>
                                    <div class="item-col fixed item-col-actions-dropdown">
                                        Action
                                    </div>
                                </div>
                            </li>
                            <li id="product_properties" class="item">
                            @include('admin.products')
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </article>
    @endsection
