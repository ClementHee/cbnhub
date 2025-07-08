<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    //
    protected $fillable = ['title', 'content', 'author', 'status','product','addressed_to'];

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }
    public function getAuthor()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product', 'id');
    }
}   