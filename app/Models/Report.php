<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //

    protected $fillable = [
        'title',
        'description',
        'type', // e.g., 'tpp', 'super5', 'sba', 'sol', 'hdme', 'humanitarian'
        'src_url', // Path to the report file
    ];
}
