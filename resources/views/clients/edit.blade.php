@extends('layouts.app')

@section('content')

    <div class="container mt-5 col-6">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Done!  </strong>
                {{Session::get('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-title">
                <a href="{{route('client.index')}}" class="btn btn-primary m-3 float-end">Back</a>
                <h3 class="title p-3">Edit on the Client</h3>
            </div>
            <div class="card-body">
                <form action="{{route('client.update', $client->id)}}" method="POST" enctype="multipart/form-data" class="form-w">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name">Name: </label>
                        <input type="text" class="form-control
                            @error('name')
                                is-invalid
                            @enderror"
                            name="name" value="{{$client->name}}">
                    </div>

                     <div class="form-group mb-2">
                        <label for="phone">Phone: </label>
                        <input type="text" min="7" max="15" class="form-control
                            @error('phone')
                                is-invalid
                            @enderror"
                            name="phone" value="{{$client->phone}}">
                    </div>

                     <div class="form-group mb-2">
                        <label for="address">Address: </label>
                        <input type="text" class="form-control
                            @error('address')
                                is-invalid
                            @enderror
                            " name="address" value="{{$client->address}}">
                    </div>

                    <div class="form-group mb-2">
                        <label for="job">Job: </label>
                        <input type="text" class="form-control
                            @error('job')
                                is-invalid
                            @enderror
                            " name="job" value="{{$client->job}}">
                    </div>

                    <div class="form-group mb-2">
                        <label for="experience">Experience: </label>
                        <input type="number" min="1" max="20" class="form-control
                            @error('experience')
                                is-invalid
                            @enderror
                            " name="experience" value="{{$client->experience}}">
                    </div>

                    <div class="form-group mb-2">
                        <label for="location">Location: </label>
                        <input type="text" class="form-control
                            @error('location')
                                is-invalid
                            @enderror
                            " name="location" value="{{$client->location}}">
                    </div>

                    <div class="form-group mb-2">
                        <label for="image">Image:
                            <div class="img-edit">
                                <img src="{{Storage::url($client->image)}}" alt="">
                            </div>
                        </label>
                        <input type="file" class="form-control mt-1
                            @error('image')
                                is-invalid
                            @enderror
                            " name="image" accept="*/image" value="{{$client->image}}">
                    </div>

                    <div class="form-group mb-2">
                        <label for="cost">Cost: </label>
                        <input type="number" min="100" max="100000" step="0.01" class="form-control
                            @error('cost')
                                is-invalid
                            @enderror
                            " name="cost" value="{{$client->cost}}">
                    </div>

                    <div class="d-grid mt-3">
                        <button class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
