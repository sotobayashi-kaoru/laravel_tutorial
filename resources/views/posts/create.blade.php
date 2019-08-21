
@extends('layouts.app')

@section('title','New Posts')

@section('content')
<div class="container">
<h1>New Posts</h1>
{{ Form::open(['route'=>'posts.store']) }}
{{ csrf_field() }}
<p><u>
    Title<br>
    {{ Form::text('title',$post->title) }}
</u></p>
<p><u>
    Text<br>
    {{ Form::textarea('content',$post->content) }}
</u></p>

{{ Form::submit('New Post',['class'=>'btn btn-info btn-sm']) }}
{{ link_to_route('posts.index','Home',[$post->id],['class'=>'btn btn-default btn-sm']) }}
{{ Form::close() }}
</div>
<div style="margin-bottom: 20px;"></div>

@endsection
@if($errors->has('title'))
<span class="text-danger">{{ $errors->first('title') }}</span>
@endif
@if($errors->has('content'))
<span class="text-danger">{{ $errors->first('content') }}</span>
@endif
