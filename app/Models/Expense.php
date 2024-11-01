<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Constants\PaymentConstants;

class Expense extends Model
{
    use SoftDeletes,HasFactory;

    protected $fillable = ['entry_date', 'amount', 'description', 'expense_category_id', 'created_by_id', 'name', 'payment_method', 'mobile_number', 'pan_number', 'area'];

    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class, 'expense_category_id');
    }

    protected $casts = [
        'entry_date' => 'date',
    ];
    
    public function expenseCategory()
    {
        return $this->belongsTo(ExpenseCategory::class, 'expense_category_id');
    }
    public static function incomeMethods()
    {
        return PaymentConstants::INCOME_METHODS;
    }
}
