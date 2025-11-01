@extends('layouts.app')
@section('content')
    <div class="container mt-5 col-6">
        <div class="card">
            <div class="card-title">
                <a href="{{route('client.index')}}" class="btn btn-primary m-3 float-end">Back</a>
                <h3 class="title p-3">Info about my client</h3>
            </div>
            <div class="body p-4">
                <div class="img text-center mb-3">
                    <img src="{{Storage::url($client->image)}}" alt="the photo of the client">
                </div>
                <h6>ID: {{$client->id}}</h6>
                <hr>
                <h6>Name: {{$client->name}}</h6>
                <hr>
                <h6>Phone: {{$client->phone}}</h6>
                <hr>
                <h6>Address: {{$client->address}}</h6>
                <hr>
                <h6>The Field: {{$client->field}}</h6>
                <hr>
                <h6>Job: {{$client->job}}</h6>
                <hr>
                <h6>Experience: {{$client->experience}}</h6>
                <hr>
                <h6>Location: {{$client->location}}</h6>
                <hr>
                <h6>Cost: {{$client->cost}}</h6>
            </div>
        </div>
    </div>
@endsection
