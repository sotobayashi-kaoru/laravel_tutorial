@extends('layouts.app')

@section('title','記事編集')

@section('content')
<h1>記事編集</h1>

{{ Form::open(['route'=>['posts.update',$post->id], 'method'=>'put']) }}
{{ csrf_field() }}
<p>
    タイトル：<br>
    {{ Form::text('title',$post->title) }}
</p>
<p>
    本文：<br>
    {{ Form::textarea('content',$post->content) }}
</p>
{{ Form::submit('更新',['class'=>'btn btn-primary btn-sm']) }}
{{ Form::close() }}
{{ link_to_route('posts.index','記事一覧へ戻る') }}

@endsection

@if($errors->has('title'))
<span class="text-danger">{{ $errors->first('title') }}</span>
@endif
@if($errors->has('content'))
<span class="text-danger">{{ $errors->first('content') }}</span>
@endif
