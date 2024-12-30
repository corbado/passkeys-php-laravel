@extends('layout')

@section('content')
    <div>
        <h1>Welcome Guest!</h1>
        <p>This example demonstrates Corbado's passkey-first authentication solution.</p>
        <p>It covers all relevant aspects like -</p>
        <ul>
            <li>Sign-up</li>
            <li>Login</li>
            <li>Protecting Routes</li>
        </ul>
        <p>It can be used as a starting point for your own application or to learn.</p>
        <a class="button" href="{{ route('signup') }}">Sign up</a>
        <a class="button" href="{{ route('login') }}">Login</a>
    </div>
@endsection