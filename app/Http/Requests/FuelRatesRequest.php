<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuelRatesRequest extends FormRequest
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
            'idle_rate'      => 'required|numeric|min:0',
            'going_rate'     => 'required|numeric|min:0',
            'unloading_rate' => 'required|numeric|min:0',
            'vehicle'     => 'required'
        ];
    }
}
