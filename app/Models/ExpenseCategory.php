<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ExpenseCategory extends Model
{
    use SoftDeletes,HasFactory;

    protected $fillable = ['name', 'created_by_id'];

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}