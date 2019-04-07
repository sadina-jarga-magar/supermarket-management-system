<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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

        //   request()->validate([

        //     'name' => 'required|min:2|max:50',

        //     'phone_no' => 'required|numeric',            

        //     'email' => 'required|email|unique:users',

        //     'password' => 'required|min:6',                

        //     'confirm_password' => 'required|min:6|max:20|same:password',

            

        // ], [

            // 'name.required' => 'Name is required',

            // 'name.min' => 'Name must be at least 2 characters.',

            // 'name.max' => 'Name should not be greater than 50 characters.',

            // 'phone_no.max' => 'Phone number should be in numeric than less than 12 numbers.',

           

        // ]);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:255'],
            'phone_no' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           'password' => ['required', 
               'min:6', 
               'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/', 
               'confirmed']
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
            'name' => $data['name'],
            'address' => $data['address'],
            'phone_no' => $data['phone_no'],
            'gender' => $data['sex'], //gender name must be same as sex.
            'date_of_birth' => $data['date_of_birth'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'usertype_id' => 2,
        ]);
    }
}
