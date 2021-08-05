<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTeacherRequest extends FormRequest
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
            'surname' => 'required|min:3|string',
            'name' => 'required|min:3|string',
            'last_name' => 'sometimes|min:3|string'
        ];
    }

    public function attributes() {
       return [
           'surname' => 'Фамилия',
           'name' => 'Имя',
           'last_name' => 'Отчество'
       ];
    }
}
