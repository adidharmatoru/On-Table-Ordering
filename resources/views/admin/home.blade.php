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
                <div class="col col-12 col-sm-12 col-md-6 col-xl-6 stats-col">
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
                <div class="col col-12 col-sm-12 col-md-6 col-xl-2 stats-col">
                    <div class="card sameheight-item stats" data-exclude="xs">
                        <div class="card-block">
                            <div class="title-block">
                                <h4 class="title"> TopUp </h4>
                            </div>
                                <form action="{{route('topup')}}" method="POST" novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="username">Email</label>
                                        <input type="email" class="form-control underlined" name="email" id="email" placeholder="Your email address" required> </div>
                                    <div class="form-group">
                                        <label for="password">Balance</label>
                                        <input type="number" class="form-control underlined" name="balance" id="balance" placeholder="Balance" required> </div>
                                    <div class="form-group" style="padding-top: 30px">
                                        <button type="submit" class="btn btn-block btn-primary">Top Up</button>
                                    </div>
                                </form>
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
                                <h3 class="title"> Pending Items </h3>
                            </div>
                        </div>
                        <ul class="item-list striped">
                            <li id="products" class="item">
                                <div class="item-row">
                                    <div class="item-col fixed item-col-img">
                                        <div>Id</div>
                                    </div>
                                    <div class="item-col item-col-title">
                                        <div>
                                            Name
                                        </div>
                                    </div>
                                    <div class="item-col item-col-stats">
                                        <div>Amount</div>
                                    </div>
                                    <div class="item-col fixed item-col-title">
                                        <div> DateTime </div>
                                    </div>
                                    <div class="item-col fixed item-col-img">
                                        Action
                                    </div>
                                </div>
                            </li>
                            <li id="product_properties" class="item">
                                @php($i = ($pending->currentpage()-1)* $pending->perpage() + 1)
                                @foreach($pending as $pro)
                                    <div class="item-row" id="order-{{$pro->id}}">
                                        <div class="item-col fixed item-col-img">
                                            <a href="#">
                                                <div>{{$pro->id}}</div>
                                            </a>
                                        </div>
                                        <div class="item-col item-col-title no-wrap">
                                            <div>
                                                <a href="#" class="">
                                                    <h4 class="item-title no-wrap"> {{$pro->users->email}} </h4>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="item-col item-col-stats">
                                            <a href="#">
                                                <div>{{$pro->amount}}</div>
                                            </a>
                                        </div>
                                        <div class="item-col fixed item-col-title">
                                            <a href="#">
                                                <div>{{$pro->created_at}}</div>
                                            </a>
                                        </div>
                                        <div class="item-col fixed item-col-img">
                                            <div class="item-actions-dropdown">
                                                <a class="finish" id="{{$pro->id}}" href="#">
                                                    <i class="fa fa-check-circle "></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @php($i += 1)
                                @endforeach
                                {!! $pending->links() !!}
                            </li>
                        </ul>
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
                                        <div> DateTime </div>
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
