<?php

namespace App\Http\Requests\Car;

use Illuminate\Foundation\Http\FormRequest;

class PutRequest extends FormRequest
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
            "name" => "required|min:3|max:180",
            "desc" => "required|min:3|max:180",
            "car_license" => "required|min:7|max:10",
            "first_purchase_date" => "required|date",
            "purchase_date" => "required|date"
        ];
    }
}
