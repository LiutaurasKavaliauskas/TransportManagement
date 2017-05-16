<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TravelReportsRequest extends FormRequest
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
            'date'                   => 'required',
            'route'                  => 'required',
            'left_terminal_at'       => 'required',
            'arrived_to_terminal_at' => 'required',
            'speedometer_readings_1' => 'required',
            'arrived_to_client_at'   => 'required',
            'left_client_at'         => 'required',
            'speedometer_readings_2' => 'required',
            'unloading_time'         => 'required',
        ];
    }
}
