@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('InfyomSettings::settings.singular')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'settings.store', 'files' => true]) !!}

                        @include('settings.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        updateValueField();

        $('#type').change(function(){
            updateValueField();
        })
    })

    function updateValueField(){
        var type = $('#type').val();
        if( type == 'Text' ){
            $('.value-file').prop('disabled', true);
            $('.value-file').attr('style', 'display: none');

            $('.value-text').prop('disabled', false);
            $('.value-text').attr('style', 'display: block');

        }else{
            $('.value-file').prop('disabled', false);
            $('.value-file').attr('style', 'display: block');

            $('.value-text').prop('disabled', true);
            $('.value-text').attr('style', 'display: none');
        }
    }
</script>
@endsection