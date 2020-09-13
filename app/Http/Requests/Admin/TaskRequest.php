<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

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
