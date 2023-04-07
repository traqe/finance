<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $fillable = ['name', 'reference', 'amount', 'profit_loss', 'overall_balance'];
}
