<!DOCTYPE html>
<html>
<head>
    <title>Verify Email</title>
</head>
<body>

<h1>Verify Your Email</h1>

<p>
    Thanks for registering!
</p>

<p>
    Before continuing, please check your email and click the verification link.
</p>

@if (session('message'))
    <p>{{ session('message') }}</p>
@endif

<form method="POST" action="{{ route('verification.send') }}">
    @csrf

    <button type="submit">
        Resend Verification Email
    </button>
</form>

<form method="POST" action="/logout">
    @csrf

    <button type="submit">
        Logout
    </button>
</form>

</body>
</html>
