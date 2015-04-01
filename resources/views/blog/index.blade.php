@extends('app')

@section('content')
<div class="container" style="padding-top:30px;">
    <h1>Blog
        <a href="{{route('blog.create')}}" class="btn btn-primary pull-right">Ajouter un article</a></h1>

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