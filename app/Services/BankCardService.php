<?php

namespace App\Services;

use App\Facades\BankCard;
use App\Models\BankCard as BankCardModel;
use App\Models\User;
use Ramsey\Uuid\Uuid;

class BankCardService
{
    /**
     * Store new bank card in db
     *
     * @param string $title
     * @param string $number
     * @param int $userID
     * @return null|BankCardModel
     */
    public static function create(string $title, string $number, int $userID): ?BankCardModel
    {
        # Store bank card in db and return false on failure
        return BankCard::store([
            'id' => Uuid::uuid4()->toString(),
            'title' => $title,
            'number' => $number,
            'user_id' => $userID,
        ]);
    }

    /**
     * Update existing bank card in db
     *
     * @param string $id
     * @param string $title
     * @param string $number
     * @return bool
     */
    public static function update(string $id, string $title, string $number): bool
    {
        return BankCard::update($id, [
            'title' => $title,
            'number' => $number,
        ]);
    }

    /**
     * Delete bank card from db if it has no transactions
     *
     * @param string $id
     * @return bool
     */
    public static function delete(string $id): bool
    {
        # Check if bank card has no transactions
        if (BankCard::hasTransaction($id)) {
            return false;
        }

        return BankCard::delete($id);
    }

    public static function get(string $id): ?BankCardModel
    {
        return BankCard::find($id);
    }

    /**
     * Transfer an amount between two bank cards
     *
     * @param float $amount
     * @param BankCardModel|User $originCard
     * @param BankCardModel|User $destCard
     * @return void
     */
    public static function transfer(float $amount, BankCardModel|User $originCard, BankCardModel|User $destCard): void
    {
        $originCard->balance -= $amount;
        $originCard->save();

        $destCard->balance += $amount;
        $destCard->save();
    }
}
