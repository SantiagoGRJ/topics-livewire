<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <table>
        <thead>
            <thead>Id</thead>
            <thead>Title</thead>
            <thead>Content</thead>
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