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
                <h3 class="p-3">Add the Contacts' Clients</h3>
            </div>
            <div class="card-body">
                <form action="{{route('contact.store')}}" method="POST" class="form-w" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="client_id">Client ID: </label>
                        <select name="client_id" id="client_id" class="form-select @error('client_id') is_invalid @enderror">
                            <option disabled selected>Choose the Client</option>
                            @foreach ($clients as $client)
                                <option value="{{$client->id}}">{{$client->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone">Phone: </label>
                        <input type="number" name="phone" value="{{old('phone')}}" class="form-control @error('phone') is_invalid @enderror"
                            pattern="^(\+?20)?[- ]?1[0-2,5]{1}[- ]?[0-9]{3}[- ]?[0-9]{4}[- ]?[0-9]{1}$">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email: </label>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is_invalid @enderror">
                    </div>
                    <div class="form-group mb-3">
                        <label for="cv">Cv: </label>
                        <input type="file" name="cv" value="{{old('cv')}}" class="form-control @error('cv') is_invalid @enderror">
                    </div>
                    <div class="form-group mb-3">
                        <label for="linkedin">Linkedin: </label>
                        <input type="url" name="linkedin" value="{{old('linkedin')}}" class="form-control @error('linkedin') is_invalid @enderror">
                    </div>
                    <div class="form-group mb-3">
                        <label for="github">Github: </label>
                        <input type="url" name="github" value="{{old('github')}}" class="form-control @error('github') is_invalid @enderror">
                    </div>
                    <div class="form-group mb-3">
                        <label for="facebook">Facebook: </label>
                        <input type="url" name="facebook" value="{{old('facebook')}}" class="form-control @error('facebook') is_invalid @enderror">
                    </div>
                    <div class="form-group mb-3">
                        <label for="instagram">Instagram: </label>
                        <input type="url" name="instagram" value="{{old('instagram')}}" class="form-control @error('instagram') is_invalid @enderror">
                    </div>

                    <div class="d-grid mt-3">
                        <button class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
