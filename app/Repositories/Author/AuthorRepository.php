<?php


namespace App\Repositories\Author;


use App\DTO\AuthorDTO\StoreUpdateAuthorDTO;
use App\Models\Author;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class AuthorRepository
{
    protected const PAGINATION_FOR_AUTHORS = 10;

    /**
     * @return LengthAwarePaginator
     */
    public function getAuthorWithPaginate(): LengthAwarePaginator
    {
        return Author::query()->paginate(self::PAGINATION_FOR_AUTHORS);
    }

    /**
     * @param int $authorId
     * @return mixed
     */
    public function find(int $authorId): mixed
    {
        return Author::find($authorId);
    }

    /**
     * @param array $updateUserInfo
     * @param int $authorId
     * @return bool|int
     */
    public function update(StoreUpdateAuthorDTO $storeUpdateAuthorDTO, int $authorId): bool|int
    {
        return $this->find($authorId)
            ->update([
                'name' => $storeUpdateAuthorDTO->name,
                'date_at' => $storeUpdateAuthorDTO->date_at,
                'slug' => Str::slug($storeUpdateAuthorDTO->name, '-')
            ]);
    }

    /**
     * @param array $createUserInfo
     * @return bool
     */
    public function create(StoreUpdateAuthorDTO $storeUpdateAuthorDTO): bool
    {
        return Author::query()->insert([
            'name' => $storeUpdateAuthorDTO->name,
            'date_at' => $storeUpdateAuthorDTO->date_at,
            'slug' => Str::slug($storeUpdateAuthorDTO->name, '-')
        ]);
    }

    /**
     * @param int $authorId
     * @return int
     */
    public function destroy(int $authorId): int
    {
        return Author::destroy($authorId);
    }

    /**
     * @param int $authorId
     * @return mixed
     */
    public function getAuthorWithBooks(int $authorId): mixed
    {
        return Author::find($authorId)->books;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getCountBooksAuthor(): LengthAwarePaginator
    {
        return Author::query()->withCount('books')->paginate(self::PAGINATION_FOR_AUTHORS);
    }
}
