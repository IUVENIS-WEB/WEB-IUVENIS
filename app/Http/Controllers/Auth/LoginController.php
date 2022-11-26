<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\User;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
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
        $this->middleware('guest', ['except' => 'logout']);
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            // dd(Socialite::driver('google')->user());
            $user =  Socialite::driver('google')->user();
            // dd($user);
            session(['user' => $user]);
            $authUser = User::where('google_id', $user->id)->first();
            if ($authUser) {
                Auth::login($authUser, true);
                return redirect()->route('iuvenis.index');
            }
            return view('login.google.formData');
        } catch (Exception $e) {
            redirect()->back();
        }
    }
    public function formData(Request $request)
    {
        $user = $request->session()->get('user');
        //dd($user);
        $authUser = $this->createUser($user, $request->data);
        Auth::login($authUser, true);
        return redirect()->route('iuvenis.index');
    }

    public function createUser($user, $data)
    {

        $authUser = User::where('google_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        $newUser = new User();

        $newUser->nome = $user->name;
        $newUser->google_id = $user->id;
        $newUser->nascimento = $data;
        $newUser->email = $user->email;
        $newUser->save();
        return $newUser;
    }
}
