<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\shippingMaster;
use Livewire\WithPagination;

class AdminShippingComponent extends Component
{

    use WithPagination;

    public function deleteShipping($id)
    {
        $shipping = shippingMaster::find($id);
        $shipping->delete();
        session()->flash('message','Shipping has been deleted successfully!');

    }

    public function render()
    {
      
        $shippings= shippingMaster::paginate(10);
        return view('livewire.admin.admin-shipping-component',['shippings'=>$shippings])->layout('layouts.base');
    }
}
