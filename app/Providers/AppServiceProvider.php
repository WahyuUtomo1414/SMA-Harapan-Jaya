<?php

namespace App\Providers;

use App\Traits\BaseModelSoftDelete as BaseModelSoftDeleteTrait;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    use BaseModelSoftDeleteTrait;
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blueprint::macro('baseModelSoftDelete', function (): void {
            /** @var Blueprint $this */
            (new class {
                use BaseModelSoftDeleteTrait;
            })->base($this);
        });
    }
}
