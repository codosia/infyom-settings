<div class="table-responsive">
    <table class="table" id="settings-table">
        <thead>
            <tr>
                <th>@lang('InfyomSettings::settings.fields.name')</th>
        <th>@lang('InfyomSettings::settings.fields.key')</th>
        <th>@lang('InfyomSettings::settings.fields.type')</th>
                <th colspan="3">@lang('InfyomSettings::settings.actions.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($settings as $settings)
            <tr>
                <td>{{ $settings->name }}</td>
            <td>{{ $settings->key }}</td>
            <td>{{ $settings->type }}</td>
                <td>
                    {!! Form::open(['route' => ['settings.destroy', $settings->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('settings.show', [$settings->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('settings.edit', [$settings->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("'.__('InfyomSettings::settings.messages.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
