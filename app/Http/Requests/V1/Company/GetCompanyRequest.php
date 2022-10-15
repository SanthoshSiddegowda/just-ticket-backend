<?php

namespace App\Http\Requests\V1\Company;

use Illuminate\Foundation\Http\FormRequest;

class GetCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'domain' => 'required|max:255',
        ];
    }

    public function attributes(): array
    {
        return [
            'domain' => 'URL',
        ];
    }

    public function messages(): array
    {
        return [
            'domain.required' => 'Just ticket does\'t support requested :attribute',
        ];
    }
}
