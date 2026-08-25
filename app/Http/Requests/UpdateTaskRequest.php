<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'sometimes|string',
        'discription' => 'required|string',
        'priority' => 'sometimes|max:5|min:1',
        'user_id' => 'required|exists:users,id'
        ];
    }
        public function messages()
{
    return [
        'discription.required' => 'حقل الوصف مطلوب.',
       'title.required' => 'حقل العنوان مطلوب.',
       'priority.required' => 'حقل الأولوية مطلوب.',
       'user_id.required' => 'حقل معرف المستخدم مطلوب.'
    ];
}
    }

