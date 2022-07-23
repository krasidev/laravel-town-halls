@if($role->readonly == 0)
    @if(auth()->user()->hasRole('admin') || auth()->user()->hasPermissionTo('panel.roles.edit'))
    <a href="{{ route('panel.roles.edit', ['role' => $role->id]) }}" title="{{ __('content.panel.roles.buttons.edit') }}" class="btn btn-sm">
        <i class="fas fa-edit"></i>
    </a>
    @endif
    @if(auth()->user()->hasRole('admin') || auth()->user()->hasPermissionTo('panel.roles.destroy'))
    <a href="{{ route('panel.roles.destroy', ['role' => $role->id]) }}" title="{{ __('content.panel.roles.buttons.destroy') }}" class="btn btn-sm dt-bt-delete">
        <i class="fas fa-trash"></i>
    </a>
    @endif
@endif