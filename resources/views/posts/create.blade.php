@extends('layouts.app')
@section('title','記事作成')
@section('content')
<h1>記事作成</h1>
{{ Form::open(['route'=>'posts.store']) }}
{{ csrf_field() }}
<p>
　　　タイトル：<br>
{{ Form::text('title',$post->title) }}
</p>
<p>
　　　本文：<br>
{{ Form::textarea('content',$post->content) }}
</p>
{{ Form::submit('作成',['class'=>'btn btn-primary btn-sm']) }}
{{ Form::close() }}
{{ link_to_route('posts.index','記事一覧へ戻る') }}
@endsection
