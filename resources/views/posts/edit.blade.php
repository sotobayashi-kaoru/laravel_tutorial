<div class="container">

@extends('layouts.app')
@section('title','Edit')
@section('content')

<h1>Edit</h1>

{{ Form::open(['route'=>['posts.update',$post->id],'method'=>'put']) }}
{{ csrf_field() }}
<p>
    Title：<br>
    {{ Form::text('title',$post->title) }}
</p>
<p>
    Text：<br>
    {{ Form::textarea('content',$post->content) }}
</p>
{{ Form::submit('Update',['class'=>'btn btn-primary btn-sm']) }}
{{ Form::close() }}

<div style="margin-top: 10px;"></div>

{{ link_to_route('posts.index','Home',[$post->id],['class'=>'btn btn-info btn-sm']) }}
</div>

@endsection

@if($errors->has('title'))
<span class="text-danger">{{ $errors->first('title') }}</span>
@endif
@if($errors->has('content'))
<span class="text-danger">{{ $errors->first('content') }}</span>
@endif
