<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('InfyomSettings::settings.fields.name').':') !!}
    <p>{{ $settings->name }}</p>
</div>

<!-- Key Field -->
<div class="form-group">
    {!! Form::label('key', __('InfyomSettings::settings.fields.key').':') !!}
    <p>{{ $settings->key }}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', __('InfyomSettings::settings.fields.type').':') !!}
    <p>{{ $settings->type }}</p>
</div>

<!-- Value Field -->
<div class="form-group">
    {!! Form::label('value', __('InfyomSettings::settings.fields.value').':') !!}
    <p>{{ asset($settings->value) }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('InfyomSettings::settings.fields.created_at').':') !!}
    <p>{{ $settings->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('InfyomSettings::settings.fields.updated_at').':') !!}
    <p>{{ $settings->updated_at }}</p>
</div>

