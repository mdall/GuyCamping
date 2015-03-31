@extends('app')

@section('content')
    <div class="container" style="padding-top:30px;">
        <h1>Gestion des hébergements
        <a href="{{route('hebergement.create')}}" class="btn btn-primary pull-right">Ajouter</a></h1>
        <p>Cette page permet de gérer les détails des hébergements pour pouvoir afficher des détails au visiteurs ainsi que pour pouvoir les transmettre à une centrale de réservation.</p>
        <ul class="list-group" style="padding-top:20px;">
        @foreach($hebergements as $h)
            <li class="list-group-item">
                <a href="{{route('hebergement.edit', $h->id)}}" class="btn btn-default pull-right">Editer</a>
                <u>Nom</u> : {{ $h->name }}<br/>
                <u>Description</u> : {{ $h->description }}<br/>
                <u>Options</u> : {{ implode(', ', $h->options) }}<br/>
                <u>Images</u> : {{ implode(', ', $h->images) }}<br/>
                @foreach($h->plage as $plage)
                 du {{ $plage->debut }} au {{ $plage->fin }}, {{ $plage->nbEmplacements }} emplacements, ouverture: {{$plage->ouverture ? "Oui" : "Non"}}, prix: {{$plage->prix}}€<br/>
                @endforeach
            </li>
        @endforeach
        </ul>
    </div>
@stop