<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(){
        $this->customerAuthcheck();

        return view('pages.checkout');
    }
}
