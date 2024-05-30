<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LastReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'file_1' => 'required|file',
            'file_2' => 'required|file',
            'file_3' => 'required|file',
        ];

        if ($this->isMethod('PUT')) {
            $rules = [
                'file_1' => 'file',
                'file_2' => 'file',
                'file_3' => 'file',
            ];
        }

        return $rules;
    }
}
