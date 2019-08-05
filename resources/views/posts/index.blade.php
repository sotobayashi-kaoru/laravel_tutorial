@extends('layouts.app')
@section('title','記事一覧')
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
<table border=1>
<tr>
    <th>タイトル</th>
    <th>本文</th>
    <th>投稿時間</th>
    <th></th>
    <th></th>
</tr>
@foreach($posts as $post)
<tr>
    <td><li>{{ link_to_route('posts.show',$post->title,[$post->id]) }}</li></td>
    <td>{{ $post->content }}</td>
    <td>{{ $post->created_at }}</td>
    <td>{{ link_to_route('posts.edit','編集',[$post->id],['class'=>'btn btn-primary btn-sm']) }}</td>
    <td>
      {{ Form::open(['route'=>['posts.destroy',$post->id],'onSubmit'=>'return delPostConfirm();','method'=>'delete']) }}
      {{ Form::submit('削除',['class'=>'btn btn-danger btn-sm']) }}ƒ
      {{ Form::close() }}
    </td>
</tr>
@endforeach
</table>
@section('footer')
{{ link_to_route('posts.create','[記事作成]') }}
@endsection
