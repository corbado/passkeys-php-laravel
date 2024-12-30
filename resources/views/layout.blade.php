<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Corbado Example</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/main.css">
    <link rel="stylesheet" href="https://unpkg.com/@corbado/web-js@2/dist/bundle/index.css" />
    <script src="https://unpkg.com/@corbado/web-js@2/dist/bundle/index.js"></script>
    <script>
        window.corbadoLoadPromise = Corbado.load({
            projectId: '{{ env('CORBADO_PROJECT_ID') }}',
            darkMode: "on",
            setShortSessionCookie: true,
            theme: "cbo-custom-styles",
            customTranslations: {
                en: {
                    signup: {
                        "signup-init": {
                            "signup-init": {
                                header: "Let's create an account",
                                subheader: "to check ",
                                text_login: "Would you like to login? ",
                                button_submit: "Sign up",
                                textField_fullName: "Full Name",
                                text_divider: "or use social logins"
                            }
                        }
                    },
                    login: {
                        "login-init": {
                            "login-init": {
                                header: "Please login",
                                subheader: "to check ",
                                text_signup: "Would you like to create an account? ",
                                button_signup: "Sign up",
                                button_submit: "Login"
                            }
                        }
                    },
                    passkeysList: {
                        button_createPasskey: "You can create passkeys here.",
                        field_credentialId: "ID: ",
                        field_status: "Status of Passkey: "
                    }
                }
            }
        });
    </script>
</head>
<body>
<div>
    <nav>
        <a href="/">
            <img src="/logo.svg" alt="Corbado Logo" height="40" width="40" />
            <p>Corbado Example</p>
        </a>
        <ul>
            <li>
                <a href="{{ route('index') }}"
                   data-selected="{{ url()->current() == route('index') ? 'true' : 'false' }}">
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('userArea') }}"
                   data-selected="{{ url()->current() == route('userArea') ? 'true' : 'false' }}">
                    User area
                </a>
            </li>
            @if ($corbadoUser === null)
                <li>
                    <a href="{{ route('signup') }}"
                       data-selected="{{ url()->current() == route('signup') ? 'true' : 'false' }}">
                        Sign up
                    </a>
                </li>
                <li>
                    <a href="{{ route('login') }}"
                       data-selected="{{ url()->current() == route('login') ? 'true' : 'false' }}">
                        Login
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ route('profile')  }}"
                       data-selected="{{ url()->current() == route('profile') ? 'true' : 'false' }}">
                        Profile
                    </a>
                </li>
            @endif
        </ul>
        @if ($corbadoUser !== null)
            <button id="logout">Logout</button>
        @endif
    </nav>
</div>

@if ($errors->any())
    <div style="color: red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<main>
    <section>
        @yield('content')
    </section>
    <footer>
        <a href="https://github.com/corbado/js-vanillajs-php-laravel.git" target="_blank">
            <img
                    src="/github-icon.svg"
                    alt="GitHub icon"
                    width="24"
                    height="24"
            />
            Github
        </a>
        <a href="https://docs.corbado.com/corbado-complete/fullstack-integration/next-js" target="_blank">
            <img
                    src="/documents-icon.svg"
                    alt="Documentation icon"
                    width="24"
                    height="24"
            />
            Documentation
        </a>
    </footer>
</main>
<script>
    const logout = document.getElementById("logout")?.addEventListener("click", async function() {
        await window.corbadoLoadPromise;
        await Corbado.logout();
        window.location.href = "/";
    });
</script>
</body>
</html>