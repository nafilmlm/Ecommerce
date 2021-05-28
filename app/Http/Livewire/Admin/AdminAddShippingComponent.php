<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\shippingMaster;
use App\Models\Country;


class AdminAddShippingComponent extends Component
{
    public $country_id;
    public $shippingType;
    public $description;
    public $estimatedDelivery;
    public $cost;
    public $tracking;
    public $carrier;

    public function mount()
    {
        $this->tracking = 0;
      
    }


    public function updated($fields)
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

    
    public function addShipping()
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
        $shipping = new shippingMaster();
        $shipping->countryName = $this->country_id;
        $shipping->shippingType = $this->shippingType;
        $shipping->description = $this->description;
        $shipping->estimatedDelivery = $this->estimatedDelivery;
        $shipping->cost = $this->cost;
        $shipping->tracking = $this->tracking;
        $shipping->carrier = $this->carrier;

        $shipping->save();
        session()->flash('message','Shipping method has been created successfully!');
    }


    public function render()
    {
        $countries = Country::all();
        return view('livewire.admin.admin-add-shipping-component',['countries'=>$countries])->layout('layouts.base');

    }
}
