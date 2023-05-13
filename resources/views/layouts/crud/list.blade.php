@extends('layouts.dashboard')
@section('dashboard-content')

    @if(isset($state))
        @include($view_prefix . 'layouts.crud.messages-state', ['state' => $state])
    @endif
    
    <div id="crud-message">
        @if(!empty($message))
            {!! $message !!}
        @endif
    </div>
    
    @if($status)
        @if(!isset($config['create_option']) || $config['create_option'] === true)
            @yield('create_link', \View::make('layouts.crud.create_link', compact('screen')))
        @endif

        @php $hasRows = (isset($data['rows']) && $data['rows']->count() > 0); @endphp

        @if(!$hasRows)
            <div class="alert alert-warning">Nenhum registro cadastrado</div>
        @endif
        
        @yield('crud-filters')

        @if($hasRows)
            <div id="crud-list">
                @yield('crud-content')
                
                <br>
                <nav class="pagination float-end">
                    {{ $data['rows']->appends($query_params)->links() }}
                </nav>
            </div>
        @endif
    @endif

@endsection