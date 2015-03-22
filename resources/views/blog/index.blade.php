@extends('app')

@section('content')
<div class="container-fluid">
    <h1>Blog</h1>

    @foreach($articles as $article)
        <article>
            <h2>
                <a href="{{route('blog.show', [$article->id])}}">
                    {{$article->title}}
                </a>
            </h2>
            <div class="body">
                {{$article->body}}
            </div>
        </article>
    @endforeach
</div>
@stop