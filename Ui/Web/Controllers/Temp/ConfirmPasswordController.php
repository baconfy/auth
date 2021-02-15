<?php

namespace Baconfy\Auth\Ui\Web\Controllers;

use Baconfy\Auth\AuthServiceProvider;
use Baconfy\Http\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ConfirmsPasswords;

class ConfirmPasswordController extends Controller
{
    use ConfirmsPasswords;

    /**
     * Where to redirect users when the intended url fails.
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
        $this->middleware('auth');
    }

    /**
     * Display the password confirmation view.
     *
     * @return Response
     */
    public function showConfirmForm()
    {
        return view('ui::auth.passwords.confirm');
    }
}
