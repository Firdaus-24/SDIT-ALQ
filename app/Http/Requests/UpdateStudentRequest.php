<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'txtname' => 'required|max:100|min:3',
            'txtnisn' => [
                'required',
                'unique:students,nisn,' . $this->id,
                'max:10'
            ],
            'txtjk' => 'required',
            'txttmptlahir' => 'required|max:100',
            'txttgllahir' => 'required',
            'txtagama' => 'required|max:10',
            'txtkelas' => 'numeric|min:1|max:6',
            'txtwali' => 'required|min:3|max:200',
            'image' => 'image|file|max:5000',
        ];
    }

    public function messages(): array
    {
        return [
            'txtname.required' => 'A name is required',
            'txtname.max' => 'Max character is 100',
            'txtname.min' => 'Min character is 3',
            'txtnisn.required' => 'A NISN is required',
            'txtnisn.unique' => 'A NISN must be unique',
            'txtnisn.max' => 'Max character is 100',
            'txtjk.required' => 'A Jenis kelamin is required',
            'txttmptlahir.required' => 'A Tempat lahir is required',
            'txttmptlahir.max' => 'Max character 100',
            'txttgllahir.required' => 'A Tanggal lahir is required',
            'txtagama.required' => 'A agama is required',
            'txtagama.max' => 'Max character is 10',
            'txtkelas.numeric' => 'Must be number',
            'txtkelas.min' => 'Min number is 1',
            'txtkelas.max' => 'Max number is 6',
            'txtwali.required' => 'A wali is required',
            'txtwali.min' => 'Min wali is 3',
            'txtwali.max' => 'Max wali is 200',
            'image.image' => 'Must be image',
            'image.max' => 'Image maxsize is 5mb',
        ];
    }
}
