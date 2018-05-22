<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users_group;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users_group = Users_group::
            leftJoin('groups', 'users_groups.group_id', '=', 'groups.id')->
            leftJoin('routes', 'groups.route_id', '=', 'routes.id')->
            select(
                'routes.id as route_id',
                'routes.fullname as route_name',
                'groups.start_plan',
                'groups.end')->                
            where('user_id','=',Auth::user()->id)->orderby('end')->get();

        return view('home', ['my_routes' => $users_group]);
    }
}
