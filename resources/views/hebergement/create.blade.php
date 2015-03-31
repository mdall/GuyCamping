@extends('app')

@section('content')
    <div class="container-fluid" style="padding-top:30px;">
        <h1>Ajouter un type d'hébergement</h1>

        <hr/>
        {!! Form::open(['route' => 'hebergement.store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nom : ') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">

        </div>
        <div class="form-group" id="groupeSemaine">
            <div class="form-inline">
                {!! Form::label('plage[0][debut]', 'Date de début : ') !!}
                {!! Form::input('date', 'plage[0][debut]', null, ['class'=>'form-control']) !!}
                {!! Form::label('plage[0][fin]', 'Date de fin : ') !!}
                {!! Form::input('date', 'plage[0][fin]', null, ['class'=>'form-control']) !!}
                {!! Form::label('plage[0][ouverture]', ' Ouverture : ') !!}
                {!! Form::select('plage[0][ouverture]', array(true => 'Oui', false => 'Non'), null, ['class'=>'form-control']) !!}
                {!! Form::label('plage[0][prix]', ' Prix/j : ') !!}
                {!! Form::text('plage[0][prix]', null, ['class'=>'form-control']) !!}
                {!! Form::label('plage[0][nbEmplacements]', 'Nombre d\'emplacements : ') !!}
                {!! Form::text('plage[0][nbEmplacements]', null, ['class'=>'form-control']) !!}

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
            {!! Form::label('name', 'Description : ') !!}
            {!! Form::text('description', null, ['class'=>'form-control']) !!}
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