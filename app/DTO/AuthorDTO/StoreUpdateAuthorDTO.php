<?php


namespace App\DTO\AuthorDTO;

class StoreUpdateAuthorDTO
{
    /**
     * StoreUpdateAuthorDTO constructor.
     * @param string $name
     * @param string $date_at
     */
    public function __construct(
        public string $name,
        public string $date_at
    )
    {
    }
}
