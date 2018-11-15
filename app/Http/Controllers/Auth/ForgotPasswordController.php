<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public  function showLinkRequestForm()
    {
        $gallery = Product::all()->random(6);
        return view('auth.passwords.email')->with('gallery', $gallery);
    }
}
