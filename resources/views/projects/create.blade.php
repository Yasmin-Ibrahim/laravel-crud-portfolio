@extends('layouts.app')
@section('content')
<div class="container mt-5 col-6">
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Done!</strong>
                {{Session::get('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-title">
            <a href="{{route('project.index')}}" class="btn btn-primary float-end m-3">Back</a>
            <h3 class="title p-3">Add the Project Here</h3>
        </div>
        <div class="card-body">
            <form action="{{route('project.store')}}" method="POST" enctype="multipart/form-data" class="form-w">
                @csrf
                <div class="form-group mb-3">
                    <select name="client_id" class="form-select
                            @error('client_id')
                                is-invalid
                            @enderror">
                        <option selected disabled>Choose the Client</option>
                        @foreach ($clients as $client)
                            <option value="{{$client->id}}">{{$client->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="title">Title: </label>
                    <input type="text" id="title" name="title" value="{{old('title')}}" class="form-control
                        @error('title')
                            is-invalid
                        @enderror">
                </div>
                <div class="form-group mb-3">
                    <label for="category">Category: </label>
                    <input type="text" id="category" name="category" value="{{old('category')}}" class="form-control
                        @error('category')
                            is-invalid
                        @enderror">
                </div>
                 <div class="form-group mb-3">
                    <label for="description">description: </label>
                    <textarea class="form-control" id="descriptionBox" name="description" cols="30" rows="10" placeholder="Description's Project:"> </textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="image">Image: </label>
                    <input type="file" id="image" name="image" accept="*/image" value="{{old('image')}}" class="form-control
                        @error('image')
                            is-invalid
                        @enderror">
                </div>
                <div class="form-group mb-3">
                    <label for="link">Link: </label>
                    <input type="url" id="link" name="link" value="{{old('link')}}" class="form-control
                        @error('link') is-invalid @enderror">
                </div>
                <div class="d-grid mt-3">
                    <button class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
