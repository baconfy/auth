<?php

namespace Baconfy\Auth\Ui\Web\Controllers;

use App\Http\Controllers\Controller;
use Baconfy\Auth\AuthServiceProvider;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = AuthServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return Response
     */
    public function showLoginForm()
    {
        return view('ui::auth.login');
    }
}
