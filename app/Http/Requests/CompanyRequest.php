<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('web')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name'   => 'required|string|min:3|max:100|regex:/^[a-zA-Z]/u',
            'address'   => 'required|string|min:3|max:100',
            'logo'  => 'required|image|mimes:jpeg,png,jpg|max:10240'
        ];
        if ($this->isMethod("PUT")){
            $rules['logo'] = 'sometimes|nullable|image|mimes:jpeg,png,jpg|max:10240';
        }
        return $rules;
    }
}
