<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    //
    protected $fillable = [
        'name',
        'user_id',
        'church_name',
        'season',
        'bible_story',
        'lesson',
        'difficulty',
        'interest',
        'no_child',
        'no_salvation',
        'improvement',
        'feedback',
        'testimony',
        'pictures'
    ];


}
