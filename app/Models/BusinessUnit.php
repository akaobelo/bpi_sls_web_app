<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessUnit extends Model
{
    use HasFactory;

    protected $fillable = ['business_unit'];

    public function stores()
    {
        return $this->hasMany(Store::class);
    }
}
