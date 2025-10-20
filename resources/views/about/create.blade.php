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
                <h3 class="title p-3">
                    <a href="{{route('about.index')}}" class="btn btn-primary float-end">Back</a>
                    Create about to New Client
                </h3>
            </div>
            <div class="card-body">
                <form action="{{route('about.store')}}" method="POST" class="form-w">
                    @csrf
                    <div class="form-group mb-3">
                        <select name="client_id" class="form-select
                                @error('client_id')

                                @enderror">
                            <option selected disabled>Choose The Client</option>
                            @foreach ($clients as $client)
                                <option value="{{$client->id}}">{{$client->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <textarea class="form-control"id="aboutBox" name="content" cols="30" rows="10"></textarea>
                    </div>
                    <div class="d-grid mt-3">
                        <button class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
