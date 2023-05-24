<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        $rute_post_unique = Rule::unique('posts', 'title');
        if ($this -> method() !== 'POST'){
            $rute_post_unique -> ignore($this->route()->parameter('id'));
        }

        return [
            'title' => ['required', $rute_post_unique],
            'content' => ['required'],
        ];
    }

    public function messages()
    {
        return[
            'required' => 'Title harus diisi',
            'content.required' => 'Konten harus diisi'
        ];
    }
}
