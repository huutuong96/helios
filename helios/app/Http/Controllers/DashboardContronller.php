<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardContronller extends Controller
{
    function index(){
        return view("BackEnd.pages.dashboard");
    }
}
