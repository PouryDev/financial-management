<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $transactions = Transaction::factory(4)->create([
            'user_id' => $user->id,
            'bank_card_id' => null,
        ]);

        $amount = 0;
        foreach ($transactions as $transaction) {
            $amount += $transaction->amount;
        }

        $user->balance += $amount;
        $user->save();
    }
}
