<?php

namespace App\Http\Requests;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
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
        $id = $this->route('id'); // atau ->user, sesuaikan

        return [
            'name'  => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$id}",
            'password' => $this->isMethod('post')
                ? 'required|string|min:8|confirmed'
                : 'nullable|string|min:8|confirmed',
            'role' => 'required|string|exists:roles,name',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The name is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'email.required' => 'The email is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'password.required' => 'The password is required.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        foreach ($validator->errors()->all() as $error) {
            Alert::toast($error, 'error');
        }

        throw new HttpResponseException(
            redirect()->back()->withErrors($validator)->withInput()
        );
    }
}
