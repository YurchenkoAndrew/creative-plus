<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:255',
            'image' => 'required',
            'portfolio_block_id' => 'required|integer',
            'sort' => 'required|integer',
            'description' => 'max:160'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
//            'name' => 'required|min:3|max:255',
//            'image' => 'required',
//            'portfolio_block_id' => 'required|integer',
//            'sort' => 'required|integer'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Поле название обязательно!',
            'name.max' => 'Поле название не может превышать 255 символов!',
            'image.required' => 'Изображение обязательно!',
            'portfolio_block_id.required' => 'Поле блок портфолио обязательно!',
            'portfolio_block_id.integer' => 'Поле блок портфолио должно быть целым, положительным числом',
            'sort.required' => 'Поле сортировка обязательно!',
            'sort.integer' => 'Поле сортировка должно быть целым, положительным числом',
            'description.max' => 'Поле описание не может превышать 160 символов!',
        ];
    }
}
