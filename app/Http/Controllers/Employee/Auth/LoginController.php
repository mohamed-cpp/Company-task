<?php

namespace App\Http\Controllers\Employee\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * Where to redirect users after login.
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
        $this->middleware('guest:employee')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('employee.auth.login');
    }

    /**
     * Validate the user login request.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => ['required','string' ],
            'password' => ['required','string'],
        ]);

    }


    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }



    /**
     * Change login response if expects json
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function loginJsonResponse(Request $request)
    {
        if ($request->expectsJson()) {
            $intended = $path = session()->pull('url.intended', "/");
            return response()->json([
                "redirectTo" => $intended
            ]);
        }

        return redirect()->intended('employee.home');
    }

    public function redirectTo() {
        return route('employee.home');
    }

    /**
     * return Guard
     * @return mixed
     */
    public function guard()
    {
        return Auth::guard('employee');
    }

}
