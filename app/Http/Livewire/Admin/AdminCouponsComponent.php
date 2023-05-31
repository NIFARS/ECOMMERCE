<?php

namespace App\Http\Livewire\Admin;

use App\Models\coupon;
use Livewire\Component;

class AdminCouponsComponent extends Component
{

public function deletecoupon($coupon_id){
    $coupon =coupon::find($coupon_id);
    $coupon ->delete();
session()->flash('message','Coupon has been deleted successfully');
}

    public function render()
    {
        $coupons=coupon::all();
        return view('livewire.admin.admin-coupons-component',['coupons'=>$coupons])->layout('layouts.base');
    }
}
