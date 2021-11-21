<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;

class Transactions extends Component
{

    public $showEditModal = false;
    public Transaction $editing;

    public function rules()
    {
        return [
            'editing.title' => 'required|min:3',
            'editing.amount' => 'required',
            'editing.date_for_editing' => 'required',
        ];
    }

    public function mount()
    {
        $this->editing = Transaction::find(1);
    }

    public function edit(Transaction $transaction)
    {
        $this->editing = $transaction;
        $this->showEditModal = true;
    }

    public function save()
    {
        $this->validate();
        $this->editing->save();
        $this->showEditModal = false;
    }

    public function render()
    {
        return view('livewire.transactions', [
            'transactions' => Transaction::all(),
        ]);
    }
}
