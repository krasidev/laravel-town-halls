@if(auth()->user()->hasRole('admin') || auth()->user()->hasPermissionTo('panel.town-halls.edit'))
<a href="{{ route('panel.town-halls.edit', ['town_hall' => $town_hall->id]) }}" title="{{ __('content.panel.town-halls.buttons.edit') }}" class="btn btn-sm">
    <i class="fas fa-edit"></i>
</a>
@endif
@if(auth()->user()->hasRole('admin') || auth()->user()->hasPermissionTo('panel.town-halls.destroy'))
<a href="{{ route('panel.town-halls.destroy', ['town_hall' => $town_hall->id]) }}" title="{{ __('content.panel.town-halls.buttons.destroy') }}" class="btn btn-sm dt-bt-delete">
    <i class="fas fa-trash"></i>
</a>
@endif