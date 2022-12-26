<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\BookUpdateStoreRequest;
use App\Services\Books\BookService;
use Illuminate\Http\JsonResponse;

final class BookController extends Controller
{
    private BookService $bookService;

    /**
     * BookController constructor.
     * @param BookService $bookService
     */
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * @return JsonResponse
     */
    public function getAllBooks(): JsonResponse
    {
        $books = $this->bookService->getAllBooks();

        return response()->json([
            $books
        ]);
    }

    /**
     * @param int $bookId
     * @return JsonResponse
     */
    public function getBook(int $bookId): JsonResponse
    {
        $book = $this->bookService->getBook($bookId);

        return response()->json([
            $book
        ]);
    }

    /**
     * @param BookUpdateStoreRequest $request
     * @param int $bookId
     * @return JsonResponse
     */
    public function updateBook(BookUpdateStoreRequest $request, int $bookId): JsonResponse
    {
        $validatedData = $request->all();
        $bookData = $this->bookService->updateBook($validatedData, $bookId);

        return response()->json([
            $bookData
        ]);
    }

    /**
     * @param BookUpdateStoreRequest $request
     * @return JsonResponse
     */
    public function createBook(BookUpdateStoreRequest $request): JsonResponse
    {
        $validatedData = $request->all();
        $bookData = $this->bookService->createBook($validatedData);

        return response()->json([
            $bookData
        ]);
    }

    /**
     * @param int $bookId
     * @return JsonResponse
     */
    public function destroyBook(int $bookId): JsonResponse
    {
        $destroyStatus = $this->bookService->destroyBook($bookId);

        return response()->json([
            $destroyStatus
        ]);

    }
}
