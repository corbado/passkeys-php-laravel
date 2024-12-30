@extends('layout')

@section('content')
    <h1>Login</h1>
    <div id="corbado-auth"></div>
    <script type="module">
        await window.corbadoLoadPromise;

        const authElement = document.getElementById("corbado-auth"); // Element where you want to render CorbadoAuth UI
        Corbado.mountAuthUI(authElement, {
            onLoggedIn: () => {
                window.location.href = "/signup/onboarding";
            },
            initialBlock: "login-init"
        });
    </script>
@endsection