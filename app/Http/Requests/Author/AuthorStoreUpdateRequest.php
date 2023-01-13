<?php

namespace App\Http\Requests\Author;

use App\DTO\AuthorDTO\StoreUpdateAuthorDTO;
use Illuminate\Foundation\Http\FormRequest;

class AuthorStoreUpdateRequest extends FormRequest
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
            'name' => 'required|max:255|string',
            'date_at' => 'required|date',
        ];
    }

    /**
     * @return StoreUpdateAuthorDTO
     */
    public function getDto(): StoreUpdateAuthorDTO
    {
        return new StoreUpdateAuthorDTO(
            name: $this->get('name'),
            date_at: $this->get('date_at')
        );
    }
}
