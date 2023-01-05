<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePackageRequest extends FormRequest
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
            'name' => 'required|max:255',
            'package_type' => 'required',
            'price' => 'required',
            'currency_id'=>'required',
            'is_featured' => 'nullable',
            'is_free' => 'nullable',
            'validity'=>'required',
            'listing' => 'required',
            'featured'=> 'required',
            'status' => 'required',
        ];
    }
}
