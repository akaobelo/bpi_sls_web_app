<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreData extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['bum','before_price','stock_no','vendor_code'];
}
