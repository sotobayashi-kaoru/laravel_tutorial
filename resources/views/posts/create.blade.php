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

<div style="margin-top: 20px;"></div>

{{ link_to_route('posts.index','記事一覧',[$post->id],['class'=>'btn btn-info btn-sm']) }}

@endsection
@if($errors->has('title'))
<span class="text-danger">{{ $errors->first('title') }}</span>
@endif
@if($errors->has('content'))
<span class="text-danger">{{ $errors->first('content') }}</span>
@endif
