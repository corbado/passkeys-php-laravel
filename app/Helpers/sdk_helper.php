<?php

use Corbado\SDK;
use Corbado\Config;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

if (!function_exists('getSdk')) {
    function getSdk(): SDK
    {
        static $sdk = null;

        if ($sdk === null) {
            $config = new Config(
                env('CORBADO_PROJECT_ID'),
                env('CORBADO_API_SECRET'),
                env('CORBADO_FRONTEND_API'),
                env('CORBADO_BACKEND_API')
            );
            $config->setJwksCachePool(new FilesystemAdapter());
            $sdk = new SDK($config);
        }

        return $sdk;
    }
}