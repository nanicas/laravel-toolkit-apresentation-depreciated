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
                <div class="card">
                    <div class="card-header direct-menu-item-header" id="headingZero">
                        <h5 class="mb-0">
                            <a class="rounded direct-menu-item list-group-item {{ ($screen == 'notification') ? 'active' : '' }}" href="{{ route('notification.index') }}">
                                <span data-feather="bell"></span>
                                Notificações <label class="text-danger float-right"><span data-feather="alert-triangle"></label></span>
                            </a>
                        </h5>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header direct-menu-item-header" id="headingOne">
                        <h5 class="mb-0">
                            <a class="rounded direct-menu-item list-group-item {{ ($screen == 'timeline') ? 'active' : '' }}" href="{{ route('timeline') }}">
                                <span data-feather="activity"></span>
                                Timeline
                            </a>
                        </h5>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <span data-feather="shield"></span>
                                Universo de valores
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <div class="list-group">
                                <a class="list-group-item list-group-item-action {{ ($screen == 'insignia') ? 'active' : '' }}" href="{{ route('insignia_universe.index') }}">
                                    -- <span data-feather="disc"></span>
                                    Insígnias
                                </a>
                                <a class="list-group-item list-group-item-action {{ ($screen == 'article') ? 'active' : '' }}" href="{{ route('article_universe.index') }}">
                                    -- <span data-feather="book-open"></span>
                                    Artigos
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header direct-menu-item-header" id="headingFour">
                        <h5 class="mb-0">
                            <a class="rounded direct-menu-item list-group-item {{ ($screen == 'application' || $screen == 'contract' ) ? 'active' : '' }}" href="{{ route('application') }}">
                                <span data-feather="file"></span>
                                Aplicações
                            </a>
                        </h5>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header direct-menu-item-header" id="headingFour">
                        <h5 class="mb-0">
                            <a class="rounded direct-menu-item list-group-item {{ ($screen == 'board') ? 'active' : '' }}" href="{{ route('board.index') }}">
                                <span data-feather="layout"></span>
                                Quadro
                            </a>
                        </h5>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header direct-menu-item-header" id="headingFive">
                        <h5 class="mb-0">
                            <a class="rounded direct-menu-item list-group-item {{ ($screen == 'find') ? 'active' : '' }}" href="{{ route('find', ['section' => 'post']) }}">
                                <span data-feather="search"></span>
                                Busca geral
                            </a>
                        </h5>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <span data-feather="airplay"></span>
                                Meus cadastros
                            </button>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="list-group">
                                <a class="list-group-item list-group-item-action {{ ($screen == 'task') ? 'active' : '' }}" href="{{ route('task.index') }}">
                                    -- <span data-feather="disc"></span>
                                    Tarefas
                                </a>
                                <a class="list-group-item list-group-item-action {{ ($screen == 'worth') ? 'active' : '' }}" href="{{ route('worth.index') }}">
                                    -- <span data-feather="book-open"></span>
                                    Insígnias/Artigos
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header direct-menu-item-header" id="headingThree">
                        <h5 class="mb-0">
                            <a class="rounded direct-menu-item list-group-item {{ ($screen == 'profile') ? 'active' : '' }}" href="{{ route('profile.overview', \App\Helpers\Helper::getUserId()) }}">
                                <span data-feather="user"></span>
                                Meu perfil <span class="sr-only">(current)</span>
                            </a>
                        </h5>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header direct-menu-item-header" id="headingFour">
                        <h5 class="mb-0">
                            <a class="rounded direct-menu-item list-group-item {{ ($screen == 'contact') ? 'active' : '' }}" href="{{ route('contact.index') }}">
                                <span data-feather="message-square"></span>
                                Contato <span class="sr-only">(current)</span>
                            </a>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-10 px-md-4">
            <main role="main">

                <form method="GET" action="{{ route('find', ['section' => 'user']) }}">
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
<script src="{{ asset('vendor/bootstrap-theme/feather.min.js') }}"></script>
@endsection
