@extends('app')

@section('content')
    <div class="container-fluid">
        <h1>Gestion des hébergements</h1>

        <h2>Liste :</h2>
        @foreach($hebergements as $h)
            <ul>
                <li>Nombre d'emplacements: {{ $h->nbEmplacements }}</li>
                <li>Prix (€): {{json_encode($h->prix)}}</li>
                <li>Ouverture: {{json_encode($h->ouverture)}}</li>
                <li>Options: {{json_encode($h->options)}}</li>
                <li>Images: {{json_encode($h->images)}}</li>
            </ul>
        @endforeach
    </div>
@stop