<?php

namespace App\Http\Requests\Maintenance;

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
            "details" => "required|min:5|max:180",
            "maintenance_type" => "required|min:5|max:180",
            "price" => "required|min:2|max:10",
            "maintenance_date" => "required|date",
            "car_id" => "required|integer",
            "kilometers" => "required|integer"
        ];
    }
}
