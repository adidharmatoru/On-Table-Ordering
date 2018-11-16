<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <link rel="icon" type="image/png" href="{{ asset('images/icons/logo.png') }}" />


    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="css/vendor.css">
    <script>
        var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {};
        var themeName = themeSettings.themeName || '';
        if (themeName)
        {
            document.write('<link rel="stylesheet" id="theme-style" href="css/admin-' + themeName + '.css">');
        }
        else
        {
            document.write('<link rel="stylesheet" id="theme-style" href="css/admin.css">');
        }
    </script>
</head>
<body>
<div class="main-wrapper">
    <div class="app" id="app">
        <header class="header">
            <div class="header-block header-block-collapse d-lg-none d-xl-none">
                <button class="collapse-btn" id="sidebar-collapse-btn">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="header-block header-block-nav">
                <ul class="nav-profile">
                    <li class="profile dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="img" style="background-image: url('{{asset('images/pattern3.png')}}')"> </div>
                            <span class="name"> {{ Auth::user()->name }} </span>
                        </a>
                        <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="#">
                                <i class="fa fa-user icon"></i> Profile </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off icon"></i> Logout </a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </header>
        <aside class="sidebar">
            <div class="sidebar-container">
                <div class="sidebar-header">
                    <div class="brand">
                        <div class="logo">
                            <img style="width: 30px; margin-top: -50px;" src="{{ asset('images/icons/logo.png') }}" alt="LOGO">
                        </div> Little Grass Admin </div>
                </div>
                <nav class="menu">
                    <ul class="sidebar-menu metismenu" id="sidebar-menu">
                        <li class="active">
                            <a href="/home">
                                <i class="fa fa-home"></i> Dashboard </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <footer class="sidebar-footer">
                <ul class="sidebar-menu metismenu" id="customize-menu">
                    <li>
                        <ul>
                            <li class="customize">
                                <div class="customize-item">
                                    <div class="row customize-header">
                                        <div class="col-4"> </div>
                                        <div class="col-4">
                                            <label class="title">fixed</label>
                                        </div>
                                        <div class="col-4">
                                            <label class="title">static</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <label class="title">Sidebar:</label>
                                        </div>
                                        <div class="col-4">
                                            <label>
                                                <input class="radio" type="radio" name="sidebarPosition" value="sidebar-fixed">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="col-4">
                                            <label>
                                                <input class="radio" type="radio" name="sidebarPosition" value="">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <label class="title">Header:</label>
                                        </div>
                                        <div class="col-4">
                                            <label>
                                                <input class="radio" type="radio" name="headerPosition" value="header-fixed">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="col-4">
                                            <label>
                                                <input class="radio" type="radio" name="headerPosition" value="">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <label class="title">Footer:</label>
                                        </div>
                                        <div class="col-4">
                                            <label>
                                                <input class="radio" type="radio" name="footerPosition" value="footer-fixed">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="col-4">
                                            <label>
                                                <input class="radio" type="radio" name="footerPosition" value="">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <a href="#">
                            <i class="fa fa-cog"></i> Customize </a>
                    </li>
                </ul>
            </footer>
        </aside>
        @yield('content')
    </div>
</div>
<div class="modal fade" id="modal-insert">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Insert New</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body modal-tab-container">
                <ul class="nav nav-tabs modal-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#insert" data-toggle="tab" role="tab">Insert</a>
                    </li>
                </ul>
                <div class="tab-content modal-tab-content">
                    <form action="" method="GET" enctype="multipart/form-data">
                        <div class="card card-block">
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Name: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control boxed" placeholder=""> </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Content: </label>
                                <div class="col-sm-10">
                                    <div class="wyswyg">
                                        <div class="toolbar">
                                            <select class="ql-size">
                                                <option value="small"></option>
                                                <option selected></option>
                                                <option value="large"></option>
                                                <option value="huge"></option>
                                            </select>
                                            <button class="ql-bold"></button>
                                            <button class="ql-italic"></button>
                                            <button class="ql-underline"></button>
                                            <button class="ql-strike"></button>
                                            <select title="Text Color" class="ql-color">
                                                <option value="rgb(0, 0, 0)" label="rgb(0, 0, 0)" selected></option>
                                                <option value="rgb(230, 0, 0)" label="rgb(230, 0, 0)"></option>
                                                <option value="rgb(255, 153, 0)" label="rgb(255, 153, 0)"></option>
                                                <option value="rgb(255, 255, 0)" label="rgb(255, 255, 0)"></option>
                                                <option value="rgb(0, 138, 0)" label="rgb(0, 138, 0)"></option>
                                                <option value="rgb(0, 102, 204)" label="rgb(0, 102, 204)"></option>
                                                <option value="rgb(153, 51, 255)" label="rgb(153, 51, 255)"></option>
                                                <option value="rgb(255, 255, 255)" label="rgb(255, 255, 255)"></option>
                                                <option value="rgb(250, 204, 204)" label="rgb(250, 204, 204)"></option>
                                                <option value="rgb(255, 235, 204)" label="rgb(255, 235, 204)"></option>
                                                <option value="rgb(255, 255, 204)" label="rgb(255, 255, 204)"></option>
                                                <option value="rgb(204, 232, 204)" label="rgb(204, 232, 204)"></option>
                                                <option value="rgb(204, 224, 245)" label="rgb(204, 224, 245)"></option>
                                                <option value="rgb(235, 214, 255)" label="rgb(235, 214, 255)"></option>
                                                <option value="rgb(187, 187, 187)" label="rgb(187, 187, 187)"></option>
                                                <option value="rgb(240, 102, 102)" label="rgb(240, 102, 102)"></option>
                                                <option value="rgb(255, 194, 102)" label="rgb(255, 194, 102)"></option>
                                                <option value="rgb(255, 255, 102)" label="rgb(255, 255, 102)"></option>
                                                <option value="rgb(102, 185, 102)" label="rgb(102, 185, 102)"></option>
                                                <option value="rgb(102, 163, 224)" label="rgb(102, 163, 224)"></option>
                                                <option value="rgb(194, 133, 255)" label="rgb(194, 133, 255)"></option>
                                                <option value="rgb(136, 136, 136)" label="rgb(136, 136, 136)"></option>
                                                <option value="rgb(161, 0, 0)" label="rgb(161, 0, 0)"></option>
                                                <option value="rgb(178, 107, 0)" label="rgb(178, 107, 0)"></option>
                                                <option value="rgb(178, 178, 0)" label="rgb(178, 178, 0)"></option>
                                                <option value="rgb(0, 97, 0)" label="rgb(0, 97, 0)"></option>
                                                <option value="rgb(0, 71, 178)" label="rgb(0, 71, 178)"></option>
                                                <option value="rgb(107, 36, 178)" label="rgb(107, 36, 178)"></option>
                                                <option value="rgb(68, 68, 68)" label="rgb(68, 68, 68)"></option>
                                                <option value="rgb(92, 0, 0)" label="rgb(92, 0, 0)"></option>
                                                <option value="rgb(102, 61, 0)" label="rgb(102, 61, 0)"></option>
                                                <option value="rgb(102, 102, 0)" label="rgb(102, 102, 0)"></option>
                                                <option value="rgb(0, 55, 0)" label="rgb(0, 55, 0)"></option>
                                                <option value="rgb(0, 41, 102)" label="rgb(0, 41, 102)"></option>
                                                <option value="rgb(61, 20, 102)" label="rgb(61, 20, 102)"></option>
                                            </select>
                                            <select title="Background Color" class="ql-background">
                                                <option value="rgb(0, 0, 0)" label="rgb(0, 0, 0)"></option>
                                                <option value="rgb(230, 0, 0)" label="rgb(230, 0, 0)"></option>
                                                <option value="rgb(255, 153, 0)" label="rgb(255, 153, 0)"></option>
                                                <option value="rgb(255, 255, 0)" label="rgb(255, 255, 0)"></option>
                                                <option value="rgb(0, 138, 0)" label="rgb(0, 138, 0)"></option>
                                                <option value="rgb(0, 102, 204)" label="rgb(0, 102, 204)"></option>
                                                <option value="rgb(153, 51, 255)" label="rgb(153, 51, 255)"></option>
                                                <option value="rgb(255, 255, 255)" label="rgb(255, 255, 255)" selected></option>
                                                <option value="rgb(250, 204, 204)" label="rgb(250, 204, 204)"></option>
                                                <option value="rgb(255, 235, 204)" label="rgb(255, 235, 204)"></option>
                                                <option value="rgb(255, 255, 204)" label="rgb(255, 255, 204)"></option>
                                                <option value="rgb(204, 232, 204)" label="rgb(204, 232, 204)"></option>
                                                <option value="rgb(204, 224, 245)" label="rgb(204, 224, 245)"></option>
                                                <option value="rgb(235, 214, 255)" label="rgb(235, 214, 255)"></option>
                                                <option value="rgb(187, 187, 187)" label="rgb(187, 187, 187)"></option>
                                                <option value="rgb(240, 102, 102)" label="rgb(240, 102, 102)"></option>
                                                <option value="rgb(255, 194, 102)" label="rgb(255, 194, 102)"></option>
                                                <option value="rgb(255, 255, 102)" label="rgb(255, 255, 102)"></option>
                                                <option value="rgb(102, 185, 102)" label="rgb(102, 185, 102)"></option>
                                                <option value="rgb(102, 163, 224)" label="rgb(102, 163, 224)"></option>
                                                <option value="rgb(194, 133, 255)" label="rgb(194, 133, 255)"></option>
                                                <option value="rgb(136, 136, 136)" label="rgb(136, 136, 136)"></option>
                                                <option value="rgb(161, 0, 0)" label="rgb(161, 0, 0)"></option>
                                                <option value="rgb(178, 107, 0)" label="rgb(178, 107, 0)"></option>
                                                <option value="rgb(178, 178, 0)" label="rgb(178, 178, 0)"></option>
                                                <option value="rgb(0, 97, 0)" label="rgb(0, 97, 0)"></option>
                                                <option value="rgb(0, 71, 178)" label="rgb(0, 71, 178)"></option>
                                                <option value="rgb(107, 36, 178)" label="rgb(107, 36, 178)"></option>
                                                <option value="rgb(68, 68, 68)" label="rgb(68, 68, 68)"></option>
                                                <option value="rgb(92, 0, 0)" label="rgb(92, 0, 0)"></option>
                                                <option value="rgb(102, 61, 0)" label="rgb(102, 61, 0)"></option>
                                                <option value="rgb(102, 102, 0)" label="rgb(102, 102, 0)"></option>
                                                <option value="rgb(0, 55, 0)" label="rgb(0, 55, 0)"></option>
                                                <option value="rgb(0, 41, 102)" label="rgb(0, 41, 102)"></option>
                                                <option value="rgb(61, 20, 102)" label="rgb(61, 20, 102)"></option>
                                            </select>
                                            <button class="ql-list" value="ordered"></button>
                                            <button class="ql-list" value="bullet"></button>
                                            <select title="Text Alignment" class="ql-align">
                                                <option selected></option>
                                                <option value="center" label="Center"></option>
                                                <option value="right" label="Right"></option>
                                                <option value="justify" label="Justify"></option>
                                            </select>
                                            <button class="ql-link"></button>
                                            <button style="width: auto;" type="button" title="Image" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-media">
                                                <i class="fa fa-image"></i> Media </button>
                                        </div>
                                        <div class="editor"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Price: </label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control boxed" placeholder=""> </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Category: </label>
                                <div class="col-sm-10">
                                    <select class="c-select form-control boxed">
                                        <option selected>Select Category</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Images: </label>
                                <input type="file" name="image" id="prod_image" hidden>
                                <div class="col-sm-10">
                                    <div class="images-container">
                                        <a href="#" class="add-image" data-toggle="modal" data-target="#modal-media">
                                            <div class="image-container new">
                                                <div class="image">
                                                    <div onclick="document.getElementById('prod_image').click()" id="dropzone">
                                                        <i class="fa fa-plus"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button type="submit" class="btn btn-primary"> Submit </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="confirm-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fa fa-warning"></i> Alert</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure want to do this?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</div>
</div>
<script src="js/vendor.js"></script>
<script src="js/admin.js"></script>
</body>

</html>
