@extends('layouts.app')
@section('content')
<div class="container mt-5 col-6">
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Done!  </strong>
            {{Session::get('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form method="GET" action="{{route('about.index')}}" class="formToSearch">
        @csrf
        <input type="text" name="search" value="{{request('search')}}"
            class="search form-control" placeholder="search by ID"
            oninput="checkSearch(this)" data-index-url = "{{route('about.index')}}">
        <button><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
    <div class="card">
        <div class="card-title">
            <h3 class="title p-3">
                <a href="{{route('about.create')}}" class="btn btn-primary float-end ">Create</a>
                Show About's Clients
            </h3>
        </div>
        <div class="card-body">
            <table class="table text-center">
                <tr>
                    <th>Num</th>
                    <th>ID</th>
                    <th>Content</th>
                    <th colspan="2">Action</th>
                </tr>
                @foreach ($abouts as $about)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <a href="{{route('client.show', $about->client_id)}}">{{$about->client_id}}</a>
                        </td>
                        <td>{{$about->content}}</td>
                        <td><a href="{{route('about.edit', $about->id)}}" class="text-warning"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href="{{route('about.destroy', $about->id)}}" class="text-danger"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
