<?php

namespace App\Http\Requests\Panel\TownHalls;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTownHallRequest extends FormRequest
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
            'abbreviation' => ['required', 'string', 'max:16', 'unique:town_halls,abbreviation,' . $this->route('town_hall') . ',id'],
            'ekatte_num' => ['required', 'string', 'max:8', 'unique:town_halls,ekatte_num,' . $this->route('town_hall') . ',id'],
            'name' => ['required', 'string', 'max:32', 'unique:town_halls,name,' . $this->route('town_hall') . ',id']
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
            'abbreviation' => __('content.panel.town-halls.labels.abbreviation'),
            'ekatte_num' => __('content.panel.town-halls.labels.ekatte_num'),
            'name' => __('content.panel.town-halls.labels.name')
        ];
    }
}
