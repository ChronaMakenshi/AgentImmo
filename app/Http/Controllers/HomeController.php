<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    Public function index(){
        $properties = Property::orderBy('created_at', 'desc')->get();
        return view('home', ['properties' => $properties]);
    }
}
