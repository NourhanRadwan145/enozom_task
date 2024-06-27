<?php

namespace App\Repositories;

use App\Models\Copy;
use App\Repositories\Contracts\CopyRepositoryInterface;

class CopyRepository implements CopyRepositoryInterface
{
    public function getById($id)
    {
        return Copy::findOrFail($id);
    }

    public function updateStatus($copyId, $newStatusId)
    {
        $copy = Copy::findOrFail($copyId);
        $copy->status_id = $newStatusId;
        $copy->save();
    }

    public function getAvailableCopiesCount($bookId)
    {
        return Copy::where('book_id', $bookId)
            ->where('status_id', 3) || where('status_id', 1)
            ->count();
    }

    public function getBookIdByCopyId($copyId)
    {
        $copy = Copy::findOrFail($copyId);
        return $copy->book_id;
    }

    public function getAllCopiesWithDetails()
    {
        return Copy::with('book', 'status')->get();
    }
}
