<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function index(){return view('frontend.index');}
    public function invitation(){return view('frontend.invitation');}
    public function service(){return view('frontend.service');}
    public function vendor(){return view('frontend.vendor');}
    public function venue(){return view('frontend.venue');}
    public function contactus(){return view('frontend.contact-us');}
}
