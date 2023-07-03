<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDomaines extends FormRequest
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
            'Name' => 'required|unique:domaines,name,'.$this->id,
            'Responsable' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'Name.required' => 'Le champ niveau est obligatoire',
            'Name.unique' => 'Le champ niveau existe deja',
            'Responsable.required' => 'Le champ description est obligatoire',
        ];
    }
}
