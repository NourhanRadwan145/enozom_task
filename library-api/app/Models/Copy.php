<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Copy extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

     public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function copies()
    {
        return $this->hasMany(Copy::class);
    }

    public function borrowRecords()
    {
        return $this->hasMany(BorrowRecord::class, 'return_status_id');
    }
}
