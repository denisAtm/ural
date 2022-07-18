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
             'name' => 'required',
             'slug' => 'required',
             'torque' => 'required',
             'weight' => 'required',
             'location_of_axes_id' => 'required',
             'number_of_transfer_stages_id' => 'required',
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
            'name.required' => 'Введите название',
            'slug.required' => 'Введите название',
            'torque.required' => 'Добавьте значение крутящего момента ',
            'weight.required' => 'Установите массу',
            'location_of_axes_id.required' => 'Заполните расположение осей оси',
            'number_of_transfer_stages_id.required' => 'Заполните количество передаточных ступней ступени',
        ];
    }
}
