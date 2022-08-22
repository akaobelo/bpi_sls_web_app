<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['store','bu_id'];

    public function businessUnit()
    {
        return $this->belongsTo(BusinessUnit::class);
    }

    public function storeCode()
    {
        return $this->hasMany(StoreCode::class);
    }
}
