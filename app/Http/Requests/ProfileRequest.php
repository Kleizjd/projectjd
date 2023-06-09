<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
        $post = $this->route()->parameter('posts');
        //validation rules
        $rules  = [
            'name' => 'required|min:4|string|max:255',
            'email' => 'required|email|string|max:255',
        ];
        return $rules;
    }
}
