<?php

namespace App\Http\Controllers\Frontend\Auth;

use Validator;
use Auth;
use Mail;
use App\User;
use App\Role;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    protected $redirectPath = '/';
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'steam_id' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'steam_id' => $data['steam_id'],
            'password' => bcrypt(str_random(40)),
        ]);
    }

    public function getLogin()
    {
        return view('frontend.auth.login');
    }
    public function validateLogin()
    {
        $steam_id = \SteamLogin::validate();

        $user = User::where('steam_id',$steam_id)->first();
        if (is_null($user)) {
            return view('frontend.auth.register')->with('steam_id',$steam_id);
        } else {
            Auth::login($user);
            \Log::info('User has logged in.', ['id'=> $user->id]);
            return redirect('/');
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function postRegister(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'steam_id' => $request->steam_id,
            'password' => bcrypt(str_random(40)),
            'okEmail' => $request->okEmail,
        ]);
        $role = Role::where('name','user')->first();
        $user->attachRole($role);
        $this->emailUser($user);
        Auth::login($user);
        return redirect('/');
    }

    public function impersonate($id)
    {
        $user = User::find($id);
        Auth::logout();
        Auth::login($user);
        \Log::info('User has logged in.', ['id'=> $user->id]);
        return redirect('/');
    }


    /**
     * Email's User
     * @param $user
     */
    private function emailUser($user)
    {

        Mail::send('emails.newAccount', ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, 'User');
            $m->subject('1st RRF - Registration Successful');
            $m->from('no-reply@1st-rrf.com','1st Rapid Response Force');
            $m->sender('no-reply@1st-rrf.com','1st Rapid Response Force');
        });
    }
}
