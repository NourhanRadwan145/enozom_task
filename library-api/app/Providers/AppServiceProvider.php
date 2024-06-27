<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\CopyRepositoryInterface;
use App\Repositories\Contracts\BorrowRecordRepositoryInterface;
use App\Repositories\CopyRepository;
use App\Repositories\BorrowRecordRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CopyRepositoryInterface::class, CopyRepository::class);
        $this->app->bind(BorrowRecordRepositoryInterface::class, BorrowRecordRepository::class);
    }

    public function boot()
    {
        //
    }
}

