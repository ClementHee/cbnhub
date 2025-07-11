<?php

namespace App\Livewire\Cbnhub\Organization;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class OrgForm extends Component
{
    public $church_code;
    public $name;
    public $address;
    public $province;           
    public $city;
    public $district;
    public $village;
    public $postal_code;
    public $pastor_name;
    public $pastor_email;
    public $pastor_phone;
    public $pastor_alt_phone;
    public $agree_tnc;
    public $synod_id;
    public $organization;
    public $update = false; // Flag to indicate if this is an update operation
    public $mode = 'view_only'; // Default mode is editable

    public function mount(){
        if ($this->organization) {
            $this->church_code = $this->organization->church_code;
            $this->name = $this->organization->name;
            $this->address = $this->organization->address;
            $this->province = $this->organization->province;
            $this->city = $this->organization->city;
            $this->district = $this->organization->district;
            $this->village = $this->organization->village;
            $this->postal_code = $this->organization->postal_code;
            $this->pastor_name = $this->organization->pastor_name;
            $this->pastor_email = $this->organization->pastor_email;
            $this->pastor_phone = $this->organization->pastor_phone;
            $this->pastor_alt_phone = $this->organization->pastor_alt_phone;
            $this->agree_tnc = $this->organization->agree_tnc;
            $this->synod_id = $this->organization->synod_id;

            $this->update= true; // Indicate that this is an update operation
        }
        if($this->mode){
            $this->mode = $this->mode; // Set the mode if provided

        } 
        $this->agree_tnc = false; // Default value for agree_tnc
    }
    public function render()
    {
    
     
        $provinces = DB::table('province')->get();

        if($this->province != null){
            $citys = DB::table('city')->where('province_id', $this->province)->get();
        }else{
            $citys = DB::table('city')->get();
        }
        if($this->city != null){
       
            $districts = DB::table('district')->where('regency_id', $this->city)->get();
        }else{
            $districts = DB::table('district')->get();
        }

   
        return view('livewire.cbnhub.organization.org-form', [
            'provinces' => $provinces,
            'citys' => $citys,
            'districts' => $districts,
        ]);
    }

    public function createOrganization(){

        $this->validate([
         
            'name' => 'required',
            'address' => 'required|string|max:255',
            'province' => 'required|exists:province,id',
            'city' => 'required|exists:city,id',
            'district' => 'nullable|exists:district,id',
            'village' => 'nullable|string|max:255',
            'postal_code' => 'required|string|max:20',
            'pastor_name' => 'required|string|max:100',
            'pastor_email' => 'required|email|max:100',
            'pastor_phone' => 'required|string|max:20',
            'pastor_alt_phone' => 'nullable|string|max:20',
            
            'synod_id' => 'nullable|string|max:50',
        ]);

        DB::table('organizations')->insert([
            'church_code' => $this->church_code,
            'name' => $this->name,
            'address' => $this->address,
            'province' => $this->province,
            'city' => $this->city,
            'district' => $this->district,
            'village' => $this->village,
            'postal_code' => $this->postal_code,
            'pastor_name' => $this->pastor_name,
            'pastor_email' => $this->pastor_email,
            'pastor_phone' => $this->pastor_phone,
            'pastor_alt_phone' => $this->pastor_alt_phone,
            'agree_tnc' => $this->agree_tnc,
            'synod_id' => $this->synod_id,
        ]);

        session()->flash('message', __('Organization created successfully.'));
        return redirect()->route('organizations');
    }

    public function updateOrganization()
    {
        $this->validate([
            'name' => 'required',
            'address' => 'required|string|max:255',
            'province' => 'required|exists:province,id',
            'city' => 'required|exists:city,id',
            'district' => 'nullable|exists:district,id',
            'village' => 'nullable|string|max:255',
            'postal_code' => 'required|string|max:20',
            'pastor_name' => 'required|string|max:100',
            'pastor_email' => 'required|email|max:100',
            'pastor_phone' => 'required|string|max:20',
            'pastor_alt_phone' => 'nullable|string|max:20',
            'synod_id' => 'nullable|string|max:50',
        ]);

        $this->organization->update([
            'church_code' => $this->church_code,
            'name' => $this->name,
            'address' => $this->address,
            'province' => $this->province,
            'city' => $this->city,
            'district' => $this->district,
            'village' => $this->village,
            'postal_code' => $this->postal_code,
            'pastor_name' => $this->pastor_name,
            'pastor_email' => $this->pastor_email,
            'pastor_phone' => $this->pastor_phone,
            'pastor_alt_phone' => $this->pastor_alt_phone,
           
            'synod_id' => $this->synod_id,
        ]);

        session()->flash('message', __('Organization updated successfully.'));
        return redirect()->route('organizations');
    }

   


}
