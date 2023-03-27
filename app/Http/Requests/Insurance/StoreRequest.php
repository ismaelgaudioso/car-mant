<?php

namespace App\Http\Requests\Insurance;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "insurance_carrier" => "required|min:3|max:180",
            "insurance_number" => "required|min:4|max:180",
            "phone" => "required|min:6|max:20",
            "coverage" => "required|min:3",
            "price" => "required",
            "car_id" => "required|integer",
            "due_date" => "required|date"
        ];
    }
}
