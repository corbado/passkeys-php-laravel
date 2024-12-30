<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request): View|RedirectResponse
    {
        $corbadoUser = $this->getAuthenticatedUserFromCookie();
        if ($corbadoUser !== null) {
            return redirect()->route('profile')->withErrors('You are already logged in!');
        }

        return view('login', ['corbadoUser' => $corbadoUser]);
    }
}