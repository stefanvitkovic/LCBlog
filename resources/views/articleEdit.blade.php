@extends('layouts.master')
@section('content')
<form method="POST" action="{{route('updateA',['id'=>$article->id])}}">
  <input type="hidden" name="_method" value="PUT">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name='title' value="{{$article->title}}">
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <input type="text" class="form-control" id="body" name="body" value="{{$article->body}}">
  </div>
  <div class="form-group">
  <label for="sel1">Select category:</label>
  <select name="category_id" class="form-control" id="sel1">
  @foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->title}}</option>
  @endforeach
  </select>
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