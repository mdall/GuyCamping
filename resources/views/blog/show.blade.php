@extends('app')

@section('content')
<div class="container" style="padding-top:30px;">
    <h1>Blog</h1>

    <article>
        <h2>
            {{$article->title}}
        </h2>
        <div class="body">
            {{$article->body}}
        </div>
    </article>
</div>
@stop