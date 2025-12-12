<?php

namespace App\Http\Requests;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class OrderRequest extends FormRequest
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
            'customer_id' => 'required|exists:customers,id',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|string|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'costumer_id.required' => 'The customer ID is required.',
            'costumer_id.exists' => 'The selected customer does not exist.',
            'total_amount.required' => 'The total amount is required.',
            'total_amount.numeric' => 'The total amount must be a number.',
            'total_amount.min' => 'The total amount must be at least 0.',
            'status.required' => 'The status is required.',
            'status.string' => 'The status must be a string.',
            'status.max' => 'The status may not be greater than 50 characters.',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        foreach ($validator->errors()->all() as $error) {
            Alert::toast($error, 'error');
        }

        throw new HttpResponseException(
            redirect()->back()->withErrors($validator)->withInput()
        );
    }
}
