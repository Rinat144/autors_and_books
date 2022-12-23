<?php

namespace App\Http\Controllers;

use App\Http\Requests\Author\AuthorStoreUpdateRequest;
use App\Services\Authors\AuthorService;
use Illuminate\Http\JsonResponse;

class AuthorController extends Controller
{
    private AuthorService $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    /**
     * @return JsonResponse
     */
    public function allAuthors(): JsonResponse
    {
        $allAuthor = $this->authorService->allAuthor();

        return response()->json([
            $allAuthor
        ]);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function oneAuthor(int $id): JsonResponse
    {
        $oneAuthor = $this->authorService->oneAuthor($id);

        return response()->json([
            $oneAuthor
        ]);
    }

    /**
     * @param AuthorStoreUpdateRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function updateAuthor(AuthorStoreUpdateRequest $request, int $id): JsonResponse
    {
        $data = $request->all();
        $updateAuthor = $this->authorService->updateAuthor($data, $id);

        return response()->json([
            $updateAuthor
        ]);
    }

    /**
     * @param AuthorStoreUpdateRequest $request
     * @return JsonResponse
     */
    public function storeAuthor(AuthorStoreUpdateRequest $request): JsonResponse
    {
        $data = $request->all();
        $storeAuthor = $this->authorService->storeAuthor($data);

        return response()->json([
            $storeAuthor
        ]);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroyAuthor(int $id): JsonResponse
    {
        $destroyAuthor = $this->authorService->destroyAuthor($id);

        return response()->json([
            $destroyAuthor
        ]);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function authorWithBooks(int $id): JsonResponse
    {
        $authorsWithBooks = $this->authorService->authorWithBooks($id);

        return response()->json([
            $authorsWithBooks
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function countBooksAuthor(): JsonResponse
    {
        $countBooksAuthor = $this->authorService->countBooksAuthor();
        return response()->json([
            $countBooksAuthor
        ]);
    }
}
