<?php

namespace App\Services\Books;

use App\DTO\AuthorDTO\StoreUpdateAuthorDTO;
use App\DTO\BookDTO\StoreUpdateBookDTO;
use App\Repositories\Book\BookRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BookService
{
    private BookRepository $bookRepositories;

    /**
     * BookService constructor.
     * @param BookRepository $bookRepositories
     */
    public function __construct(BookRepository $bookRepositories)
    {
        $this->bookRepositories = $bookRepositories;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAllBooks(): LengthAwarePaginator
    {
        return $this->bookRepositories->getBookWithPaginate();
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
    public function updateBook(StoreUpdateBookDTO $storeUpdateBookDTO, int $bookId): bool|int
    {
        return $this->bookRepositories->update($storeUpdateBookDTO, $bookId);
    }

    /**
     * @param array $validatedData
     * @return bool
     */
    public function createBook(StoreUpdateBookDTO $storeUpdateBookDTO): bool
    {
        return $this->bookRepositories->create($storeUpdateBookDTO);
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
