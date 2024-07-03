@extends('app')

@section('content')
    <div class="container"><div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Posts
                            <a href="{{url('/posts')}}" class="btn btn-success float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/post/' . $post->id)}}" method="POST" enctype="multipart/form-data">
                            {{-- laravel deer post huselt hiij bga bol zaawal CSRF bichne(ene ni ugugdluudiig nuutslana) --}}
                            {{-- Cross Site Requiest Forgery --}}
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" value="{{$post->title}}">
                                @error('title')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description">{{$post->description}}</textarea>
                                @error('description')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Upload Image</label>
                                <input type="file" name="image" class="form-control">
                                <img src="{{asset($post->image)}}" alt="image" width="100">
                                @error('image')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Is Public or Private</label>
                                <input type="checkbox" name="status" {{$post->status ? 'checked' : ''}}>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection