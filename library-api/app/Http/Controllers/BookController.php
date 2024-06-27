<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BookService;

/**
 * @OA\Info(
 *     title="Library API",
 *     version="1.0.0",
 *     description="API documentation for the Library system",
 *     @OA\Contact(
 *         email="nourhanradwan862@gmail.com",
 *         name="Nourhan"
 *     ),
 *     @OA\License(
 *         name="MIT License",
 *         url="https://opensource.org/licenses/MIT"
 *     )
 * )
 */

 class BookController extends Controller
 {
     protected $bookService;

     public function __construct(BookService $bookService)
     {
         $this->bookService = $bookService;
     }

     /**
      * @OA\Post(
      *     path="/api/borrow-book",
      *     summary="Borrow a book",
      *     tags={"Book"},
      *     @OA\RequestBody(
      *         required=true,
      *         @OA\JsonContent(
      *             @OA\Property(property="student_id", type="integer"),
      *             @OA\Property(property="copy_id", type="integer")
      *         )
      *     ),
      *     @OA\Response(
      *         response=200,
      *         description="Book borrowed successfully"
      *     ),
      *     @OA\Response(
      *         response=400,
      *         description="Failed to borrow book"
      *     )
      * )
      */
     public function borrowBook(Request $request)
     {
         $studentId = $request->input('student_id');
         $copyId = $request->input('copy_id');

         try {
             $this->bookService->borrowBook($studentId, $copyId);
             return response()->json(['message' => 'Book borrowed successfully']);
         } catch (\Exception $e) {
             return response()->json([
                 'message' => 'Failed to borrow book',
                 'error' => $e->getMessage()
             ], 400);
         }
     }

     /**
      * @OA\Post(
      *     path="/api/return-book",
      *     summary="Return a book",
      *     tags={"Book"},
      *     @OA\RequestBody(
      *         required=true,
      *         @OA\JsonContent(
      *             @OA\Property(property="copy_id", type="integer"),
      *             @OA\Property(property="return_status_id", type="integer")
      *         )
      *     ),
      *     @OA\Response(
      *         response=200,
      *         description="Book returned successfully"
      *     ),
      *     @OA\Response(
      *         response=400,
      *         description="Failed to return book"
      *     )
      * )
      */
     public function returnBook(Request $request)
     {
         $copyId = $request->input('copy_id');
         $returnStatusId = $request->input('return_status_id');

         try {
             $this->bookService->returnBook($copyId, $returnStatusId);
             return response()->json(['message' => 'Book returned successfully']);
         } catch (\Exception $e) {
             return response()->json([
                 'message' => 'Failed to return book',
                 'error' => $e->getMessage()
             ], 400);
         }
     }

     /**
      * @OA\Get(
      *     path="/api/generate-report",
      *     summary="Generate a report of all book copies and their statuses",
      *     tags={"Report"},
      *     @OA\Response(
      *         response=200,
      *         description="Report generated successfully"
      *     )
      * )
      */
     public function generateReport()
     {
         $report = $this->bookService->generateReport();
         return response()->json(['report' => $report]);
     }
 }
