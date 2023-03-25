@extends('layouts.dashboard')
@section('dashboard-content')

    @if(isset($state))
        @include('layouts.crud.messages-state', ['state' => $state])
    @endif
    
    @if(!isset($config['create_option']) || $config['create_option'] === true)
        @yield('create_link', \View::make('layouts.crud.create_link', compact('screen')))
    @endif
    
    @php $hasRows = ($rows && $rows->count() > 0); @endphp

    @if(!$hasRows)
        <div class="alert alert-danger">Nenhum registro cadastrado</div>
    @endif

    @if($hasRows)
        <div id="crud-list">
            @yield('crud-content')
        </div>
    @endif

@endsection