@extends('app')

@section('rightheader')
    <li style="display:none" id="spinner"><a><i class="fa fa-spinner fa-spin"></i></a></li>
    <li><a href="#" id="save">Appliquer</a></li>
    <li><a href="#" id="toggleHtml">Basculer</a></li>
@stop

@section('content')
    <div class="container-fluid">
        <div class="form-group">
            {!! Form::label('title', 'Titre : ') !!}
            {!! Form::text('title', $page->title, ['class'=>'form-control', 'id' => 'pagetitle']) !!}
        </div>
        <div class="form-group">
            {!! Form::textarea('body', $page->content, ['class'=>'form-control', 'id'=>'content2', 'rows'=>'25', 'style' => 'display:none']) !!}
        </div>

        <div class="form-group">
            <div class="container-fluid form-control" contenteditable="true" id="content" style="min-height:500px;">
                {!! $page->content !!}
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': '{{ Session::token() }}'
            }
        });

        $("#save").click(function(e) {
            $.ajax({
                url: '{{ route('page.update', [$page->id], false)  }}',
                type: '{{ $method }}',
                data: {
                    content: $("#content").html(),
                    title: $("#pagetitle").val()
                },
                beforeSend: function() {
                    $('#spinner').show()
                },
                success: function() {
                    oldHtml=$('#save').html();
                    $('#save').html('Success!')
                            .fadeOut(1000, function() {
                                $(this).html(oldHtml);
                                $(this).fadeIn(500)
                            })
                },
                error: function() {
                    oldHtml=$('#save').html();
                    $('#save').html('Error!')
                            .fadeOut(2000, function() {
                                $(this).html(oldHtml);
                                $(this).fadeIn(500)
                            })
                },
                complete: function() {
                    $('#spinner').hide();
                }
            })
        })

        $('#content2').bind('blur keyup paste copy cut mouseup', function () {
            $('#content').html($('#content2').val())
        })
        $('#content').bind('blur keyup paste copy cut mouseup', function () {
            $('#content2').val($('#content').html())
        })

        $("#toggleHtml").click(function(e) {
            $('#content').toggle()
            $('#content2').toggle()
        })
    </script>
@stop