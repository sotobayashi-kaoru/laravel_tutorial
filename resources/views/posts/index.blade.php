@extends('layouts.app')

@section('title','記事一覧')

@section('content')
<div style="margin-top: 50px;"></div>
<div class="container">
<table border="2"　bordercolor="#dcdcdc">
<tr>
    <tr bgcolor="#fff">
    <th class="text-center titleTxt">Title</th>
    <th class="text-center titleTxt">Posts</th>
    <th class="text-center titleTxt">Date</th>
    <th></th>
    <th></th>
</tr>
</tr>
@foreach($posts as $post)
<tr>
    <td><li>{{ link_to_route('posts.show',$post->title,[$post->id]) }}</li></td>
    <td>{{ $post->content }}</td>
    <td>{{ $post->created_at }}</td>
    <td>{{ link_to_route('posts.edit','Edit',[$post->id],['class'=>'btn btn-info btn-sm']) }}</td>
    <td>
      {{ Form::open(['route'=>['posts.destroy',$post->id],'onSubmit'=>'return delPostConfirm();','method'=>'delete']) }}
      {{ Form::submit('Delete',['class'=>'btn btn-danger btn-sm']) }}
      <!-- <a href="#" class="btn-flat-border">BUTTON</a> -->
      {{ Form::close() }}
    </td>
</tr>
@endforeach
</table>
</div>
</div>

<div class="container">
<div style="margin-top: 5px;"></div>
{{ Form::open(['route'=>'posts.index','method'=>'get']) }}
{{ csrf_field() }}
{{ Form::text('keywords','',['type'=>'search','placeholder'=>' ','style'=>'width: 415px']) }}

<div style="margin-top: 5px;"></div>

<div class="form-inline">
  <span>Date Search</span>
    {{ Form::checkbox('dateCheck', 'true', false, ['id'=> 'date_check']) }}
    {{ Form::date('fromDate', $fromDate, ['class' => 'form-control']) }}
    {{ Form::date('toDate', $toDate, ['class' => 'form-control']) }}
    {{ Form::submit('Search',['class'=>'btn btn-info btn-sm ']) }}
  {{ Form::close() }}
</div>
  <div style="margin-top: 20px;"></div>
  {{ link_to_route('posts.create','New Posts',[$post->id],['class'=>'btn btn-default btn-sm']) }}

</div>
  @endsection



@section('footer')
<div class="container">
  <div class="text-center">
    <div class="paginate">
      {{ $posts->links() }}
    </div>
  </div>
 </div>

@endsection


@if(Session::has('message'))
<div class="alert alert-success">
{{ session('message') }}
</div>
@endif

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
