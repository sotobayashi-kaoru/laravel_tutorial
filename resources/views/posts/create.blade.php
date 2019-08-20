<div class="container">

@extends('layouts.app')
@section('title','New Posts')
@section('content')
<h1>New Posts</h1>
{{ Form::open(['route'=>'posts.store']) }}
{{ csrf_field() }}
<p>
    Title：<br>
    {{ Form::text('title',$post->title) }}
</p>
<p>
    Text：<br>
    {{ Form::textarea('content',$post->content) }}
</p>

{{ Form::submit('New Post',['class'=>'btn btn-info btn-sm']) }}
{{ Form::close() }}

<div style="margin-top: 20px;"></div>

{{ link_to_route('posts.index','Home',[$post->id],['class'=>'btn btn-default btn-sm']) }}

</div>

@endsection
@if($errors->has('title'))
<span class="text-danger">{{ $errors->first('title') }}</span>
@endif
@if($errors->has('content'))
<span class="text-danger">{{ $errors->first('content') }}</span>
@endif
