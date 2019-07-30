@extends('layouts.app')
{{-- @yield('title')にテンプレートごとにtitleタグの値を代入 --}}
@section('title','記事一覧')
{{-- app.blade.phpの@yield('content')に以下のレイアウトを代入 --}}
@section('content')
<table border=1>
<tr>
<th>名前</th>
<th>email</th>
</tr>
@foreach($users as $user)
<tr>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
</tr>
@endforeach
</table>
@section('footer')
{{ link_to_route('posts.create','[記事作成]') }}
@endsection
