<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory, HasFactory;

    protected $fillable = [
        'title', 'description', 'job_id',
    ];
}
