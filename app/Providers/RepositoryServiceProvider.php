<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Comment\app\Repository\Classes\CommentClasses;
use Modules\Comment\app\Repository\Interfaces\CommentRepositoryInterface;
use Modules\Product\Repositories\Classes\ProductClass;
use Modules\Product\Repositories\Interfaces\ProductRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class,ProductClass::class);
        $this->app->bind(CommentRepositoryInterface::class,CommentClasses::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
