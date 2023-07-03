<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTheme extends FormRequest
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
            'List_Themes.*.Name' => 'required',
            'List_Themes.*.Description' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'List_Themes.*.Name.required' => 'Le champ niveau est obligatoire',
            'List_Themes.*.Description.required' => 'Le champ description est obligatoire',
        ];
    }
}
