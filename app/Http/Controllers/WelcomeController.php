<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Route;

class WelcomeController extends Controller
{
    function index(Request $request) {
        return view('welcome', [ 
            'routes' => Route::get(),
        ]);
    }
}
