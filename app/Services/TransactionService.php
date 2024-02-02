<?php

namespace App\Services;

use App\Facades\Transaction;
use App\Models\Transaction as TransactionModel;
use Ramsey\Uuid\Uuid;

class TransactionService
{
    /**
     * Store transaction in db
     *
     * @param string $title
     * @param float $amount
     * @param string $userID
     * @param string|null $bankCardID
     * @return null|TransactionModel
     */
    public static function create(
        string $title,
        float $amount,
        string $userID,
        string $bankCardID = null
    ): ?TransactionModel
    {
        return Transaction::store([
            'id' => Uuid::uuid4()->toString(),
            'user_id' => $userID,
            'amount' => $amount,
            'title' => $title,
            'bank_card_id' => $bankCardID,
        ]);
    }

    /**
     * Update an existing transaction in db
     *
     * @param string $id
     * @param string|null $title
     * @param float|null $amount
     * @param string|null $bankCardID
     * @return float
     */
    public static function update(
        string $id,
        string $title = null,
        float $amount = null,
        string $bankCardID = null
    ): float
    {
        $transaction = Transaction::find($id);

        if (!is_null($amount)) {
            # Get difference between old and new amount
            $diff = round($amount - (float)$transaction->amount, 2);
        }

        # Update transaction
        Transaction::update($id, [
            'amount' => $amount ?? $transaction->amount,
            'title' => $title ?? $transaction->title,
            'bank_card_id' => $bankCardID ?? $transaction->bank_card_id,
        ]);

        return $diff ?? 0;
    }

    /**
     * Delete transaction from db
     *
     * @param string $id
     * @return float
     */
    public static function delete(string $id): float
    {
        $transaction = Transaction::find($id);

        # Get current amount to return at last
        $amount = -$transaction->amount;
        # Delete transaction
        Transaction::delete($id);

        return $amount;
    }

    public static function get(string $id): ?TransactionModel
    {
        return Transaction::find($id);
    }
}
