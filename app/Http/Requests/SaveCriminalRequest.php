<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveCriminalRequest extends FormRequest
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
            "last_name" => "required|string",
            "other_names" => "required|string",
            "sex" => "required|string",
            "phone_number" => "required|numeric",
            "date_of_birth" => "required|string",
            "lga_of_origin" => "required|string",
            "state_of_origin" => "required|string",
            "profile_picture" => "required",
            "address" => "required|string",
            "offences" => "required|array",
        ];
    }
}
