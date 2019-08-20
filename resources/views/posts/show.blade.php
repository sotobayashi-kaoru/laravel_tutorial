<div class="container">

@extends('layouts.app')
@section('title','記事詳細')
@section('content')
@if(Session::has('message'))
<div class="alert alert-success">
{{ session('message') }}
</div>
@endif

<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>

@foreach ($comments as $comment )
            <div class="row">
                <p>{{$loop->iteration}}</p>
                <p>comment:{{ $comment->comment }}</p>
                <p>name:{{ $comment->name }}</p>
                <p>date:{{ $comment->created_at->format('Y/m/d H:i') }}</p>
            </div>
@endforeach

{{ Form::open( ['url' => 'comment'] ) }}
            <div class="form-group">
                {{Form::label('name')}}
                {{ Form::text('name', '' ,['class' => 'form-control', 'required']) }}
            </div>
            <div class="form-group">
                {{Form::label('comment')}}
                {{ Form::textarea('comment', '', ['class' => 'form-control', 'required']) }}
            </div>
            <div class="form-group">
                {{ Form::submit('Send',['class'=>'btn btn-info btn-sm']) }}
            </div>
            <input type="hidden" name="post_id" value="{{$post->id}}">
{{ Form::close() }}

</div>
{{ link_to_route('posts.index','Home',[$post->id],['class'=>'btn btn-default btn-sm']) }}

@endsection
