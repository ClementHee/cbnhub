<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name', 'description'];

    public function announcements()
    {
        return $this->hasMany(Announcement::class, 'product', 'id');
    }

    public function organizations()
    {
        return $this->hasMany(Organization::class, 'org_product')
            ->withPivot('status', 'facilitator')
            ->withTimestamps();
    }
}
