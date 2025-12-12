<?php

namespace App\Http\Requests;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RolePermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'permissions' => 'array',

        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The role name is required.',
            'name.string' => 'The role name must be a string.',
            'name.max' => 'The role name may not be greater than 255 characters.',
            'permissions.array' => 'The permissions must be an array.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        foreach ($validator->errors()->all() as $error) {
            Alert::toast($error, 'error');
        }

        // Redirect kembali dengan input lama
        throw new HttpResponseException(
            redirect()->back()->withErrors($validator)->withInput()
        );
    }
}
