<?php

namespace App\Services\Authors;

use App\Models\Author;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\HigherOrderBuilderProxy;
use Illuminate\Support\HigherOrderCollectionProxy;
use Illuminate\Support\Str;

class AuthorService
{
    private const PAGINATION_FOR_AUTHORS = 10;

    /**
     * @return LengthAwarePaginator
     */
    public function getAllAuthors(): LengthAwarePaginator
    {
        return Author::query()->paginate(self::PAGINATION_FOR_AUTHORS);
    }

    /**
     * @param int $authorId
     * @return mixed
     */
    public function getAuthor(int $authorId): mixed
    {
        return Author::query()->find($authorId);
    }

    /**
     * @param array $updateUserInfo
     * @param int $authorId
     * @return bool|int
     */
    public function updateAuthor(array $updateUserInfo, int $authorId): bool|int
    {
        return Author::query()->find($authorId)
            ->update([
                'name' => $updateUserInfo['name'],
                'date_at' => $updateUserInfo['date_at'],
                'slug' => Str::slug($updateUserInfo['name'], '-')
            ]);
    }

    /**
     * @param array $createUserInfo
     * @return bool
     */
    public function createAuthor(array $createUserInfo): bool
    {
        return Author::query()->insert([
            'name' => $createUserInfo['name'],
            'date_at' => $createUserInfo['date_at'],
            'slug' => Str::slug($createUserInfo['name'], '-')
        ]);
    }

    /**
     * @param int $authorId
     * @return int
     */
    public function destroyAuthor(int $authorId): int
    {
        return Author::destroy($authorId);
    }

    /**
     * @param int $authorId
     * @return HigherOrderBuilderProxy|HigherOrderCollectionProxy|mixed
     */
    public function getAuthorWithBooks(int $authorId): mixed
    {
        return Author::query()->find($authorId)->books;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getCountBooksAuthor(): LengthAwarePaginator
    {
        return Author::query()->withCount('books')->paginate(self::PAGINATION_FOR_AUTHORS);
    }
}
