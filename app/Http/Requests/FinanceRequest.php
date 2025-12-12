<?php

namespace App\Http\Requests;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class FinanceRequest extends FormRequest
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
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:500',
            'date' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'The type is required.',
            'type.in' => 'The type must be either income or expense.',
            'amount.required' => 'The amount is required.',
            'amount.numeric' => 'The amount must be a number.',
            'amount.min' => 'The amount must be at least 0.',
            'description.string' => 'The description must be a string.',
            'description.max' => 'The description may not be greater than 500 characters.',
            'date.required' => 'The date is required.',
            'date.date' => 'The date is not a valid date.',
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
