<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $properties = Property::available()->recent()->get();
//        $User = User::first();
//        $User->password = '0000';
//        $User->syncChanges();
//        dd($User -> password, $User);

        return view('home', [
            'properties' => $properties,
            'user' => $request->user(),
        ]);
    }
}
