@extends('app')

@section('content')
    <div class="container-fluid">
        <h1>Ajouter un type d'hébergement</h1>

        <hr/>
        {!! Form::open(['route' => 'hebergement.store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nom : ') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('nbEmplacements', 'Nombre d\'emplacements : ') !!}
            {!! Form::text('nbEmplacements', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group" id="groupeSemaine">
            <div class="form-inline">
                {!! Form::label('plage[0]', 'Plage de semaines : ') !!}
                {!! Form::text('plage[0]', null, ['class'=>'form-control', 'placeholder' => '10-34']) !!}
                {!! Form::label('ouverture[0]', ' Ouverture : ') !!}
                {!! Form::select('ouverture[0]', array(true => 'Oui', false => 'Non'), null, ['class'=>'form-control']) !!}
                {!! Form::label('prix[0]', ' Prix : ') !!}
                {!! Form::text('prix[0]', null, ['class'=>'form-control']) !!}

                {!! Form::button('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter une plage',
                    ['class' => 'btn form-control', 'id'=> 'addPlage']) !!}
            </div>
        </div>
        <div class="form-group" id="groupeOption">
            <div class="form-inline">
                {!! Form::label('options[0]', 'Option : ') !!}
                {!! Form::text('options[0]', null, ['class'=>'form-control', 'placeholder' => 'TV']) !!}
                {!! Form::button('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter',
                    ['class' => 'btn form-control', 'id'=> 'addOption']) !!}
            </div>
        </div>
        <div class="form-group" id="groupeImage">
            <div class="form-inline">
                {!! Form::label('images[0]', 'Image : ') !!}
                {!! Form::text('images[0]', null, ['class'=>'form-control', 'placeholder' => 'tente.jpg']) !!}
                {!! Form::button('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter',
                    ['class' => 'btn form-control', 'id'=> 'addImage']) !!}
            </div>
        </div>



        <div class="form-group">
            {!! Form::submit('Ajouter un type d\'hébergement', ['class' => 'btn btn-primary form-control']) !!}
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

        $('#addPlage').click(ajouterLigne("#groupeSemaine", groupeSemaine))
        $('#addOption').click(ajouterLigne("#groupeOption", groupeOption))
        $('#addImage').click(ajouterLigne("#groupeImage", groupeImage))
    </script>
@stop