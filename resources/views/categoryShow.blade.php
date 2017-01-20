@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading text-center">Category name: {{$id->title}}</div>
            <div class="panel-body">
            <h4>Articles of this category:</h4>
            <ul>
            @foreach($id->article as $article)
            <li><p class='text-left'>{{$article->title}}</p></li>
            @endforeach
            </ul>
            <em><p>Author: {{$id->user->name}}</p></em>
            </div>
        </div>
    </div>
</div>
@endsection