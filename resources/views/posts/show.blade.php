@extends('layouts.app')
@section('title','記事詳細')
@section('content')
<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>
{{ link_to_route('posts.index','記事一覧へ戻る') }}
@endsection

<!-- @foreach ($comments as $comment )
            <div class="row">
                <p>{{$loop->iteration}}</p>
                <p>comment:{{ $comment->comment }}</p>
                <p>name:{{ $comment->name }}</p>
                <p>date:{{ $comment->created_at->format('Y/m/d H:i') }}</p>
            </div>
@endforeach -->

<!-- {{ Form::open( ['url' => 'comment'] ) }}
            <div class="form-group">
                {{Form::label('name')}}
                {{ Form::text('name', '' ,['class' => 'form-control', 'required']) }}
            </div>
            <div class="form-group">
                {{Form::label('comment')}}
                {{ Form::textarea('comment', '', ['class' => 'form-control', 'required']) }}
            </div>
            <div class="form-group">
                {{ Form::submit('送信' ,['class' => 'btn btn-primary'])}}
            </div>
            <input type="hidden" name="post_id" value="{{$post->id}}">
{{ Form::close() }} -->

@if(Session::has('message'))
<div class="alert alert-success">
{{ session('message') }}
</div>
@endif
