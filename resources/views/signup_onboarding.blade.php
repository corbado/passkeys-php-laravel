@extends('layout')

@section('content')
    <h1>Onboarding</h1>
    <h2>Choose your city</h2>
    <form action="/signup/onboarding" method="POST" id="city-form">
        @csrf
        <input type="text" id="city" name="city" required value="{{ old('city') }}">
        <button type="submit">Finish onboarding</button>
    </form>
@endsection