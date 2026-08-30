@extends('layouts.app')

@section('title', 'Post #' . $post->id . ' - BlogSite')

@section('content')

<div class="container">

    <article class="post-card">

        <h1 class="page-title">
            Post #{{ $post->id }}
        </h1>

        <div class="post-meta">
            Posted by
            <strong>{{ $post->user->name ?? 'Unknown User' }}</strong>
            on
            {{ $post->created_at->format('M d, Y H:i') }}
        </div>

        <div class="post-content">
            {{ $post->content }}
        </div>

        @auth

            @if (auth()->id() === $post->user_id)

                <div class="actions">

                    <a
                        href="/posts/{{ $post->id }}/edit"
                        class="btn"
                    >
                        Edit
                    </a>

                    <form
                        method="POST"
                        action="/posts/{{ $post->id }}"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-danger"
                            onclick="return confirm('Delete this post?')"
                        >
                            Delete
                        </button>
                    </form>

                </div>

            @endif

        @endauth

    </article>

    <a href="/" class="btn btn-secondary">
        ← Back to Posts
    </a>

</div>

@endsection