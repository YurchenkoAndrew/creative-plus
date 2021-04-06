<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string name
 * @property string email
 * @property string phone
 * @property string message
 */
class EmailRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3:max:25',
            'email' => 'required|email',
            'phone' => 'required|min:11:max:18',
            'message' => 'required'
        ];
    }
}
