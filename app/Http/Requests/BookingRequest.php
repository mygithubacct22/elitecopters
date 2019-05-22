<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'booked_date' => [
                'required',
                'date',
            ],

            'origin' => [
                'required',
            ],

            'destination' => [
                'required',
                'different:origin',
            ],

            'round_trip' => [
                'boolean'
            ],

            'remarks' => [
                'max:255',
            ],
        ];
    }
}
