<?php

namespace App\Services\Books;

use App\Repositories\Book\BookRepositories;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BookService
{
    private BookRepositories $bookRepositories;

    /**
     * BookService constructor.
     * @param BookRepositories $bookRepositories
     */
    public function __construct(BookRepositories $bookRepositories)
    {
        $this->bookRepositories = $bookRepositories;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAllBooks(): LengthAwarePaginator
    {
        return $this->bookRepositories->paginate();
    }

    /**
     * @param int $bookId
     * @return mixed
     */
    public function getBook(int $bookId): mixed
    {
        return $this->bookRepositories->find($bookId);
    }

    /**
     * @param array $validatedData
     * @param int $bookId
     * @return bool|int
     */
    public function updateBook(array $validatedData, int $bookId): bool|int
    {
        return $this->bookRepositories->update($validatedData, $bookId);
    }

    /**
     * @param array $validatedData
     * @return bool
     */
    public function createBook(array $validatedData): bool
    {
        return $this->bookRepositories->create($validatedData);
    }

    /**
     * @param int $bookId
     * @return int
     */
    public function destroyBook(int $bookId): int
    {
        return $this->bookRepositories->destroy($bookId);
    }
}
