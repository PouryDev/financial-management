<?php

namespace App\Repositories;

use App\Models\BankCard;
use App\Models\Transaction;
use App\Contracts\Repository;
use Illuminate\Database\Eloquent\Collection;

class BankCardRepository implements Repository
{
    public function all(array $sort = [], array $search = []): Collection
    {
        $cards = BankCard::query();
        if (!empty($sort)) {
            $cards = $cards->orderBy($sort['field'], $sort['order']);
        }
        if (!empty($search)) {
            $cards = $cards->where($search['field'], 'LIKE', "%{$search['value']}%");
        }

        return $cards->get();
    }

    public function find(string|int $id, string $field = 'id'): ?BankCard
    {
        return BankCard::where($field, $id)->first();
    }

    public function update(string|int $id, array $data, string $field = 'id'): bool
    {
        return BankCard::where($field, $id)->update($data);
    }

    public function store(array $data): ?BankCard
    {
        return BankCard::create($data);
    }

    public function delete(string $id, string $field = 'id'): bool
    {
        return BankCard::where($field, $id)->delete();
    }

    /**
     * Returns true if bank card has transactions
     *
     * @param string $id
     * @return bool
     */
    public function hasTransaction(string $id): bool
    {
        return Transaction::where('bank_card_id', $id)->exists();
    }
}
