@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>
                            Posts
                            <a href="{{url('/posts/create')}}" class="btn btn-outline-dark float-end">Create</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Updated at</th>
                                    <th scope="col">Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>
                                            @if ($item->image)
                                                <img src="{{asset($item->image)}}" alt="Post image" width="100">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>{{$item->description}}</td>
                                        <td>{{$item->status}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->updated_at}}</td>
                                        <td>{{$item->action_at}}</td>
                                        
                                        <td>
                                            <a href="{{url('post/edit/' . $item->id)}}" class="btn btn-warning">EDIT</a>
                                            <form action="{{'/post/delete/' . $item->id}}" method="POST" onclick="return confirm('Are you sure delete this post?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">DELETE</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection