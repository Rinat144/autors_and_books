<?php

namespace App\Services\Authors;

use App\Models\Author;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\HigherOrderBuilderProxy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HigherOrderCollectionProxy;
use Illuminate\Support\Str;

class AuthorService
{
    /**
     * @return LengthAwarePaginator
     */
    public function allAuthor(): LengthAwarePaginator
    {
        return Author::query()->paginate(10);
    }

    /**
     * @param int $id
     * @return Model|Collection|Builder|array|null
     */
    public function oneAuthor(int $id): Model|Collection|Builder|array|null
    {
        return Author::query()->find($id);
    }

    /**
     * @param array $data
     * @param int $id
     * @return bool|int
     */
    public function updateAuthor(array $data, int $id): bool|int
    {
        return Author::query()->find($id)
            ->update([
                'name' => $data['name'],
                'date_at' => $data['date_at'],
                'slug' => Str::slug($data['name'], '-')
            ]);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function storeAuthor(array $data): bool
    {
        return Author::query()->insert([
            'name' => $data['name'],
            'date_at' => $data['date_at'],
            'slug' => Str::slug($data['name'], '-')
        ]);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function destroyAuthor(int $id): mixed
    {
        return Author::query()->find($id)->delete();
    }

    /**
     * @param int $id
     * @return HigherOrderBuilderProxy|HigherOrderCollectionProxy|mixed
     */
    public function authorWithBooks(int $id): mixed
    {
        return Author::query()->find($id)->books;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function countBooksAuthor(): LengthAwarePaginator
    {
        return Author::query()->withCount('books')->paginate(10);
    }
}
