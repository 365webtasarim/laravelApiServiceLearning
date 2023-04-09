<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255|min:5',
            'slug' => 'required|string|max:255|min:5',
            'status' => 'required|int',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Başlık alanı boş bırakılamaz.',
            'title.string' => 'Başlık alanı string olmalıdır.',
            'title.max' => 'Başlık alanı en fazla 255 karakter olabilir.',
            'title.min' => 'Başlık alanı en az 5 karakter olabilir.',
            'slug.required' => 'Slug alanı boş bırakılamaz.',
            'slug.string' => 'Slug alanı string olmalıdır.',
            'slug.max' => 'Slug alanı en fazla 255 karakter olabilir.',
            'slug.min' => 'Slug alanı en az 5 karakter olabilir.',
            'status.required' => 'Durum alanı boş bırakılamaz.',
            'status.int' => 'Durum alanı int olmalıdır.',
        ];
    }

    public function errors()
    {
        return $this->validator->errors();
    }
}
