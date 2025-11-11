<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function secret(Request $request): JsonResponse
    {
        $corbadoUser = $this->getAuthenticatedUserFromCookie();
        $corbadoUser ??= $this->getAuthenticatedUserFromAuthorizationHeader($request);
        
        if ($corbadoUser !== null) {
            return response()->json([
                'secret' => 'Passkeys are cool!',
            ]);
        }

        return response()->json([
            'error' => 'Not authenticated'
        ], status: 401);
    }
}