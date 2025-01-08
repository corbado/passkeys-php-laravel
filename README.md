<img width="1070" alt="GitHub Repo Cover" src="https://github.com/corbado/corbado-php/assets/18458907/aa4f9df6-980b-4b24-bb2f-d71c0f480971">

# Fullstack PHP Laravel Passkey Example App

This is a sample implementation of
the [Corbado web-js](https://github.com/corbado/javascript/tree/develop/packages/web-js) package
and [Corbado PHP SDK](https://github.com/corbado/corbado-php)
being integrated into a web
application built with PHP Laravel.

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

Use the values you obtained in [Prerequisites](#prerequisites) to configure the following variables inside an `.env`
file you create in the root folder of this project:

```sh
CORBADO_PROJECT_ID=pro-XXX
CORBADO_API_SECRET=corbado1_XXX
CORBADO_FRONTEND_API=https://${CORBADO_PROJECT_ID}.frontendapi.cloud.corbado.io
CORBADO_BACKEND_API=https://backendapi.cloud.corbado.io
```

You can find an example in the `.env.example` file.

## Usage

### Run the project locally

Run

```sh
composer install
```

to install all dependencies.

Finally, you can run the project locally with

```sh
php artisan serve
```