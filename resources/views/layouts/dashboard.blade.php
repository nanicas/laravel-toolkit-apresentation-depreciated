@extends('layouts.app')

@section('css')
<style>
    #menu-box .feather {
        width: 16px;
        height: 16px;
        vertical-align: text-bottom;
    }
    #menu-box .direct-menu-item {
        font-size: 15px;
    }
    #menu-box .card-body {
        padding: 5px;
    }
    .direct-menu-item-header {
        padding: 5px;
    }
    #menu-box .feather {
        vertical-align: middle;
    }
    #menu-box .btn-link {
        padding-top: 0px;
        padding-bottom: 0px;
        padding-left: 5px;
    }
</style>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-2" id="menu-box">
            <div id="accordion">
                @yield('menu-items')
            </div>
        </div>
        <div class="col-10 px-md-4">
            <main role="main">

                <form method="GET" action="#">
                    <nav class="navbar flex-md-nowrap p-0">

                        <!--            <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Company name</a>-->
                        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <input name="name" class="form-control w-100" type="text" placeholder="Pesquisar usuários" aria-label="Search">
                        <ul class="navbar-nav px-3">
                            <li class="nav-item text-nowrap">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </li>
                        </ul>
                        <!--<ul class="navbar-nav px-3">
                            <li class="nav-item text-nowrap">
                                <a class="nav-link" href="#">Sign out</a>
                            </li>
                        </ul>-->
                    </nav>
                </form>

                <br>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">{{ \Request::route()->getName() }}</a></li>
                    </ol>
                </nav>

                <div id="top-dashboard-message"></div>
                @yield('dashboard-content')
                <div id="bottom-dashboard-message"></div>
            </main>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset($packaged_assets_prefix . '/vendor/bootstrap-theme/feather.min.js') }}"></script>
@endsection
