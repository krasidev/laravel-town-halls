<?php

namespace App\Http\Requests\Panel\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . auth()->user()->id . ',id'],
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
            'name' => __('content.panel.profile.labels.name'),
            'email' => __('content.panel.profile.labels.email'),
            'password' => __('content.panel.profile.labels.password'),
            'role' => __('content.panel.profile.labels.role')
        ];
    }
}
