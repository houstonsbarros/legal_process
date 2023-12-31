<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->hasPermissionTo('create_process');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'protocol' => 'required|numeric|unique:processes',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'type' => 'required|string|in:civil,criminal,labor,family,tributary,consumer,administrative,environmental,intellectual_property,digital,other',
            'judge_id' => 'nullable|numeric',
            'lawyer_id' => 'nullable|numeric',
        ];
    }
}
