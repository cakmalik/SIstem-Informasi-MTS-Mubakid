<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable=['user_id','bill_type_id','reference', 'merchant_ref','total_amount','status','is_cash'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function bill_type()
    {
        return $this->belongsTo(BillType::class);
    }
}
