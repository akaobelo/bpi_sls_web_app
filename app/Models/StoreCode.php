<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreCode extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['store_code','store_id'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
