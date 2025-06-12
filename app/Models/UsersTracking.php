<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersTracking extends Model
{
    //

    protected $fillable = ['user_id', 'ip_address', 'user_agent'];
    protected $table = 'users_trackings';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getUserAgentAttribute($value)
    {
        return json_decode($value, true);
    }
    public function setUserAgentAttribute($value)
    {
        $this->attributes['user_agent'] = json_encode($value);
    }
    public function getIpAddressAttribute($value)
    {
        return json_decode($value, true);
    }
    public function setIpAddressAttribute($value)
    {
        $this->attributes['ip_address'] = json_encode($value);
    }
    public function scopeLatestTracking($query, $userId)
    {
        return $query->where('user_id', $userId)->latest()->first();
    }
}
