@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading text-center">{{$id->title}}</div>
            <div class="panel-body">
            <p class='text-center'>{{$id->body}}</p>
            <em><p>Author: {{$id->user->name}}</p></em>
            <em><p>Category: {{$id->category->title}}</p></em>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading text-center">Comments</div>
            <div class="panel-body">
            @if(Auth::check())
            <form method="POST" action="{{url('comments')}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="user_id" value={{Auth::id()}}>
              <input type="hidden" name="article_id" value="{{$id->id}}">
              <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">{{Auth::user()->name}}</span>
                  <input type="text" class="form-control" name="name" placeholder="Comment name" aria-describedby="basic-addon1">
                  <input type="text" class="form-control" name="body" placeholder="Enter a comment" aria-describedby="basic-addon1">
              </div>
              <br>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
            @else
            <h3><em><a href="/login">Login to make a comment</a></em></h3>
            @endif
            <br>

            @foreach($id->comments as $comment)
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">{{$comment->name}} <span class='pull-right '><span style="font-size: 12px"><em>
                @if(Auth::check() && Auth::id() === $comment->user_id)
                <a class='text-warning' href="{{url("comments/$comment->id/edit")}}">Edit</a> /
                <a class='text-danger' href="{{url("comments/$comment->id/delete")}}">Delete</a>
                @endif
                </em></span>
                </h3>
              </div>
              <div class="panel-body">
                {{$comment->body}}
              </div>
            </div>
            @endforeach
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            </div>
        </div>
    </div>
</div>
@endsection