@extends('app')

@section('rightheader')
    @if(Auth::check())
        <li><a href="{{ route('page.edit', [$page->id]) }}">Editer</a></li>
    @endif
@stop

@section('content')
    <div class="container-fluid">
        {!! $page->content !!}
    </div>
@stop