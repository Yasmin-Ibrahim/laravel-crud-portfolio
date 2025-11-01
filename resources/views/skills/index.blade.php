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
        <form method="GET" action="{{route('skill.index')}}" class="formToSearch">
            @csrf
            <input type="text" name="search" value="{{request('search')}}"
                class="search form-control" placeholder="search by ID"
                oninput="checkSearch(this)" data-index-url = "{{route('skill.index')}}">
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <div class="card">
            <div class="card-title">
                <h3 class="title p-3">
                    <a href="{{route('skill.create')}}" class="btn btn-primary float-end">Create</a>
                    Client Skills List
                </h3>
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <tr>
                        <th>Num</th>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Title</th>
                        <th colspan="3">Action</th>
                    </tr>
                    @foreach ($skills as $skill)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><a href="{{route('client.show', $skill->client_id)}}">{{$skill->client_id}}</a></td>
                        <td>{{$skill->type}}</td>
                        <td>{{$skill->title}}</td>
                        <td><a href="{{route('skill.show', $skill->client_id)}}" class="text-info"><i class="fa-solid fa-eye"></i></a></td>
                        <td><a href="{{route('skill.edit', $skill->id)}}" class="text-warning"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href="{{route('skill.destroy', $skill->id)}}" class="text-danger"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
