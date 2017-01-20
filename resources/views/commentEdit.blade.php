@extends('layouts.master')
@section('content')
<form method="POST" action="{{route('updateComm',['id'=>$comment->id])}}">
  <input type="hidden" name="_method" value="PUT">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="id" value="{{$comment->id}}">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name='name' value="{{$comment->name}}">
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <input type="text" class="form-control" id="body" name='body' value="{{$comment->body}}">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
  <br><br>
  @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
</form>
@endsection