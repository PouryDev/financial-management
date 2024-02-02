<?php

namespace App\Providers;

use App\Repositories\BankCardRepository;
use App\Repositories\TransactionRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('bank_card_repo', BankCardRepository::class);
        $this->app->singleton('transaction_repo', TransactionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
