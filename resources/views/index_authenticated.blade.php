@extends('layout')

@section('content')
<div>
    <h1>Welcome {{$corbadoUser->getName()}} from {{  !empty($user->city) ? $user->city : 'unknown'}}!</h1>
    <p>You now have access to everything and can visit the user area:</p>
    <a class="button" href="{{ route('userArea') }}">User area</a>
</div>
@endsection