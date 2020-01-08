<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('InfyomSettings::settings.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('key', __('InfyomSettings::settings.fields.key').':') !!}
    {!! Form::text('key', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', __('InfyomSettings::settings.fields.type').':') !!}
    {!! Form::select('type', ['Text' => 'Text', 'File' => 'File'], null, ['class' => 'form-control']) !!}
</div>

<!-- Value Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('value', __('InfyomSettings::settings.fields.value').':') !!}
    {!! Form::textarea('value', null, ['class' => 'form-control value-text']) !!}
    {!! Form::file('value', ['class' => 'form-control value-file', 'style' => 'display:none;' ]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('InfyomSettings::settings.actions.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('settings.index') }}" class="btn btn-default">@lang('InfyomSettings::settings.actions.cancel')</a>
</div>
