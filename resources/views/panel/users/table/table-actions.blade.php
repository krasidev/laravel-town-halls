<a href="{{ route('panel.users.edit', ['user' => $user->id]) }}" title="{{ __('content.panel.users.buttons.edit') }}" class="btn btn-sm">
    <i class="fas fa-edit"></i>
</a>
@if(auth()->user()->id != $user->id)
<a href="{{ route('panel.users.destroy', ['user' => $user->id]) }}" title="{{ __('content.panel.users.buttons.destroy') }}" class="btn btn-sm dt-bt-delete">
    <i class="fas fa-trash"></i>
</a>
@endif