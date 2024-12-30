<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SignupController extends Controller
{
    public function signup(Request $request): View|RedirectResponse
    {
        $corbadoUser = $this->getAuthenticatedUserFromCookie();
        if ($corbadoUser !== null) {
            return redirect()->route('profile')->withErrors('You are already logged in!');
        }

        return view('signup', ['corbadoUser' => $corbadoUser]);
    }

    public function onboarding(Request $request): View|RedirectResponse
    {
        $corbadoUser = $this->getAuthenticatedUserFromCookie();
        if ($corbadoUser === null) {
            return redirect()->route('index');
        }

        $user = DB::selectOne('SELECT * FROM user WHERE corbado_user_id = ?', [$corbadoUser->getID()]);
        if ($user === null) {
            DB::insert('INSERT INTO user (corbado_user_id, created_at, updated_at) VALUES (?, current_timestamp, current_timestamp)', [$corbadoUser->getID()]);
        } else {
            return redirect()->route('profile');
        }

        return view('signup_onboarding', ['corbadoUser' => $corbadoUser]);
    }

    public function handleOnboarding(Request $request): View|RedirectResponse
    {
        $data = $request->validate([
            'city' => 'required|string|min:3|max:100',
        ]);

        DB::update('UPDATE user SET city = ?, updated_at = current_timestamp WHERE corbado_user_id = ?', [$data['city'], $this->getAuthenticatedUserFromCookie()->getID()]);

        return redirect()->route('index');
    }
}