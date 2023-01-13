<?php


namespace App\DTO\BookDTO;


class StoreUpdateBookDTO
{
    /**
     * StoreUpdateBookDTO constructor.
     * @param string $name
     * @param int $author_id
     */
    public function __construct(
        public string $name,
        public int $author_id
    )
    {
    }
}
