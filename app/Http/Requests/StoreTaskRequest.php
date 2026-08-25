<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'title' => 'nullable|string',
        'discription' => 'nullable|string',
        'priority' => 'nullable|max:5|min:1',
        'user_id'=>'required|exists:users,id'
        ];
    }
}
