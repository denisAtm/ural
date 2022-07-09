<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GearMotorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'name' => 'required|min:5|max:255',
             'slug' => 'required|min:5|max:255',
             'torque' => 'required',
             'weight' => 'required',
             'image' => 'required',
             'locationOfAxes' => 'required',
             'numberOfTransferStages' => 'required',
             'desc' => 'required',
             'size' => 'required',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [

        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Это обязательное поле',
            'slug.required' => 'Проверьте название',
            'torque.required' => 'Это обязательное поле',
            'weight.required' => 'Это обязательное поле',
            'image.required' => 'Загрузите хотя бы одно изображение',
            'locationOfAxes.required' => 'Заполните расположение осей',
            'numberOfTransferStages.required' => 'Заполните количество передаточных ступней',
            'desc.required' => 'Напишите описание',
            'size.required' => 'Хагрузите чертежи ',
        ];
    }
}
