# Setup instructions (later needed for the integration guide)

- Install PHP and composer
- Run composer create-project laravel/laravel example-app
- Run Corbado Getting Started to create new Corbado project
- Set Corbado config in .env
- Add SERVER_HOST=localhost SERVER_PORT=3000 to top of .env
- composer require corbado/php-sdk
- composer require symfony/cache
- Explain storage/logs/laravel.log (session-token validation errors are logged there with info level)
- Run php artisan migrate
- Run php artisan serve
