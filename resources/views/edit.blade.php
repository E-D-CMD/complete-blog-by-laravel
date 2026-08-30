@extends('layouts.app')

@section('title', 'Edit Post - BlogSite')

@section('content')

<div class="container">

    <h1 class="page-title">Edit Post</h1>

    <div class="form-card">

        @if ($errors->any())

            <div class="errors">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>

        @endif

        <form
            method="POST"
            action="/posts/{{ $post->id }}"
        >

            @csrf
            @method('PUT')

            <div class="form-group">

                <label for="content">
                    Post Content
                </label>

                <textarea
                    id="content"
                    name="content"
                    required
                >{{ old('content', $post->content) }}</textarea>

            </div>

            <button type="submit" class="btn">
                Update Post
            </button>

            <a href="/posts/{{ $post->id }}" class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>

</div>

@endsection