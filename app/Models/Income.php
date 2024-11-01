<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Constants\PaymentConstants;

class Income extends Model
{
    use SoftDeletes,HasFactory;

    protected $fillable = ['entry_date', 'amount', 'description', 'income_category_id', 'created_by_id', 'mobile_number', 'name', 'payment_method', 'pan_number', 'area'];

    public function category()
    {
        return $this->belongsTo(IncomeCategory::class, 'income_category_id');
    }

    protected $casts = [
        'entry_date' => 'date',
    ];

    public function incomeCategory()
    {
        return $this->belongsTo(IncomeCategory::class, 'income_category_id');
    }

    public static function incomeMethods()
    {
        return PaymentConstants::INCOME_METHODS;
    }
}