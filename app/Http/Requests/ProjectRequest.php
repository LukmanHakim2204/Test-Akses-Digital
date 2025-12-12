<?php

namespace App\Http\Requests;

use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Foundation\Http\FormRequest;
use function Symfony\Component\Translation\t;

class ProjectRequest extends FormRequest
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
            'title'           => 'required|string|max:255',
            'description'     => 'nullable|string',
            'manager_id'      => 'required|exists:users,id',
            'role_in_project' => 'nullable|string|max:255',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required'      => 'The title field is required.',
            'title.string'        => 'The title must be a string.',
            'title.max'           => 'The title may not be greater than 255 characters.',
            'description.string'  => 'The description must be a string.',
            'manager_id.required' => 'The manager field is required.',
            'manager_id.exists'   => 'The selected manager is invalid.',
            'role_in_project.string' => 'The role in project must be a string.',
            'role_in_project.max'    => 'The role in project may not be greater than 255 characters.',
        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        
        foreach ($validator->errors()->all() as $error) {
          Alert::toast($error, 'error');
        }

        // Redirect kembali dengan input lama
        throw new \Illuminate\Http\Exceptions\HttpResponseException(
            redirect()->back()->withErrors($validator)->withInput()
        );
    }
}
