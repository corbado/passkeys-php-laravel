<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class UserAreaController extends Controller
{
    public function userArea(Request $request): View
    {
        $corbadoUser = $this->getAuthenticatedUserFromCookie();
        if ($corbadoUser !== null) {
            return view('userarea_authenticated', ['corbadoUser' => $corbadoUser]);
        }

        return view('userarea_guest', ['corbadoUser' => $corbadoUser]);
    }
}