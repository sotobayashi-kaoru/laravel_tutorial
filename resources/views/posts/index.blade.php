@extends('layouts.app')
@section('title','記事一覧')

@section('content')
<div class="container">
<table border=2>
<tr>
    <th class="text-center titleTxt">タイトル</th>
    <th class="text-center titleTxt">本文</th>
    <th class="text-center titleTxt">投稿時間</th>
    <th></th>
    <th></th>
</tr>
@foreach($posts as $post)
<tr>
    <td><li>{{ link_to_route('posts.show',$post->title,[$post->id]) }}</li></td>
    <td>{{ $post->content }}</td>
    <td>{{ $post->created_at }}</td>
    <td>{{ link_to_route('posts.edit','編集',[$post->id],['class'=>'btn btn-info btn-sm']) }}</td>
    <td>
      {{ Form::open(['route'=>['posts.destroy',$post->id],'onSubmit'=>'return delPostConfirm();','method'=>'delete']) }}
      {{ Form::submit('削除',['class'=>'btn btn-danger btn-sm']) }}
      {{ Form::close() }}
    </td>
</tr>
@endforeach
</table>
</div>
</div>


<div class="container">
<div style="margin-top: 20px;"></div>
{{ Form::open(['route'=>'posts.index','method'=>'get']) }}
{{ csrf_field() }}
{{ Form::text('keywords','',['type'=>'search','placeholder'=>'タイトル・本文から検索','style'=>'width: 450px']) }}

<div style="margin-top: 20px;"></div>

<div class="form-inline">
  <span>日付絞り込み</span>
  {{ Form::checkbox('dateCheck', 'true', false, ['id'=> 'date_check']) }}
  {{ Form::date('fromDate', $fromDate, ['class' => 'form-control']) }}
  {{ Form::date('toDate', $toDate, ['class' => 'form-control']) }}
  </div>
  {{ Form::submit('Search',['class'=>'btn btn-primary btn-sm pull-right']) }}
  {{ Form::close() }}
</div>

@if(Session::has('message'))
<div class="alert alert-success">
{{ session('message') }}
</div>
@endif

<div class="container">
  <div class="text-center">
    <div class="paginate">
      {{ $posts->links() }}
    </div>
  </div>
</div>
@endsection

@section('footer')
<div class="container">
{{ link_to_route('posts.create','記事作成',[$post->id],['class'=>'btn btn-info btn-sm']) }}
</div>
@endsection


@section('script')
<script>
function delPostConfirm() {
    if(confirm('削除しますか？')) {
    } else {
        return false;
　　 }
}
</script>
@endsection
