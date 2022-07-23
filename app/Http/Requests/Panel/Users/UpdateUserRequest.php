<?php

namespace App\Http\Requests\Panel\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $this->route('user') . ',id'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'role' => ['required']
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => __('content.panel.users.labels.name'),
            'email' => __('content.panel.users.labels.email'),
            'password' => __('content.panel.users.labels.password'),
            'role' => __('content.panel.users.labels.role')
        ];
    }
}
