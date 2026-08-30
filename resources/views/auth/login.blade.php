@extends('layouts.app')

@section('title', 'Login - BlogSite')

@section('content')

<div class="auth-container">

    <div class="form-card">

        <h1 class="auth-title">
            Login to BlogSite
        </h1>

        @if ($errors->any())

            <div class="errors">

                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach

            </div>

        @endif

        <form method="POST" action="/login">

            @csrf

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
                    autofocus
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

            <button type="submit" class="btn" style="width:100%;">
                Login
            </button>

        </form>

        <div class="auth-footer">

            Don't have an account?

            <a href="/register">
                Register
            </a>

        </div>

    </div>

</div>

@endsection