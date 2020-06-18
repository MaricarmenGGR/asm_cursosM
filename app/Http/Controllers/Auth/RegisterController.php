<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'apPaterno'=>['required','string'],
            'apMaterno'=>['required','string'],
            'edad'=>['required'],
            'sexo'=>['required'],
            'edoCivil'=>['required'],
            'calle'=>['required'],
            'colonia'=>['required'],
            'nCasa'=>['required'],
            'telfono'=>['required'],
            'curp'=>['required'],
            'nHijos'=>['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_id' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'area_id'=>['required'],

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
            'apPaterno' => $data['apPaterno'],
            'apMaterno' => $data['apMaterno'],
            'edad' => $data['edad'],
            'sexo' => $data['sexo'],
            'edoCivil' => $data['edoCivil'],
            'calle' => $data['calle'],
            'colonia' => $data['colonia'],
            'nCasa' => $data['nCasa'],
            'telfono' => $data['telfono'],
            'curp' => $data['curp'],
            'nHijos' => $data['nHijos'],
            'email' => $data['email'],
            'role_id' => $data['role_id'],
            'password' => Hash::make($data['password']),
            'area_id' => $data['area_id'],
        ]);
    }
}
