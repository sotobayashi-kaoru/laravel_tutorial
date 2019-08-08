@extends('layouts.app')
@section('title','記事詳細')
@section('content')
<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>
{{ link_to_route('posts.index','記事一覧へ戻る') }}
@endsection

@if(Session::has('message'))
<div class="alert alert-success">
{{ session('message') }}
</div>
@endif
