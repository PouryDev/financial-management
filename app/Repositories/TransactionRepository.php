<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Contracts\Repository;
use Illuminate\Database\Eloquent\Collection;

class TransactionRepository implements Repository
{

    public function all(array $sort = [], array $search = []): Collection
    {
        $transactions = Transaction::query();
        if (!empty($sort)) {
            $transactions = $transactions->orderBy($sort['field'], $sort['order']);
        }
        if (!empty($search)) {
            $transactions = $transactions->where($search['field'], 'LIKE', "%{$search['value']}%");
        }

        return $transactions->get();
    }

    public function find(string|int $id, string $field = 'id'): ?Transaction
    {
        return Transaction::where($field, $id)->first();
    }

    public function update(string|int $id, array $data, string $field = 'id'): bool
    {
        return Transaction::where($field, $id)->update($data);
    }

    public function store(array $data): ?Transaction
    {
        return Transaction::create($data);
    }

    public function delete(string $id, string $field = 'id'): bool
    {
        return Transaction::where($field, $id)->delete();
    }
}
