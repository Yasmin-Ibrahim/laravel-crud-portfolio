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
    <form method="GET" action="{{route('project.index')}}" class="formToSearch">
        @csrf
        <input type="text" name="search" value="{{request('search')}}"
            class="search form-control" placeholder="search by ID"
            oninput="checkSearch(this)" data-index-url = "{{route('project.index')}}">
        <button><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
    <div class="card ms-5">
        <div class="card-title">
            <a href="{{route('project.create')}}" class="btn btn-primary m-3 float-end">Create</a>
            <h3 class="title p-3">Clients' Projects</h3>
        </div>
        <div class="card-body">
            <table class="table text-center">
                <tr>
                    <th>Num</th>
                    <th>Client ID</th>
                    <th>Title</th>
                    <th colspan="3">Action</th>
                </tr>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><a href="{{route('client.show', $project->client_id)}}">{{$project->client_id}}</a></td>
                        <td>{{$project->title}}</td>
                        <td><a href="{{route('project.show', $project->client_id)}}" class="text-info"><i class="fa-solid fa-eye"></i></a></td>
                        <td><a href="{{route('project.edit', $project->id)}}" class="text-warning"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href="{{route('project.destroy', $project->id)}}" class="text-danger"><i class="fa-solid fa-trash"></i></i></a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
