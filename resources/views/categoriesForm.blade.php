@extends('layouts.master')
@section('content')
<form method="POST" action="{{route('categories')}}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name='title' placeholder="title">
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