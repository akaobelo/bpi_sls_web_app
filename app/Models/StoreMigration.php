<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreMigration extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['migration'];
}
