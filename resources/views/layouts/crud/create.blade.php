@extends('layouts.app')
@section('content')
<form action="{{ route($route . '.store') }}" method="POST" class="crud">
    @csrf    
    @yield('crud-content')

    <button class="ladda-button" data-style="expand-right" type="submit">
        <span class="ladda-label">Salvar</span>
    </button>
</form>
@endsection