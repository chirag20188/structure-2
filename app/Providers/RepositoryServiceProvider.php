<?php

namespace App\Providers;
use App\Contracts\UserContract;
use App\Contracts\FaqContract;
use App\Contracts\ImageContract;
use App\Contracts\CmsContract;
use App\Repositories\UserRepository;
use App\Repositories\FaqRepository;
use App\Repositories\ImageRepository;
use App\Repositories\CmsRepository;
use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserContract::class, UserRepository::class);
        $this->app->bind(FaqContract::class, FaqRepository::class);
        $this->app->bind(ImageContract::class, ImageRepository::class);
        $this->app->bind(CmsContract::class, CmsRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
