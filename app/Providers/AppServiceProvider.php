<?php

namespace App\Providers;
use App\Models\Torneo;
use App\Models\Partido;

use App\Policies\TorneoPolicy;
use App\Policies\PartidoPolicy;

use Illuminate\Support\Facades\Gate;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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
        Gate::policy(Torneo::class, TorneoPolicy::class);
    Gate::policy(Partido::class, PartidoPolicy::class);
    }
}
