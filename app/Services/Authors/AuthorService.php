<?php

namespace App\Services\Authors;

use App\Models\Author;
use App\Repositories\Author\AuthorRepositories;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AuthorService
{
    private AuthorRepositories $authorRepositories;

    /**
     * AuthorService constructor.
     * @param AuthorRepositories $authorRepositories
     */
    public function __construct(AuthorRepositories $authorRepositories)
    {
        $this->authorRepositories = $authorRepositories;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAllAuthors(): LengthAwarePaginator
    {
        return $this->authorRepositories->paginate();
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
    public function updateAuthor(array $updateUserInfo, int $authorId): bool|int
    {
        return $this->authorRepositories->update($updateUserInfo, $authorId);
    }

    /**
     * @param array $createUserInfo
     * @return bool
     */
    public function createAuthor(array $createUserInfo): bool
    {
        return $this->authorRepositories->create($createUserInfo);
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
