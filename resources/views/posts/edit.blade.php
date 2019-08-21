@extends('layouts.app')

@section('title','Edit')

@section('content')
<div class="container">
<h1>Edit</h1>

{{ Form::open(['route'=>['posts.update',$post->id],'method'=>'put']) }}
{{ csrf_field() }}
<p><u>
    Title<br>
    {{ Form::text('title',$post->title) }}
</u></p>
<p><u>
    Text<br>
    {{ Form::textarea('content',$post->content) }}
</u></p>
{{ Form::submit('Update',['class'=>'btn btn-info btn-sm']) }}
{{ link_to_route('posts.index','Home',[$post->id],['class'=>'btn btn-default btn-sm']) }}
{{ Form::close() }}
</div>

@endsection

@if($errors->has('title'))
<span class="text-danger">{{ $errors->first('title') }}</span>
@endif
@if($errors->has('content'))
<span class="text-danger">{{ $errors->first('content') }}</span>
@endif
<div style="margin-bottom: 20px;"></div>
