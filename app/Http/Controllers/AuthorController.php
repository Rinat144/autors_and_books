<?php

namespace App\Http\Controllers;

use App\DTO\UpdateAuthorDTO;
use App\Http\Requests\Author\AuthorStoreUpdateRequest;
use App\Services\Authors\AuthorService;
use Illuminate\Http\JsonResponse;

class AuthorController extends Controller
{
    private AuthorService $authorService;

    /**
     * AuthorController constructor.
     * @param AuthorService $authorService
     */
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    /**
     * @return JsonResponse
     */
    public function getAllAuthors(): JsonResponse
    {
        $authors = $this->authorService->getAllAuthors();

        return response()->json([
            $authors
        ]);
    }

    /**
     * @param int $authorId
     * @return JsonResponse
     */
    public function getAuthor(int $authorId): JsonResponse
    {
        $authorData = $this->authorService->getAuthor($authorId);

        return response()->json([
            $authorData
        ]);
    }

    /**
     * @param AuthorStoreUpdateRequest $request
     * @param int $authorId
     * @return JsonResponse
     */
    public function updateAuthor(AuthorStoreUpdateRequest $request, int $authorId): JsonResponse
    {
        $authorData = $this->authorService->updateAuthor($request->getDto(), $authorId);

        return response()->json([
            $authorData
        ]);
    }

    /**
     * @param AuthorStoreUpdateRequest $request
     * @return JsonResponse
     */
    public function createAuthor(AuthorStoreUpdateRequest $request): JsonResponse
    {
        $authorData = $this->authorService->createAuthor($request->getDto());

        return response()->json([
            $authorData
        ]);
    }

    /**
     * @param int $authorId
     * @return JsonResponse
     */
    public function destroyAuthor(int $authorId): JsonResponse
    {
        $authorsData = $this->authorService->destroyAuthor($authorId);

        return response()->json([
            $authorsData
        ]);
    }

    /**
     * @param int $authorId
     * @return JsonResponse
     */
    public function getAuthorWithBooks(int $authorId): JsonResponse
    {
        $booksTheAuthor = $this->authorService->getAuthorWithBooks($authorId);
        $authorTheBook = $this->authorService->getAuthor($authorId);

        return response()->json([
            $authorTheBook,
            $booksTheAuthor
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function getCountBooksAuthor(): JsonResponse
    {
        $countBooksAuthor = $this->authorService->getCountBooksAuthor();

        return response()->json([
            $countBooksAuthor
        ]);
    }
}
