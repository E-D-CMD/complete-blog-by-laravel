@extends('layouts.app')

@section('title', 'Latest Posts - BlogSite')

@section('content')

<div class="container">

    <div class="page-header">
        <div>
            <h1 class="page-title">Latest Posts</h1>

            <p class="page-subtitle">
                Discover the latest thoughts and stories from our community.
            </p>
        </div>

        @auth
            <a href="/create" class="btn">
                + Create Post
            </a>
        @endauth
    </div>

    @if ($posts->count())

        <div class="posts-grid">

            @foreach ($posts as $post)

                <article class="post-card">

                    <div class="post-card-top">

                        <span class="post-badge">
                            Blog Post
                        </span>

                        <span class="post-date">
                            {{ $post->created_at->format('M d, Y') }}
                        </span>

                    </div>

                    <h2 class="post-title">
                        <a href="/posts/{{ $post->id }}">
                            Post #{{ $post->id }}
                        </a>
                    </h2>

                    <div class="post-meta">
                        By
                        <strong>
                            {{ $post->user->name ?? 'Unknown User' }}
                        </strong>
                    </div>

                    <div class="post-content">
                        {{ $post->content }}
                    </div>

                    <div class="post-footer">
                        <a
                            href="/posts/{{ $post->id }}"
                            class="read-more"
                        >
                            Read full post →
                        </a>
                    </div>

                </article>

            @endforeach

        </div>

    @else

        <div class="empty-state">

            <div class="empty-icon">📝</div>

            <h2>No posts yet</h2>

            <p>
                There are no posts available yet.
            </p>

            @auth
                <a href="/create" class="btn">
                    Create Post
                </a>
            @else
                <a href="/login" class="btn">
                    Login
                </a>
            @endauth

        </div>

    @endif

</div>

@endsection