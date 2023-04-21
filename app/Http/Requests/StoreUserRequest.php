<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|min:3|max:255',
            'user_photo' => 'nullable|file|mimes:jpg,png,webp,svg',
            'password' => 'required|string|min:3|max:255',
            'roles_id' => 'required',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation failed',
            'fails'      => $validator->errors()
        ], 422));
    }

    public function prepareForValidation()
    {
        $this->merge([
            'roles_id' => $this->role,
            'password' => bcrypt($this->password)
        ]);
    }
}
