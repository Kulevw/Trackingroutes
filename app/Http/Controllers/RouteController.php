<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Route;

class RouteController extends Controller
{
    public function show(Request $request, $id) {
        return view('route.route_show_view', [
            'route' => Route::where('id', '=', $id)->first(),
        ]);
    }
}
