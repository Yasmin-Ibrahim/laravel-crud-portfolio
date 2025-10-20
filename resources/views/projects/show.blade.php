@extends('layouts.app')
@section('content')
<div class="container mt-5 col-7">
    <div class="card">
        <div class="card-title">
            <a href="{{route('project.index')}}" class="btn btn-primary float-end m-3">Back</a>
            <h3 class="title p-3">See Full Project Details</h3>
        </div>
        <div class="card-body text-center">
            @if($client->projects->count() > 0)
                @foreach ($client->projects as $project)
                    <div class="inCard col-5">
                        <div class="box">
                            <div class="img">
                                <img src="{{Storage::url($project->image)}}" alt="">
                            </div>
                            <div class="contentBox">
                                <h5><span class="text-danger">Title:</span> {{$project->title}}</h5>
                                <p><span class="text-danger">Category:</span> {{$project->category}}</p>
                                <p><span class="text-danger">Description:</span> {{$project->description}}</p>
                                <p><span class="text-danger">Link:</span> <a href="{{$project->link}}" target="_blank">{{$project->link}}</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center text-danger fs-3">No projects found for this client.</p>
            @endif
        </div>
    </div>
</div>
@endsection
