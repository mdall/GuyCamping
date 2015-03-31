@extends('app')

@section('content')
    <div class="container">
        <h1>{{ $hebergement->name }}</h1>
        <u>Description</u> : {{ $hebergement->description }}<br/>
        <u>Options</u> : {{ implode(', ', $hebergement->options) }}<br/>
        <u>Images</u> : {{ implode(', ', $hebergement->images) }}<br/>
        @foreach($hebergement->plage as $plage)
            du {{ $plage->debut }} au {{ $plage->fin }}, {{ $plage->nbEmplacements }} emplacements, ouverture: {{$plage->ouverture ? "Oui" : "Non"}}, prix: {{$plage->prix}}€<br/>
        @endforeach
        <u>Disponibilité</u> : information non disponible pour le moment
    </div>
@stop