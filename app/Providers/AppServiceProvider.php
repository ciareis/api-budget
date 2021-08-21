<?php

namespace App\Providers;

use App\Domains\Budgets\Contracts\BudgetRepositoryContract;
use App\Domains\Budgets\Repositories\BudgetRepositoryPostgres;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        setLocale(LC_TIME, 'pt_BR');
        Carbon::setLocale(LC_TIME, 'pt_BR');

        $this->app->singleton(BudgetRepositoryContract::class, function ($app) {
            return new BudgetRepositoryPostgres();
        });

        // $this->app->bind(BudgetRepositoryContract::class, function () {
        //     return new BudgetRepositoryPostgres();
        // });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setLocale(LC_TIME, 'pt_BR');
        Carbon::setLocale(LC_TIME, 'pt_BR');
        //
    }
}
