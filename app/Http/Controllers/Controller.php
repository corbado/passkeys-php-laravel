<?php

namespace App\Http\Controllers;

use Corbado\Config;
use Corbado\Entities\UserEntity;
use Corbado\Exceptions\AssertException;
use Corbado\Exceptions\ConfigException;
use Corbado\Generated\Model\IdentifierList;
use Corbado\SDK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

abstract class Controller
{
    protected SDK $sdk;

    /**
     * @throws ConfigException
     * @throws AssertException
     */
    public function __construct()
    {
        $this->sdk = getSdk();
    }

    protected function getAuthenticatedUserFromCookie(): ?UserEntity
    {
        // Must use $_COOKIE here because cookie has not been created by Laravel
        // itself (Laravel encrypts cookies by default).
        $sessionToken = $_COOKIE['cbo_session_token'] ?? null;
        if (empty($sessionToken)) {
            return null;
        }

        try {
            return $this->sdk->sessions()->validateToken($sessionToken);
        } catch (\Corbado\Exceptions\ValidationException $e) {
            Log::info($e->getMessage());
        }

        return null;
    }

    /**
     * @throws ConfigException
     * @throws AssertException
     */
    protected function getUserIdentifiers(string $userId): IdentifierList
    {
        return $this->sdk->identifiers()->listByUserID($userId);
    }

    protected function getAuthenticatedUserFromAuthorizationHeader(Request $request): ?UserEntity
    {
        $sessionToken = $request->bearerToken();
        if (empty($sessionToken)) {
            return null;
        }

        try {
            return $this->sdk->sessions()->validateToken($sessionToken);
        } catch (\Corbado\Exceptions\ValidationException $e) {
            Log::info($e->getMessage());
        }

        return null;
    }
}