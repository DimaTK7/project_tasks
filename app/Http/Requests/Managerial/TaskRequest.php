<?php

namespace App\Http\Requests\Managerial;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'status' => 'required',
            'description' => 'required',
            'file' => 'nullable|file',
            'project_id' => 'required',
        ];
    }
}
