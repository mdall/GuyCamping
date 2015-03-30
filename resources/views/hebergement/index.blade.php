@extends('app')

@section('content')
    <div class="container-fluid">
        <h1>Gestion des hébergements</h1>

        <h2>Liste :</h2>
        @foreach($hebergements as $h)
            <ul>
                <li>Nom : {{ $h->name }}</li>
                <li>Description : {{ $h->description }}</li>
                <li>Options : {{ implode(',', $h->options) }}</li>
                <li>Images : {{ implode(',', $h->images) }}</li>
                @foreach($h->plage as $plage)
                <li>
                    <ul>
                        <li>Début : {{ $plage->debut }}</li>
                        <li>Fin : {{ $plage->fin }}</li>
                        <li>Nombre d'emplacements : {{ $plage->nbEmplacements }}</li>
                        <li>Ouverture : {{$plage->ouverture}}</li>
                        <li>Prix : {{$plage->prix}}</li>
                    </ul>
                </li>
                @endforeach
            </ul>
        @endforeach
    </div>
@stop