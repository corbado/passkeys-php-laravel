@extends('layout')

@section('content')
    <div>
        <h1>
            Welcome <span id="name-placeholder"></span>
            from {{  !empty($user->city) ? $user->city : 'unknown'}}!
        </h1>
        <p>You now have access to everything and can visit the user area:</p>
        <a class="button" href="{{ route('userArea') }}">User area</a>
    </div>
    <script>
        window.corbadoLoadPromise.then(() => {
            document.getElementById("name-placeholder").innerText =
                Corbado.user.name;
        });
    </script>
@endsection