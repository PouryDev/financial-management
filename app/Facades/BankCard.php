<?php

namespace App\Facades;

use App\Models\BankCard as BankCardModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Collection all(array $sort = [], array $search = [])
 * @method static BankCardModel|null find(string|int $id, string $field = 'id')
 * @method static bool update(string|int $id, array $data, string $field = 'id')
 * @method static BankCardModel|null store(array $data)
 * @method static bool delete(string $id, string $field = 'id')
 * @method static bool hasTransaction(string $id)
 *
 * @see Repository
 */

class BankCard extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'bank_card_repo';
    }
}
