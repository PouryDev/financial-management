<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class Transaction extends Component
{
    use WithPagination;

    public function render(): View
    {
        $transactions = auth()->user()
            ->transactions()
            ->orderByDesc('paid_at')
            ->paginate(10)
            ->withQueryString();
        return view('livewire.transaction', compact('transactions'))
            ->layout('livewire.layouts.app');
    }
}
