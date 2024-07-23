<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaugeReading extends Model
{
    use HasFactory;

    protected $table = 'consumers';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'gender',
        'ip_address',
    ];
}
