
Hello
<table>
    @foreach (json_decode($posts) as $post)
        <tr>
            <td>{{ $post->status }}</td>
            <td>{{ $post->title }}</td>
        </tr>
    @endforeach
</table>

{{--{{ $posts->appends(request()->input())->links() }}--}}
