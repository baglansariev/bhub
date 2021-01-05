<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StartupCategoryCreateRequest extends FormRequest
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
            'name' => 'required|max:225|string',
            'code' => 'required|max:225|string|unique:startup_categories',
            'pricing_id' => 'integer',
        ];
    }

    public function messages()
    {
        parent::messages(); // TODO: Change the autogenerated stub

        return [
            'name.required'     => 'Это поле обязательно к заполнению',
            'name.max'          => 'Максимальная длинна строки не должна превышать 225 символов',
            'name.string'       => 'Поле должно содежрать хоть одну букву',

            'code.required'     => 'Это поле обязательно к заполнению',
            'code.max'          => 'Максимальная длинна строки не должна превышать 225 символов',
            'code.string'       => 'Поле должно содежрать хоть одну букву',
            'code.unique'       => 'Такой код уже существует',
        ];
    }
}
