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
        <form method="GET" action="{{route('client.index')}}" class="formToSearch">
            @csrf
            <input type="text" name="search" value="{{request('search')}}"
                class="search form-control" placeholder="search by name"
                oninput="checkSearch(this)" data-index-url = "{{route('client.index')}}">
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <div class="card">
            <div class="card-title">
                <a href="{{route('client.create')}}" class="btn btn-primary m-3 float-end">Create</a>
                <h3 class="title p-3">My Clients</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover text-center">
                    <tr>
                        <th>num</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th colspan="3">Action</th>
                    </tr>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$client->name}}</td>
                            <td>{{$client->phone}}</td>
                            <td>{{$client->address}}</td>
                            <td><a href="{{route('client.show', $client->id)}}" class="text-info"><i class="fa-solid fa-eye"></i></a></td>
                            <td><a href="{{route('client.edit', $client->id)}}" class="text-warning"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="{{route('client.destroy', $client->id)}}" class="text-danger"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
