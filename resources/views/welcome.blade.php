@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">All articles</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Options</th>
                          </tr>
                        </thead>
                        @if(Auth::check())
                        <a href="{{url("articles/create")}}"><button class='btn btn-primary'>New</button></a>
                        @endif
                        <tbody>
                        @foreach($articles as $article)
                          <tr>
                            <td>{{$article->title}}</a></td>
                            <td>{{$article->category->title}}</a></td>
                            <td>{{$article->user->name}}</a></td>
                            <td>
                            <a href="{{url("articles/$article->id")}}"><button class='btn btn-default'>View</button></a> 
                            @if(Auth::check() && Auth::id() === $article->user_id)
                            <a href="{{url("articles/$article->id/edit")}}"><button class='btn btn-warning'>Edit</button></a> 
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Delete (bs-modal)</button>
                            <a class='btn btn-danger' href="{{route('destroyA',['id'=>$article->id])}}" onclick="return confirm('Are you sure?')">Delete (js)</a>
                            @endif
                            </td>
                          </tr>
                          <!-- Modal -->
                          <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                            
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header text-center" style='background-color: rgba(150, 17, 17, 0.55);color:black'>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Delete</h4>
                                </div>
                                <div class="modal-body">
                                  <p>Are you sure?</p>
                                </div>
                                <div class="modal-footer">
                                  <a href="{{route('destroyA',['id'=>$article->id])}}"><button type="button" class="btn btn-danger pull-left">Delete</button></a>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                              <!--Modal end-->
                            </div>
                          </div>
                        @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">All categories</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Options</th>
                          </tr>
                        </thead>
                        @if(Auth::check())
                        <a href="{{url("categories/create")}}"><button class='btn btn-primary'>New</button></a>
                        @endif
                        <tbody>
                        @foreach($categories as $category)
                          <tr>
                            <td>{{$category->title}}</a></td>
                            <td>{{$category->user->name}}</a></td>
                            <td>
                            <a href="{{url("categories/$category->id")}}"><button class='btn btn-default'>View</button></a> 
                            @if(Auth::check() && Auth::id() === $category->user_id)
                            <a href="{{url("categories/$category->id/edit")}}"><button class='btn btn-warning'>Edit</button></a> 
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>
                            @endif
                            </td>
                          </tr>
                          <!-- Modal -->
                          <div class="modal fade" id="deleteModal" role="dialog">
                            <div class="modal-dialog">
                            
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header text-center" style='background-color: rgba(150, 17, 17, 0.55);color:black'>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Delete</h4>
                                </div>
                                <div class="modal-body">
                                  <p>Are you sure?</p>
                                </div>
                                <div class="modal-footer">
                                  <a href="{{route('destroyC',['id'=>$category->id])}}"><button type="button" class="btn btn-danger pull-left">Delete</button></a>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                              <!--Modal end-->
                            </div>
                          </div>
                        @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
