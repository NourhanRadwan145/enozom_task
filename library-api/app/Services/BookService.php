<?php

namespace App\Services;

use App\Repositories\Contracts\CopyRepositoryInterface;
use App\Repositories\Contracts\BorrowRecordRepositoryInterface;

class BookService
{
    protected $copyRepository;
    protected $borrowRecordRepository;

    public function __construct(
        CopyRepositoryInterface $copyRepository,
        BorrowRecordRepositoryInterface $borrowRecordRepository
    ) {
        $this->copyRepository = $copyRepository;
        $this->borrowRecordRepository = $borrowRecordRepository;
    }

    public function borrowBook($studentId, $copyId)
    {
        // Retrieve the book_id from the copy_id
        $bookId = $this->copyRepository->getBookIdByCopyId($copyId);

        // Check if any copy of the book is available (status_id 5 for 'Available')
        $availableCopiesCount = $this->copyRepository->getAvailableCopiesCount($bookId);

        if ($availableCopiesCount > 0) {
            // Update the status of the copy to 'Borrowed' (status_id 4)
            $this->copyRepository->updateStatus($copyId, 4);

            // Log borrowing process
            $borrowRecord = [
                'student_id' => $studentId,
                'copy_id' => $copyId,
                'borrowed_at' => now(),
            ];

            $this->borrowRecordRepository->create($borrowRecord);

            return response()->json(['message' => 'Book borrowed successfully']);
        } else {
            throw new \Exception('No available copies of this book.');
        }
    }

    public function returnBook($copyId, $returnStatusId)
    {
        // Check if the book has already been returned
        $borrowRecord = $this->borrowRecordRepository->getLatestBorrowRecord($copyId);

        if (!$borrowRecord) {
            throw new \Exception('Book has already been returned.');
        }

        // Update the copy status to the return status
        $this->copyRepository->updateStatus($copyId, $returnStatusId);

        // Update borrow record with return details
        $borrowRecord->returned_at = now();
        $borrowRecord->return_status_id = $returnStatusId;
        $this->borrowRecordRepository->update($borrowRecord->id, $borrowRecord->toArray());

        // Mark the copy as available again
        $this->copyRepository->updateStatus($copyId, $returnStatusId);

        return ['message' => 'Book returned successfully'];
    }

    public function generateReport()
    {
        // Example: Fetch all copies with their book titles and current statuses
        $copies = $this->copyRepository->getAllCopiesWithDetails();

        // Format the report data
        $report = $copies->map(function ($copy) {
            return [
                'book_title' => $copy->book->title,
                'copy_id' => $copy->id,
                'current_status' => $copy->status->name,
            ];
        });

        return $report;
    }
}
