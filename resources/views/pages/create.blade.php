@extends('app')

@section('content')
    <div class="container">
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
                        <form action="{{url('/post')}}" method="POST" enctype="multipart/form-data">
                            {{-- laravel deer post huselt hiij bga bol zaawal CSRF bichne(ene ni ugugdluudiig nuutslana) --}}
                            {{-- Cross Site Requiest Forgery --}}
                            @csrf

                            <div class="mb-3">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" value="{{old('title')}}">
                                @error('title')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description">{{old('description')}}</textarea>
                                @error('description')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Upload Image</label>
                                <input type="file" name="image" class="form-control">
                                @error('image')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Is Public or Private</label>
                                <input type="checkbox" name="status" {{old('status') ? 'checked' : ''}}>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection