<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DailyReportRequest extends FormRequest
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
            'date' => 'required|date_format:Y-m-d',
            'photo' => 'required|file|mimes:png,jpeg,jpg,svg,gif',
            'start' => 'required',
            'end' => 'required',
            'description' => 'required',
        ];

        if ($this->isMethod('PUT')) {
            $rules['photo'] = 'file|mimes:png,jpg,jpeg,svg,gif';
        }

        return $rules;
    }
}
