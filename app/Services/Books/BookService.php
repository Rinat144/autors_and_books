<?php

namespace App\Services\Books;

use App\Models\Book;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BookService
{
    /**
     * @return LengthAwarePaginator
     */
    public function allBooks(): LengthAwarePaginator
    {
        return Book::query()->paginate(15);
    }

    /**
     * @param int $id
     * @return Model|Collection|Builder|array|null
     */
    public function oneBook(int $id): Model|Collection|Builder|array|null
    {
        return Book::query()->find($id);
    }

    /**
     * @param array $data
     * @param int $id
     * @return bool|int
     */
    public function updateBook(array $data, int $id): bool|int
    {
        return Book::query()->find($id)
            ->update([
                'name' => $data['name'],
                'author_id' => $data['author_id']
            ]);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function storeBook(array $data): bool
    {
        return Book::query()->insert([
            'name' => $data['name'],
            'author_id' => $data['author_id']
        ]);
    }

    /**
     * @param int $id
     * @return int
     */
    public function destroyBook(int $id): int
    {
        return Book::destroy($id);
    }
}
