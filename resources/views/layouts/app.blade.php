<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">

```
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>
    @yield('title', 'BlogSite')
</title>

<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        background: #f4f6f8;
        color: #222;
    }

    /* =========================
       NAVIGATION
    ========================== */

    nav {
        background: #1f2937;
        color: white;
        padding: 0 30px;
        min-height: 64px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .logo {
        color: white;
        text-decoration: none;
        font-size: 24px;
        font-weight: bold;
    }

    .logo:hover {
        color: #93c5fd;
    }

    .nav-links {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .nav-links a {
        color: white;
        text-decoration: none;
    }

    .nav-links a:hover {
        color: #93c5fd;
    }

    .nav-links span {
        color: #d1d5db;
        font-size: 14px;
    }

    .logout-button {
        border: none;
        background: transparent;
        color: white;
        cursor: pointer;
        font-size: 15px;
        padding: 0;
    }

    .logout-button:hover {
        color: #fca5a5;
    }

    /* =========================
       MAIN CONTAINER
    ========================== */

    .container {
        width: 90%;
        max-width: 1000px;
        margin: 40px auto;
    }

    /* =========================
       PAGE HEADER
    ========================== */

    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 35px;
    }

    .page-title {
        font-size: 36px;
        margin: 0 0 8px;
        color: #111827;
    }

    .page-subtitle {
        margin: 0;
        color: #6b7280;
        font-size: 16px;
        line-height: 1.5;
    }

    /* =========================
       POSTS
    ========================== */

    .posts-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 25px;
    }

    .post-card {
        background: white;
        border-radius: 14px;
        padding: 25px;
        margin-bottom: 0;

        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.07);

        transition:
            transform 0.2s ease,
            box-shadow 0.2s ease;
    }

    .post-card:hover {
        transform: translateY(-3px);

        box-shadow:
            0 8px 25px rgba(0, 0, 0, 0.11);
    }

    .post-card-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;

        margin-bottom: 15px;
    }

    .post-badge {
        background: #dbeafe;
        color: #1d4ed8;

        padding: 5px 10px;

        border-radius: 20px;

        font-size: 12px;
        font-weight: bold;
    }

    .post-date {
        color: #9ca3af;
        font-size: 13px;
    }

    .post-title {
        margin: 0 0 10px;
        font-size: 24px;
        line-height: 1.3;
    }

    .post-title a {
        color: #111827;
        text-decoration: none;
    }

    .post-title a:hover {
        color: #2563eb;
    }

    .post-meta {
        color: #6b7280;
        font-size: 14px;
        margin-bottom: 18px;
    }

    .post-meta strong {
        color: #374151;
    }

    .post-content {
        color: #4b5563;
        font-size: 16px;
        line-height: 1.7;

        margin-bottom: 10px;

        white-space: pre-wrap;
        word-wrap: break-word;
    }

    .post-footer {
        border-top: 1px solid #e5e7eb;

        margin-top: 20px;
        padding-top: 18px;
    }

    .read-more {
        color: #2563eb;
        font-weight: bold;
        text-decoration: none;
    }

    .read-more:hover {
        text-decoration: underline;
    }

    /* =========================
       BUTTONS
    ========================== */

    .btn {
        display: inline-block;

        padding: 11px 18px;

        border: none;
        border-radius: 7px;

        background: #2563eb;
        color: white;

        text-decoration: none;

        cursor: pointer;

        font-size: 15px;
        font-weight: 500;

        transition: background 0.2s ease;
    }

    .btn:hover {
        background: #1d4ed8;
    }

    .btn-danger {
        background: #dc2626;
    }

    .btn-danger:hover {
        background: #b91c1c;
    }

    .btn-secondary {
        background: #6b7280;
    }

    .btn-secondary:hover {
        background: #4b5563;
    }

    /* =========================
       FORMS
    ========================== */

    .form-card {
        background: white;

        padding: 35px;

        border-radius: 12px;

        box-shadow:
            0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;

        margin-bottom: 8px;

        font-weight: bold;
        color: #374151;
    }

    input,
    textarea {
        width: 100%;

        padding: 12px;

        border: 1px solid #d1d5db;
        border-radius: 7px;

        font-size: 16px;

        font-family: inherit;
    }

    input:focus,
    textarea:focus {
        outline: none;

        border-color: #2563eb;

        box-shadow:
            0 0 0 2px rgba(37, 99, 235, 0.15);
    }

    textarea {
        min-height: 200px;
        resize: vertical;
    }

    /* =========================
       ALERTS
    ========================== */

    .errors {
        background: #fee2e2;
        color: #991b1b;

        border-radius: 7px;

        padding: 15px;

        margin-bottom: 20px;
    }

    .success {
        background: #dcfce7;
        color: #166534;

        padding: 15px;

        border-radius: 7px;

        margin-bottom: 20px;
    }

    /* =========================
       AUTHENTICATION
    ========================== */

    .auth-container {
        max-width: 500px;

        margin: 60px auto;
    }

    .auth-title {
        text-align: center;

        margin-bottom: 30px;
    }

    .auth-footer {
        text-align: center;

        margin-top: 20px;
    }

    .auth-footer a {
        color: #2563eb;

        text-decoration: none;
    }

    .auth-footer a:hover {
        text-decoration: underline;
    }

    /* =========================
       ACTIONS
    ========================== */

    .actions {
        display: flex;

        gap: 10px;

        margin-top: 25px;
    }

    /* =========================
       EMPTY STATE
    ========================== */

    .empty-state {
        background: white;

        border-radius: 14px;

        padding: 60px 30px;

        text-align: center;

        box-shadow:
            0 4px 15px rgba(0, 0, 0, 0.07);
    }

    .empty-icon {
        font-size: 50px;

        margin-bottom: 15px;
    }

    .empty-state h2 {
        margin-bottom: 10px;
    }

    .empty-state p {
        color: #6b7280;

        max-width: 500px;

        margin: 0 auto 25px;

        line-height: 1.6;
    }

    /* =========================
       FOOTER
    ========================== */

    footer {
        text-align: center;

        padding: 30px;

        color: #6b7280;

        font-size: 14px;
    }

    /* =========================
       MOBILE
    ========================== */

    @media (max-width: 700px) {

        nav {
            padding: 15px;

            flex-direction: column;

            align-items: flex-start;

            gap: 12px;
        }

        .nav-links {
            width: 100%;

            flex-wrap: wrap;

            gap: 12px;
        }

        .container {
            width: 94%;

            margin-top: 25px;
        }

        .page-header {
            align-items: flex-start;

            flex-direction: column;
        }

        .page-title {
            font-size: 30px;
        }

        .posts-grid {
            grid-template-columns: 1fr;
        }

        .post-card {
            padding: 20px;
        }

        .post-card-top {
            align-items: flex-start;

            flex-direction: column;
        }

        .form-card {
            padding: 25px 20px;
        }

        .actions {
            flex-direction: column;
        }

    }
</style>
```

</head>

<body>

<nav>

```
<a href="/" class="logo">
    BlogSite
</a>

<div class="nav-links">

    @auth

        <span>
            Welcome, {{ auth()->user()->name }}
        </span>

        <a href="/create">
            Create Post
        </a>

        <form
            method="POST"
            action="/logout"
            style="display:inline;"
        >
            @csrf

            <button
                type="submit"
                class="logout-button"
            >
                Logout
            </button>
        </form>

    @else

        <a href="/login">
            Login
        </a>

        <a href="/register">
            Register
        </a>

    @endauth

</div>
```

</nav>

<main>

```
@yield('content')
```

</main>

<footer>

```
&copy; {{ date('Y') }} BlogSite.
All rights reserved.
```

</footer>

</body>
</html>
