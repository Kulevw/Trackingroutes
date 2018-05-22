<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'login' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'lastname' => 'required|string|min:2|max:255',
            'firstname' => 'required|string|min:2|max:255',
            'middlename' => '',
            'series_number' => 'required|max:255',
            'date_issued' => 'required|max:255',
            'issued_by' => 'required',
            'phone' => 'required|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'login' => $data['login'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'lastname' => $data['lastname'],
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'series_number' => $data['series_number'],
            'date_issued' => $data['date_issued'],
            'issued_by' => $data['issued_by'],
            'phone' => $data['phone'],
        ]);
    }
}
