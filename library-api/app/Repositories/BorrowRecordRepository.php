<?php

namespace App\Repositories;

use App\Models\BorrowRecord;
use App\Repositories\Contracts\BorrowRecordRepositoryInterface;

class BorrowRecordRepository implements BorrowRecordRepositoryInterface
{
    public function create(array $data)
    {
        return BorrowRecord::create($data);
    }

    public function update($id, array $data)
    {
        $borrowRecord = BorrowRecord::findOrFail($id);
        $borrowRecord->update($data);
        return $borrowRecord;
    }

    public function getLatestBorrowRecord($copyId)
    {
        return BorrowRecord::where('copy_id', $copyId)
            ->whereNull('returned_at')
            ->latest()
            ->first();
    }
}
