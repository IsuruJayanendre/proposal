<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'gender',
        'nationality',
        'age',
        'birthday',
        'district',
        'city',
        'job',
        'education',
        'image',
        'contact',
    ];
}
