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

        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Done!  </strong>
                {{Session::get('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card">
            <div class="card-title">
                <a href="{{route('contact.index')}}" class="btn btn-primary float-end m-3">Back</a>
                <h3 class="p-3">Update the Contacts' Clients</h3>
            </div>
            <div class="card-body">
                <form action="{{route('contact.update', $contacts->id)}}" method="POST" class="form-w" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="client_id">Client ID: </label>
                        <select name="client_id" id="client_id" class="form-select @error('client_id') is_invalid @enderror">
                            <option disabled selected>Choose the Client</option>
                            @foreach ($clients as $client)
                                @if ($client->id == $contacts->client_id)
                                    <option value="{{$client->id}}" selected>{{$client->name}}</option>
                                @else
                                    <option value="{{$client->id}}">{{$client->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone">Phone: </label>
                        <input type="number" name="phone" value="{{$contacts->phone}}" class="form-control @error('phone') is_invalid @enderror"
                            pattern="^(\+?20)?[- ]?1[0-2,5]{1}[- ]?[0-9]{3}[- ]?[0-9]{4}[- ]?[0-9]{1}$">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email: </label>
                        <input type="email" name="email" value="{{$contacts->email}}" class="form-control @error('email') is_invalid @enderror">
                    </div>
                    <div class="form-group mb-3">
                        <label for="cv">Cv: </label>
                        <input type="file" name="cv" value="{{$contacts->cv}}" accept=".pdf" class="form-control @error('cv') is_invalid @enderror">
                    </div>
                    <div class="form-group mb-3">
                        <label for="linkedin">Linkedin: </label>
                        <input type="url" name="linkedin" value="{{$contacts->linkedin}}" class="form-control @error('linkedin') is_invalid @enderror">
                    </div>
                    <div class="form-group mb-3">
                        <label for="github">Github: </label>
                        <input type="url" name="github" value="{{$contacts->github}}" class="form-control @error('github') is_invalid @enderror">
                    </div>
                    <div class="form-group mb-3">
                        <textarea name="message" id="message" cols="30" rows="10"
                        class="form-control @error('message') is-invalid @enderror"
                        placeholder="Enter any message here...">{{$contacts->message}}</textarea>
                    </div>
                    <div class="d-grid mt-3">
                        <button class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
