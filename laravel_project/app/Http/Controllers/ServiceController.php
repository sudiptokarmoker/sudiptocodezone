<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        //echo "this is service index page";
        return view('page.service_index');
    }
}
