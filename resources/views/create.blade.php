@extends('layouts.app')

@section('title', 'Create Post - BlogSite')

@section('content')

<div class="container">

    <h1 class="page-title">Create Post</h1>

    <div class="form-card">

        @if ($errors->any())

            <div class="errors">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>

        @endif

        <form method="POST" action="/create">

            @csrf

            <div class="form-group">

                <label for="content">
                    What's on your mind?
                </label>

                <textarea
                    id="content"
                    name="content"
                    placeholder="Write your post here..."
                    required
                >{{ old('content') }}</textarea>

            </div>

            <button type="submit" class="btn">
                Publish Post
            </button>

            <a href="/" class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>

</div>

@endsection