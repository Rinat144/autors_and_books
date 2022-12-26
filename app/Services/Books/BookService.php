<?php

namespace App\Services\Books;

use App\Models\Book;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BookService
{
    private const PAGINATION_FOR_BOOKS = 10;

    /**
     * @return LengthAwarePaginator
     */
    public function getAllBooks(): LengthAwarePaginator
    {
        return Book::query()->paginate(self::PAGINATION_FOR_BOOKS);
    }

    /**
     * @param int $bookId
     * @return mixed
     */
    public function getBook(int $bookId): mixed
    {
        return Book::query()->find($bookId);
    }

    /**
     * @param array $validatedData
     * @param int $bookId
     * @return bool|int
     */
    public function updateBook(array $validatedData, int $bookId): bool|int
    {
        return Book::query()->find($bookId)
            ->update([
                'name' => $validatedData['name'],
                'author_id' => $validatedData['author_id']
            ]);
    }

    /**
     * @param array $validatedData
     * @return bool
     */
    public function createBook(array $validatedData): bool
    {
        return Book::query()->insert([
            'name' => $validatedData['name'],
            'author_id' => $validatedData['author_id']
        ]);
    }

    /**
     * @param int $bookId
     * @return int
     */
    public function destroyBook(int $bookId): int
    {
        return Book::destroy($bookId);
    }
}
