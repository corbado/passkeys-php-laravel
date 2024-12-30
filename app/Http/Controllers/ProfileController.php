<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function profile(Request $request): View|RedirectResponse
    {
        $corbadoUser = $this->getAuthenticatedUserFromCookie();
        if ($corbadoUser === null) {
            return redirect()->route('login')->withErrors('You must be logged in to view your profile!');
        }
        $user = DB::table('user')->where('corbado_user_id', $corbadoUser->getID())->first();
        $userIdentifiers = $this->getUserIdentifiers($corbadoUser->getID());
        return view('profile', ['corbadoUser' => $corbadoUser, 'userIdentifiers' => $userIdentifiers->getIdentifiers(), 'user' => $user]);
    }
}