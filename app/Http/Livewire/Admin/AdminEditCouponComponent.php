<?php

namespace App\Http\Livewire\Admin;

use App\Models\coupon;
use Livewire\Component;

class AdminEditCouponComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
  public $coupon_id;
  public $expiry_data;


  public function mount($coupon_id)
  {
      $coupon = coupon::find($coupon_id);
      $this->code = $coupon->code;

      $this->type = $coupon->type;
      $this->value = $coupon->value;
      $this->cart_value = $coupon->cart_value;
      $this->coupon_id=$coupon->id;
      $this->expiry_data = $coupon->expiry_data;
  }


    public function updated($fields){
        $this->validateOnly($fields,[
            'code'=>'required',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_data'=>'required'

        ]);

    }



    public function updateCoupon(){
        $this->validate([
            'code'=>'required',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_data'=>'required'

        ]);
        $coupon =coupon::find($this->coupon_id);
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value=$this->cart_value;
        $coupon->expiry_data=$this->expiry_data;

        $coupon->save();
        session()->flash('message','Coupon has been created successfully!');
    }



    public function render()
    {
        return view('livewire.admin.admin-edit-coupon-component')->layout('layouts.base');
    }
}
