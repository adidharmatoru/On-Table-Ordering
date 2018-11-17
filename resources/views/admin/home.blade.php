@extends('layouts.admin')
@section('content')
    <div class="sidebar-overlay" id="sidebar-overlay"></div>
    <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
    <div class="mobile-menu-handle"></div>
    <article class="content dashboard-page">
        <section class="section">
            <div class="row sameheight-container">
                <div class="col col-12 col-sm-12 col-md-6 col-xl-12 stats-col">
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
                                        <div class="value"> Rp  </div>
                                        <div class="name"> Total income </div>
                                    </div>
                                    <div class="progress stat-progress">
                                        <div class="progress-bar" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
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
                                <h3 class="title"> Highest Selling Items </h3>
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
                            <li class="item item-list-header">
                                <div class="item-row">
                                    <div class="item-col item-col-header fixed item-col-img xl"></div>
                                    <div class="item-col item-col-header item-col-title">
                                        <div>
                                            <span>Name</span>
                                        </div>
                                    </div>
                                    <div class="item-col item-col-header fixed item-col-img xl"></div>
                                    <div class="item-col item-col-header item-col-sales">
                                        <div>
                                            <span>Sales</span>
                                        </div>
                                    </div>
                                    <div class="item-col item-col-header fixed item-col-img xl"></div>
                                    <div class="item-col item-col-header item-col-stats">
                                        <div class="no-overflow">
                                            <span>Special</span>
                                        </div>
                                    </div>
                                    <div class="item-col item-col-header fixed item-col-img xl"></div>
                                    <div class="item-col item-col-header item-col-stats">
                                        <div class="no-overflow">
                                            <span>Category</span>
                                        </div>
                                    </div>
                                    <div class="item-col item-col-header item-col-date">
                                        <div>
                                            <span>Published</span>
                                        </div>
                                    </div>
                                    <div class="item-col item-col-header item-col-date">
                                        <div>
                                            <span>Action</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @foreach($products as $pro)
                            <li id="products" class="item">
                                <div class="item-row">
                                    <div class="item-col fixed item-col-img">
                                        <a href="#">
                                            <div class="item-img rounded" style="background-image: url('{{asset('images')}}/{{$pro->image}}')"></div>
                                        </a>
                                    </div>
                                    <div class="item-col item-col-title no-overflow">
                                        <div>
                                            <a href="#" class="">
                                                <h4 class="item-title no-wrap"> {{$pro->title}} </h4>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="item-col item-col-sales">
                                        <div class="item-heading">Sales</div>
                                        <div>4958</div>
                                    </div>
                                    <div class="item-col item-col-stats">
                                        <label>
                                            <input class="radio special" id="{{$pro->id}}" type="radio" name="special" value="1" @if(($pro->special == 1)) checked @endif>
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="item-col item-col-category no-overflow">
                                        <div class="no-overflow">
                                            {{$pro->cat_id}}
                                        </div>
                                    </div>
                                    <div class="item-col item-col-stats">
                                        <div> {{$pro->created_at}} </div>
                                    </div>
                                    <div class="item-col fixed item-col-actions-dropdown">
                                        <div class="item-actions-dropdown">
                                            <a class="item-actions-toggle-btn">
                                                <span class="inactive">
                                                    <i class="fa fa-cog"></i>
                                                </span>
                                                <span class="active">
                                                    <i class="fa fa-chevron-circle-right"></i>
                                                </span>
                                            </a>
                                            <div class="item-actions-block">
                                                <ul class="item-actions-list">
                                                    <li>
                                                        <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal">
                                                            <i class="fa fa-trash-o "></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="edit" href="item-editor.html">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                                @endforeach
                            {!! $products->links() !!}
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </article>
    @endsection
