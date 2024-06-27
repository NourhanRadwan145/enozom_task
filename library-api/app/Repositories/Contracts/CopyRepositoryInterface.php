<?php

namespace App\Repositories\Contracts;

interface CopyRepositoryInterface
{
    public function getById($id);
    public function updateStatus($copyId, $newStatusId);
    public function getAvailableCopiesCount($bookId);
    public function getBookIdByCopyId($copyId);
    public function getAllCopiesWithDetails();
}
