@extends('layouts.app')
@section('content')
    <div class="container mt-5 col-6">
        <div class="card">
            <div class="card-title">
                <a href="{{route('contact.index')}}" class="btn btn-primary m-3 float-end">Back</a>
                <h3 class="title p-3">Complete contacts</h3>
            </div>
            <div class="body p-4">
                <h6>ID: <a href="{{route('client.show', $contact->client_id)}}">{{$contact->client_id}}</a></h6>
                <hr>
                <h6>Phone: {{$contact->phone}}</h6>
                <hr>
                <h6>Email: {{$contact->email}}</h6>
                <hr>
                <h6>CV:</h6>
                 @if($contact->cv)
                    <iframe
                        src="{{ asset('storage/' . $contact->cv) }}"
                        width="500px"
                        height="300px"
                        style="border:1px solid #ccc; border-radius:10px;">
                    </iframe>

                    <div class="mt-3">
                        <a href="{{ asset('storage/' . $contact->cv) }}"
                        download
                        target="_blank" class="btn btn-success" >
                        Download CV
                        </a>
                    </div>
                @else
                    <p>No CV uploaded.</p>
                @endif
                <hr>
                <h6>Linkedin: <a href="{{$contact->linkedin}}">{{$contact->linkedin}}</a></h6>
                <hr>
                <h6>Github: <a href="{{$contact->github}}">{{$contact->github}}</a></h6>
                <hr>
                <h6>Facebook: <a href="{{$contact->facebook}}">{{$contact->facebook}}</a></h6>
                <hr>
                <h6>Instagram: <a href="{{$contact->instagram}}">{{$contact->instagram}}</a></h6>
            </div>
        </div>
    </div>
@endsection
