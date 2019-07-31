@extends('layouts.app')
{{-- @yield('title')にテンプレートごとにtitleタグの値を代入 --}}
@section('title','記事一覧')
{{-- app.blade.phpの@yield('content')に以下のレイアウトを代入 --}}
@section('content')
<table border=3>
<tr>
<th>タイトル</th>
<th>本文</th>
<th>投稿時間</th>
<th><th>
</tr>
@foreach($posts as $post)
<tr>
  <td><li>{{ link_to_route('posts.show',$post->title,[$post->id]) }}</li></td>
  <td>{{ $post->content }}</td>
  <td>{{ $post->created_at }}</td>
  <td>{{ link_to_route('posts.edit','編集',[$post->id],['class'=>'btn btn-primary btn-sm']) }}</td>
</tr>
@endforeach
</table>
@section('footer')
{{ link_to_route('posts.create','[記事作成]') }}
@endsection
