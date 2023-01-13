<?php

namespace App\Services\Authors;

use App\DTO\AuthorDTO\StoreUpdateAuthorDTO;
use App\Repositories\Author\AuthorRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AuthorService
{
    private AuthorRepository $authorRepositories;

    /**
     * AuthorService constructor.
     * @param AuthorRepository $authorRepositories
     */
    public function __construct(AuthorRepository $authorRepositories)
    {
        $this->authorRepositories = $authorRepositories;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAllAuthors(): LengthAwarePaginator
    {
        return $this->authorRepositories->getAuthorWithPaginate();
    }

    /**
     * @param int $authorId
     * @return mixed
     */
    public function getAuthor(int $authorId): mixed
    {
        return $this->authorRepositories->find($authorId);
    }

    /**
     * @param array $updateUserInfo
     * @param int $authorId
     * @return bool|int
     */
    public function updateAuthor(StoreUpdateAuthorDTO $storeUpdateAuthorDTO, int $authorId): bool|int
    {
        return $this->authorRepositories->update($storeUpdateAuthorDTO, $authorId);
    }

    /**
     * @param array $createUserInfo
     * @return bool
     */
    public function createAuthor(StoreUpdateAuthorDTO $storeUpdateAuthorDTO): bool
    {
        return $this->authorRepositories->create($storeUpdateAuthorDTO);
    }

    /**
     * @param int $authorId
     * @return int
     */
    public function destroyAuthor(int $authorId): int
    {
        return $this->authorRepositories->destroy($authorId);
    }

    /**
     * @param int $authorId
     * @return mixed
     */
    public function getAuthorWithBooks(int $authorId): mixed
    {
        return $this->authorRepositories->getAuthorWithBooks($authorId);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getCountBooksAuthor(): LengthAwarePaginator
    {
        return $this->authorRepositories->getCountBooksAuthor();
    }
}
