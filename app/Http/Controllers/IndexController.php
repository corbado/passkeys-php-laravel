<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(Request $request): View
    {
        $corbadoUser = $this->getAuthenticatedUserFromCookie();
        if ($corbadoUser !== null) {
            $user = DB::table('user')->where('corbado_user_id', $corbadoUser->getID())->first();
            return view('index_authenticated', ['corbadoUser' => $corbadoUser, 'user' => $user]);
        }

        return view('index_guest', ['corbadoUser' => $corbadoUser]);
    }
}