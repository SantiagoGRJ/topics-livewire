<div>
    {{-- In work, do what you enjoy. --}}
    <a href="{{ route('posts.create') }}">Create Post</a>
    <table>
        <thead>
            <th>ID</th>
            <th>TITLE</th>
            <th>CONTENT</th>
        </thead>
        <tbody>
           @foreach ($posts as $post)
                <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
            </tr>
           @endforeach
        </tbody>
    </table>
</div>
