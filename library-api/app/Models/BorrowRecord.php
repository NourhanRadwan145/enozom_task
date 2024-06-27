<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'copy_id',
        'borrowed_at',
        'expected_return_at',
        'returned_at',
        'return_status_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function copy()
    {
        return $this->belongsTo(Copy::class);
    }

    public function returnStatus()
    {
        return $this->belongsTo(Status::class, 'return_status_id');
    }
}
