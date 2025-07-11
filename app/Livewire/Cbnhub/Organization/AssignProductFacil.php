<?php

namespace App\Livewire\Cbnhub\Organization;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AssignProductFacil extends Component
{
    public $selectedProduct;
    public $selectedFacilitator;
    public $organization;
    public string $search = '';
    public string $selectedUserId;
    public bool $showDropdown = false;

    public function selectUser($id)
    {
       
        $this->selectedUserId = $id;
        $this->search = User::find($id)?->name ?? '';
        $this->showDropdown = false;
        
    }

    
    public function render()
    {
        

        if($this->search != ''){
             $user = User::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->limit(10)
            ->get();
        }else{
            $user = User::query()
            ->limit(10)
            ->get();
        }

        $products = DB::table('products')->get();
        return view('livewire.cbnhub.organization.assign-product-facil', [
            'products' => $products,
            'users' => $user,
        ]);
    }

    public function assignProductFacil()
    {
        if (!$this->selectedUserId) {
            session()->flash('error', 'Please select a facilitator.');
            return;
        }

        if (!$this->selectedProduct) {
            session()->flash('error', 'Please select a product.');
            return;
        }
        $currentUser = User::find($this->selectedUserId);
        $currentUser->assignRole('Facilitator');
        $this->organization->products()->attach($this->selectedProduct, [
            'facilitator' => $this->selectedUserId,
            'status' => 'active',
        ]);

       
        

        session()->flash('success', 'Product facilitator assigned successfully.');
        $this->reset(['selectedProduct', 'selectedUserId', 'search']);
        $this->showDropdown = false;
        return redirect()->route('organizations');
    }
}
