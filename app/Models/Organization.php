<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Facades\DB;
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
    
    public function generateChurchCode()
    {
        
        $city_code = DB::table('city')
            ->where('id', $this->city)
            ->value('city_code');

        $batch = now()->format('Ym');

        $running_code = DB::table('organizations')
            ->where('church_code', 'like', $city_code . '%')
            ->count();

        $running_code = str_pad($running_code + 1, 4, '0', STR_PAD_LEFT);

        Organization::where('id', $this->id)->update([
            'church_code' => $city_code . $batch . $running_code
        ]);
       
    }

    public function hasFacilitator(){
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        
        return $this->belongsToMany(Product::class, 'org_product')
            ->withPivot('status', 'facilitator')
            ->withTimestamps();

           
    }
}
