<?php

namespace App\Domains\Social\Requests\Boards;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBoardsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required',
            'title' => ['required', 'max:64'],
            'content' => 'nullable'
        ];
    }

    public function message(): array
    {
        return [
            '*.required' => 'The :attribute field is required.',
            'title.max' => 'Title can\'t over 64 character!',
        ];
    }
}