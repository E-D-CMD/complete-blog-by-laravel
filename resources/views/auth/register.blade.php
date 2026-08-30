@extends('layouts.app')

@section('title', 'Register - BlogSite')

@section('content')

<div class="auth-container">

    <div class="form-card">

        <h1 class="auth-title">
            Create an Account
        </h1>

        @if ($errors->any())

            <div class="errors">

                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach

            </div>

        @endif

        <form method="POST" action="/register">

            @csrf

            <div class="form-group">

                <label for="name">
                    Name
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    required
                >

            </div>

            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                >

            </div>

            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                >

            </div>

            <div class="form-group">

                <label for="password_confirmation">
                    Confirm Password
                </label>

                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    required
                >

            </div>

            <button type="submit" class="btn" style="width:100%;">
                Create Account
            </button>

        </form>

        <div class="auth-footer">

            Already have an account?

            <a href="/login">
                Login
            </a>

        </div>

    </div>

</div>

@endsection