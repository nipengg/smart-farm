<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LahanData extends Model
{
    use HasFactory;

    protected $fillable = [
        'lahan_id',
        'temp_val',
        'ph_val',
    ];
}
