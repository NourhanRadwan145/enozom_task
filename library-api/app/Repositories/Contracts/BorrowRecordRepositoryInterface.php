<?php

namespace App\Repositories\Contracts;

interface BorrowRecordRepositoryInterface
{
    public function create(array $data);
    public function update($id, array $data);
    public function getLatestBorrowRecord($copyId);
}
