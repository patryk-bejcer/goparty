<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomPagesController extends Controller
{
    public function contact() {
        return view( 'site.pages.contact' );
    }
    public function privatePolicy() {
        return view( 'site.pages.private-policy' );
    }
}
