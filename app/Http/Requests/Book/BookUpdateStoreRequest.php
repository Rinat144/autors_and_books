<?php

namespace App\Http\Requests\Book;

use App\DTO\BookDTO\StoreUpdateBookDTO;
use Illuminate\Foundation\Http\FormRequest;

class BookUpdateStoreRequest extends FormRequest
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
            'name' => 'required|string',
            'author_id' => 'required|integer'
        ];
    }

    /**
     * @return StoreUpdateBookDTO
     */
    public function getDto(): StoreUpdateBookDTO
    {
        return new StoreUpdateBookDTO(
            name: $this->get('name'),
            author_id: $this->get('author_id')
        );
    }
}
