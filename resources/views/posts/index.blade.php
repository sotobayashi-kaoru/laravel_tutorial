@extends('layouts.app')
{{-- @yield('title')にテンプレートごとにtitleタグの値を代入 --}}
@section('title','記事一覧')
{{-- app.blade.phpの@yield('content')に以下のレイアウトを代入 --}}
@section('content')
<table border=3>
<tr>
<th>title</th>
<th>content</th>
<th>created_at</th>
</tr>
@foreach($posts as $post)
<tr>

  <td><li>{{ $post->title }}</li></td>
  <td>{{ $post->content }}</td>
  <td>{{ $post->created_at }}</td>

</tr>
@endforeach
</table>
@section('footer')
{{ link_to_route('posts.create','[記事作成]') }}
@endsection
