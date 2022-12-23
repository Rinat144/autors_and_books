<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\BookUpdateStoreRequest;
use App\Services\Books\BookService;
use Illuminate\Http\JsonResponse;

final class BookController extends Controller
{
    private BookService $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * @return JsonResponse
     */
    public function allBooks(): JsonResponse
    {
        $allBooks = $this->bookService->allBooks();

        return response()->json([
            $allBooks
        ]);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function oneBook(int $id): JsonResponse
    {
        $oneBook = $this->bookService->oneBook($id);

        return response()->json([
            $oneBook
        ]);
    }

    /**
     * @param BookUpdateStoreRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function updateBook(BookUpdateStoreRequest $request, int $id): JsonResponse
    {
        $data = $request->all();
        $updateBook = $this->bookService->updateBook($data, $id);

        return response()->json([
            $updateBook
        ]);
    }

    /**
     * @param BookUpdateStoreRequest $request
     * @return JsonResponse
     */
    public function storeBook(BookUpdateStoreRequest $request): JsonResponse
    {
        $data = $request->all();
        $storeBook = $this->bookService->storeBook($data);

        return response()->json([
            $storeBook
        ]);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroyBook(int $id): JsonResponse
    {
        $destroyBook = $this->bookService->destroyBook($id);

        return response()->json([
            $destroyBook
        ]);

    }
}
