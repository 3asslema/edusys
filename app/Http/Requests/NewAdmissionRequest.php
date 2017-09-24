<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewAdmissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'admission.student' => 'required',
            'admission.student.email' => 'required|unique:users,email|email',
            'admission.student.name' => 'required|max:255',
            'admission.student.extra_fields.gender' => Rule::in(['m','f'])
        ];
    }
}
