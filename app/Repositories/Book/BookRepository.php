<?php


namespace App\Repositories\Book;


use App\DTO\BookDTO\StoreUpdateBookDTO;
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
    public function update(StoreUpdateBookDTO $storeUpdateBookDTO, int $bookId): bool|int
    {
        return $this->find($bookId)
            ->update([
                'name' => $storeUpdateBookDTO->name,
                'author_id' => $storeUpdateBookDTO->author_id
            ]);
    }

    /**
     * @param array $validatedData
     * @return bool
     */
    public function create(StoreUpdateBookDTO $storeUpdateBookDTO): bool
    {
        return Book::query()->insert([
            'name' => $storeUpdateBookDTO->name,
            'author_id' => $storeUpdateBookDTO->author_id
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
