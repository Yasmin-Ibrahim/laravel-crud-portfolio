@extends('layouts.app')

@section('content')
    <div class="container mt-5 col-6">
         @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Done!</strong>
                {{Session::get('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-title">
                <h3 class="title p-3">
                    <a href="{{route('skill.index')}}" class="btn btn-primary float-end">Back</a>
                    Create Skills to New Client
                </h3>
            </div>
            <div class="card-body">
                <form action="{{route('skill.store')}}" method="POST" class="form-w">
                    @csrf
                    <div class="form-group mb-3">
                        <select name="client_id" class="form-select
                            @error('client_id')
                                is-invalid
                            @enderror">
                            <option selected disabled>Choose The Client</option>
                            @foreach($clients as $client)
                                <option value="{{$client->id}}">{{$client->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="type">Skill Type:</label>
                        <input type="text" name="type_skill" class="form-control
                            @error('type_skill')
                                is-invalid
                            @enderror"
                         value="{{old('type_skill')}}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Skill Name:</label>
                        <input type="text" name="name_skill" class="form-control
                            @error('name_skill')
                                is-invalid
                            @enderror"
                         value="{{old('name_skill')}}">
                    </div>

                    <div class="d-grid mt-3">
                        <button class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
