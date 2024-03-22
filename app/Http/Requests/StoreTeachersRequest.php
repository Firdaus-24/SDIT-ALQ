<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeachersRequest extends FormRequest
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
            'txtcode' => 'unique:teachers,code|max:10',
            'txtname' => 'required|max:100|min:3',
            'txtalamat' => 'required|max:200|min:3',
            'txtkelurahan' => 'max:200|min:3',
            'txtkota' => 'required|max:200|min:3',
            'txtkodepos' => 'required|max:5|min:3',
            'txtjk' => 'required',
            'txtagama' => 'required|max:20|min:3',
            'txtbank' => 'required|max:20|min:3',
            'txtrekening' => 'max:20|min:3',
            'txtnoktp' => 'required|max:16|min:10',
            'txttglmasuk' => 'required',
            'txtnohp' => 'required|max:13|min:11',
            'txtemail' => 'required|unique:teachers,email',
            'image' => 'image|file|max:5000',
        ];
    }

    public function messages(): array
    {
        return [
            'txtcode.unique' => 'A Code must be unique',
            'txtcode.max' => 'Max character is 10',
            'txtname.required' => 'A name is required',
            'txtname.max' => 'Max character 100',
            'txtname.min' => 'Max character 3',
            'txtalamat.required' => 'A Alamat is required',
            'txtalamat.max' => 'Max character is 200',
            'txtalamat.min' => 'Min Character is 3',
            'txtkelurahan.max' => 'Max character is 200',
            'txtkelurahan.min' => 'Min Character is 3',
            'txtkota.max' => 'Max character is 200',
            'txtkota.min' => 'Min Character is 3',
            'txtkodepos.max' => 'Max character is 5',
            'txtkodepos.min' => 'Min Character is 3',
            'txtagama.max' => 'Max character is 20',
            'txtagama.max' => 'Max character is 20',
            'txtbank.min' => 'Min Character is 3',
            'txtbank.max' => 'Min Character is 20',
            'txtrekening.max' => 'Max character is 20',
            'txtrekening.min' => 'Min Character is 3',
            'txtnoktp.max' => 'Max character is 16',
            'txtnoktp.min' => 'Min Character is 10',
            'txtnohp.max' => 'Max character is 13',
            'txtnohp.min' => 'Min Character is 11',
            'txtemail.unique' => 'A Email must be unique',
            'txtemail.required' => 'A email is required',
            'image.image' => 'Must be image',
            'image.max' => 'Image maxsize is 5mb',
        ];
    }
}
