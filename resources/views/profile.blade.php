@extends('layout')

@section('content')
    <h1>Profile</h1>
    <p><strong>Example userID: </strong>{{$user->id}}</p>
    <p><strong>Corbado userID: </strong>{{$user->corbado_user_id}}</p>
    <h2>Your Identifiers</h2>
    <
    <div id="identifier-list">
        @foreach ($userIdentifiers as $identifier)
            <div>
                <p>
                    <strong>Type</strong>: {{ $identifier->getType() }}
                </p>
                <p>
                    <strong>Value</strong>: {{ $identifier->getValue() }}
                </p>
            </div>
        @endforeach
    </div>
    <h2>Manage your Passkeys</h2>
    <div id="passkeylist-container"></div>
    <script type="module">
        await window.corbadoLoadPromise;
        Corbado.mountPasskeyListUI(document.getElementById("passkeylist-container"));
    </script>
@endsection