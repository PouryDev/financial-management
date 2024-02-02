<?php

namespace App\Facades;

use App\Contracts\Repository;
use App\Models\Transaction as TransactionModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Collection all(array $sort = [], array $search = [])
 * @method static TransactionModel|null find(string|int $id, string $field = 'id')
 * @method static bool update(string|int $id, array $data, string $field = 'id')
 * @method static TransactionModel|null store(array $data)
 * @method static bool delete(string $id, string $field = 'id')
 *
 * @see Repository
 */

class Transaction extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'transaction_repo';
    }
}
