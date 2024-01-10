@foreach ($comments as $comment)
    <div>
        <p>Name: {{ $comment->name }}</p>
        <p>Email: {{ $comment->email }}</p>
        <a href="{{ route('adminCommentRemove', ['id' => $comment->id]) }}">Delete</a>
    </div>
@endforeach
