<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Exceptions\HttpResponseException;


class TaskRequest extends FormRequest
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
            'project_id' => 'required|exists:projects,id',
            'assigned_to_user_id' => 'required|exists:users,id',
            'title' => 'required|string|min:5|max:255',
            'status' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'project_id.required' => 'The project ID is required.',
            'project_id.exists' => 'The selected project does not exist.',
            'assigned_to_user_id.required' => 'The assigned user ID is required.',
            'assigned_to_user_id.exists' => 'The selected user does not exist.',
            'title.required' => 'The title is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'title.min' => 'The title must be at least 5 characters.',
            'status.required' => 'The status is required.',
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
