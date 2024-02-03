<?php

namespace Database\Factories;

use App\Models\BankCard;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Uuid;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Uuid::uuid4()->toString(),
            'user_id' => User::factory()->create()->id,
            'bank_card_id' => BankCard::first(),
            'amount' => $this->faker->numberBetween(1000000, 1000000),
            'title' => $this->faker->title,
            'paid_at' => now(),
        ];
    }
}
