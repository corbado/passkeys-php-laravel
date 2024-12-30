@extends('layout')

@section('content')
    <div>
        <h1>User area!</h1>
        <p>This page is for logged-in users only. Please login:</p>
        <a class="button" href="/login">Login</a>
    </div>
@endsection