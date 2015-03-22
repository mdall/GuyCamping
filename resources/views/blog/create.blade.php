@extends('app')

@section('content')
<div class="container-fluid">
    <h1>Ecrire un article</h1>

    <hr/>
    {!! Form::open(['route' => 'blog.store']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Titre : ') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>
    <div class="form-group">
        {!! Form::label('body', 'Texte : ') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Ajouter un article', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
</div>
@stop