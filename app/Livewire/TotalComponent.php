<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Income;
use App\Models\Expense;

class TotalComponent extends Component
{
    public $totalUsers;
    public $totalIncome;
    public $totalExpenses;

    public function mount()
    {
        // Fetch the total users, income, and expenses from the database
        $this->totalUsers = User::count();
        $this->totalIncome = Income::sum('amount'); // Adjust 'amount' based on your income field name
        $this->totalExpenses = Expense::sum('amount'); // Adjust 'amount' based on your expense field name
    }

    public function render()
    {
        return view('livewire.total-component');
    }
}