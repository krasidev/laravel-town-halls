@if(auth()->user()->hasRole('admin') || auth()->user()->hasPermissionTo('panel.users.edit'))
<a href="{{ route('panel.users.edit', ['user' => $user->id]) }}" title="{{ __('content.panel.users.buttons.edit') }}" class="btn btn-sm">
    <i class="fas fa-edit"></i>
</a>
@endif
@if(auth()->user()->id != $user->id && (
    auth()->user()->hasRole('admin') || auth()->user()->hasPermissionTo('panel.users.destroy')
))
<a href="{{ route('panel.users.destroy', ['user' => $user->id]) }}" title="{{ __('content.panel.users.buttons.destroy') }}" class="btn btn-sm dt-bt-delete">
    <i class="fas fa-trash"></i>
</a>
@endif