<?php


namespace App\Repositories\Book;


use App\Models\Book;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BookRepository
{
    private const PAGINATION_FOR_BOOKS = 10;

    /**
     * @return LengthAwarePaginator
     */
    public function getBookWithPaginate(): LengthAwarePaginator
    {
        return Book::query()->paginate(self::PAGINATION_FOR_BOOKS);
    }

    /**
     * @param int $bookId
     * @return mixed
     */
    public function find(int $bookId): mixed
    {
        return Book::query()->find($bookId);
    }

    /**
     * @param array $validatedData
     * @param int $bookId
     * @return bool|int
     */
    public function update(array $validatedData, int $bookId): bool|int
    {
        return $this->find($bookId)
            ->update([
                'name' => $validatedData['name'],
                'author_id' => $validatedData['author_id']
            ]);
    }

    /**
     * @param array $validatedData
     * @return bool
     */
    public function create(array $validatedData): bool
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
    public function destroy(int $bookId): int
    {
        return Book::destroy($bookId);
    }
}
