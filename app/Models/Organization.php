<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    //
    protected $table = 'organizations';
    protected $fillable = [
        'church_code',
        'name',
        'address',
        'province',
        'city',
        'district',
        'village',
        'postal_code',
        'pastor_name',
        'pastor_email',
        'pastor_phone',
        'pastor_alt_phone',
        'agree_tnc',
        'synod_id',
    ];

    public function approvedChurch(){

    }
}
