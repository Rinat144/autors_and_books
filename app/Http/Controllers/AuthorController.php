<?php

namespace App\Http\Controllers;

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
        $updateUserInfo = $request->all();
        $authorData = $this->authorService->updateAuthor($updateUserInfo, $authorId);

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
        $validatedData = $request->all();
        $authorData = $this->authorService->createAuthor($validatedData);

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
        $authorsWithBooks = $this->authorService->getAuthorWithBooks($authorId);

        return response()->json([
            $authorsWithBooks
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
