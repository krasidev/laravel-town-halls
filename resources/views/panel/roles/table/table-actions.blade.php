<a href="{{ route('panel.roles.edit', ['role' => $role->id]) }}" title="{{ __('content.panel.roles.buttons.edit') }}" class="btn btn-sm">
    <i class="fas fa-edit"></i>
</a>
<a href="{{ route('panel.roles.destroy', ['role' => $role->id]) }}" title="{{ __('content.panel.roles.buttons.destroy') }}" class="btn btn-sm dt-bt-delete">
    <i class="fas fa-trash"></i>
</a>