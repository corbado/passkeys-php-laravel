<img width="1070" alt="GitHub Repo Cover" src="https://github.com/corbado/corbado-php/assets/18458907/aa4f9df6-980b-4b24-bb2f-d71c0f480971">

# PHP Laravel Passkeys Example Application

This is a sample implementation of the [Corbado passkeys-first authentication solution](https://www.corbado.com) using
PHP Laravel. The following packages are being used:

- [Corbado web-js](https://github.com/corbado/javascript/tree/develop/packages/web-js)
- [Corbado PHP SDK](https://github.com/corbado/corbado-php)

[![integration-guides](https://github.com/user-attachments/assets/7859201b-a345-4b68-b336-6e2edcc6577b)](https://app.corbado.com/integration-guides/php-laravel)

## File structure

- `app/Http/Controllers`: contains the controllers for handling HTTP requests
- `config`: contains the configuration files
- `database/migrations`: contains the database migration files, including our custom user table
- `public`: contains the publicly accessible files, such as assets
- `resources/views`: contains the Blade templates
- `routes/web.php`: contains the route definitions
- `.env`: environment variables configuration file

## Setup

### Prerequisites

Please follow the steps in [Getting started](https://docs.corbado.com/overview/getting-started) to create and configure
a project in the [Corbado developer panel](https://app.corbado.com/).

You need to have [PHP](https://www.php.net/downloads) and [Composer](https://getcomposer.org/download/) installed to run it.

### Configure environment variables

Use the values you obtained in [Prerequisites](#prerequisites) to configure the following variables inside a `.env`
file you create in the root folder of this project:

```sh
CORBADO_PROJECT_ID=pro-XXX
CORBADO_API_SECRET=corbado1_XXX
CORBADO_FRONTEND_API=https://${CORBADO_PROJECT_ID}.frontendapi.cloud.corbado.io
CORBADO_BACKEND_API=https://backendapi.cloud.corbado.io
```

## Usage

### Run the project locally

Run

```sh
composer install
```

to install all dependencies.

Then generate the Laravel application key and run the database migrations:

```sh
php artisan key:generate
php artisan migrate
```

Finally, you can run the project locally with

```sh
php artisan serve
```

### Why the Laravel application key is required

Laravel uses the `APP_KEY` (set by `php artisan key:generate`) to secure encrypted data. This key is critical for:

- Encrypting and decrypting cookies and session data
- Generating/validating signed URLs and CSRF tokens
- Protecting other framework-encrypted payloads

Without a valid `APP_KEY`, the framework cannot safely encrypt or validate data, which can cause authentication/session issues and security risks.

## Passkeys support

- Community for Developer Support: https://bit.ly/passkeys-community
- Passkeys Debugger: https://www.passkeys-debugger.io/
- Passkey Subreddit: https://www.reddit.com/r/passkey/

## Telemetry

This example application uses telemetry. By gathering telemetry data, we gain a more comprehensive understanding of how our SDKs, components, and example applications are utilized across various scenarios. This information is crucial in helping us prioritize features that are beneficial and impactful for the majority of our users. Read our [official documentation](https://docs.corbado.com/corbado-complete/other/telemetry) for more details.

To disable telemetry, add the following line to your `.env` file:

```sh
CORBADO_TELEMETRY_DISABLED=true
```
