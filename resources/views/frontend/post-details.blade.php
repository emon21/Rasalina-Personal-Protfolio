@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->description }}</p>

    <hr>
    <h4>Comments ({{ $post->comments->count() }})</h4>

    {{-- Comment form --}}
    @auth
        <form action="{{ route('comment.store') }}" method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <textarea name="comment" class="mb-2 form-control" placeholder="Write a comment..." required></textarea>
            <button class="btn btn-primary btn-sm">Post Comment</button>
        </form>
    @else
        <p><a href="{{ route('login') }}">Login</a> to comment.</p>
    @endauth

    <div class="mt-4">
        @foreach ($post->comments as $comment)
            <div class="mb-3 card">
                <div class="card-body">
                    <strong>{{ $comment->user->name ?? 'Guest' }}</strong>
                    <p>{{ $comment->comment }}</p>

                    {{-- Reply button --}}
                    @auth
                        <button class="btn btn-link btn-sm text-primary" onclick="toggleReplyForm({{ $comment->id }})">
                            Reply
                        </button>

                        {{-- Reply form (hidden by default) --}}
                        <form id="reply-form-{{ $comment->id }}" 
                              action="{{ route('comment.store') }}" 
                              method="POST" 
                              class="mt-2" 
                              style="display:none;">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                            <textarea name="comment" class="mb-2 form-control" placeholder="Write a reply..." required></textarea>
                            <button class="btn btn-sm btn-success">Reply</button>
                        </form>
                    @endauth

                    {{-- Show replies --}}
                    @if($comment->replies->count() > 0)
                        <div class="mt-3 ms-4 border-start ps-3">
                            @foreach($comment->replies as $reply)
                                <div class="mb-2">
                                    <strong>{{ $reply->user->name ?? 'Guest' }}</strong>
                                    <p>{{ $reply->comment }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
function toggleReplyForm(id) {
    const form = document.getElementById('reply-form-' + id);
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
}
</script>
@endsection
