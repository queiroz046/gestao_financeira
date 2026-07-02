<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:categories,name,NULL,id,user_id,' . auth()->id()],
            'type' => ['required', 'in:receita,despesa'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome da categoria é obrigatório.',
            'name.max' => 'O nome da categoria não pode exceder 255 caracteres.',
            'name.unique' => 'Já existe uma categoria com este nome para sua conta.',
            'type.required' => 'O tipo de categoria é obrigatório.',
            'type.in' => 'O tipo deve ser "Receita" ou "Despesa".',
        ];
    }
}
