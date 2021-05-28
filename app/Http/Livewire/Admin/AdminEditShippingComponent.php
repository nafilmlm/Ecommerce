<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\shippingMaster;

class AdminEditShippingComponent extends Component
{

    public $country_id;
    public $shippingType;
    public $description;
    public $estimatedDelivery;
    public $cost;
    public $tracking;
    public $carrier;
    public $shipping_id;
    public $ship_id;

    public function mount($shipping_id)
    {
        $this->shipping_id = $shipping_id;
        $shipping = shippingMaster::find($shipping_id);
        $this->$country_id = $shipping->country_id;
        $this->$shippingType = $shipping->shippingType;
        $this->$description = $shipping->description;
        $this->$estimatedDelivery = $shipping->estimatedDelivery;
        $this->$cost = $shipping->cost;
        $this->$tracking = $shipping->tracking;
        $this->$carrier = $shipping->carrier;
        $this->ship_id = $ship_id->id;      
      
    }

  

    public function update($fields)
    {
        $this->validateOnly($fields,[
            'country_id' => 'required',
            'shippingType' => 'required',
            'description' => 'nullable',
            'estimatedDelivery' => 'required',
            'cost' => 'numeric|nullable',
            'tracking' => 'required',
            'carrier' => 'required'

        ]);
    }

    
    public function updateShipping()
    {
        $this->validate([
            'country_id' => 'required',
            'shippingType' => 'required',
            'description' => 'nullable',
            'estimatedDelivery' => 'required',
            'cost' => 'numeric|nullable',
            'tracking' => 'required',
            'carrier' => 'required'

        ]);
        $shipping = shippingMaster::find($this->shipping_id);
        $shipping->countryName = $this->country_id;
        $shipping->shippingType = $this->shippingType;
        $shipping->description = $this->description;
        $shipping->estimatedDelivery = $this->estimatedDelivery;
        $shipping->cost = $this->cost;
        $shipping->tracking = $this->tracking;
        $shipping->carrier = $this->carrier;

        $shipping->save();
        session()->flash('message','Shipping has been updated successfully!');
    }

    public function render()
    {
        $countries = Country::all();
        return view('livewire.admin.admin-edit-shipping-component',['countries'=>$countries])->layout('layouts.base');

    }
}
