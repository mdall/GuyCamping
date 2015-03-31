@extends('app')

@section('content')
    <div class="container-fluid" style="padding-top:30px;">
        <h1>Editer un type d'hébergement</h1>

        <hr/>
        {!! Form::open(['route' => ['hebergement.update', $hebergement->id], 'method' => 'PUT']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nom : ') !!}
            {!! Form::text('name', $hebergement->name, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group" id="groupeSemaine">
            @foreach($hebergement->plage as $key => $plage)
                <div class="form-inline">
                    {!! Form::label('plage['. $key .'][debut]', 'Date de début : ') !!}
                    {!! Form::input('date', 'plage['. $key .'][debut]', $plage->debut, ['class'=>'form-control']) !!}
                    {!! Form::label('plage['. $key .'][fin]', 'Date de fin : ') !!}
                    {!! Form::input('date', 'plage['. $key .'][fin]', $plage->fin, ['class'=>'form-control']) !!}
                    {!! Form::label('plage['. $key .'][ouverture]', ' Ouverture : ') !!}
                    {!! Form::select('plage['. $key .'][ouverture]', array(true => 'Oui', false => 'Non'),  $plage->ouverture , ['class'=>'form-control']) !!}
                    {!! Form::label('plage['. $key .'][prix]', ' Prix/j : ') !!}
                    {!! Form::text('plage['. $key .'][prix]',  $plage->prix , ['class'=>'form-control']) !!}
                    {!! Form::label('plage['. $key .'][nbEmplacements]', 'Nombre d\'emplacements : ') !!}
                    {!! Form::text('plage['. $key .'][nbEmplacements]',  $plage->nbEmplacements   , ['class'=>'form-control']) !!}

                    {!! Form::button('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter une plage',
                    ['class' => 'btn form-control addPlage']) !!}
                </div>
            @endforeach
        </div>
        <div class="form-group" id="groupeOption">
            @foreach($hebergement->options as $key => $option)
                <div class="form-inline">
                    {!! Form::label('options['. $key .']', 'Option : ') !!}
                    {!! Form::text('options['. $key .']', $option, ['class'=>'form-control', 'placeholder' => 'TV']) !!}
                    {!! Form::button('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter',
                    ['class' => 'btn form-control addOption']) !!}
                </div>
            @endforeach
        </div>
        <div class="form-group" id="groupeImage">
            @foreach($hebergement->images as $key => $image)
                <div class="form-inline">
                    {!! Form::label('images['. $key .']', 'Image : ') !!}
                    {!! Form::text('images['. $key .']', $image, ['class'=>'form-control', 'placeholder' => 'tente.jpg']) !!}
                    {!! Form::button('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter',
                    ['class' => 'btn form-control addImage']) !!}
                </div>
            @endforeach
        </div>
        <div class="form-group">
            {!! Form::label('name', 'Description : ') !!}
            {!! Form::text('description', $hebergement->description, ['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Editer', ['class' => 'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop

@section('scripts')
    <script type="text/javascript">
        var groupeSemaine = $("#groupeSemaine").clone().find("button").remove().end(),
                groupeOption = $("#groupeOption").clone().find("button").remove().end(),
                groupeImage = $("#groupeImage").clone().find("button").remove().end();

        function ajouterLigne(id, groupe) {
            var nPlage = 1
            return function() {
                $(id).append(groupe.html().replace(/\[0\]/g, "[" + nPlage++ + "]"));
            }
        }

        $('.addPlage').click(ajouterLigne("#groupeSemaine", groupeSemaine))
        $('.addOption').click(ajouterLigne("#groupeOption", groupeOption))
        $('.addImage').click(ajouterLigne("#groupeImage", groupeImage))
    </script>
@stop