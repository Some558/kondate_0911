<!-- resources/views/auth/user_login.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>User Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</div>
@endsection
