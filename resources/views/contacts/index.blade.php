@extends('layouts.app');
@section('content')
<div class="container mt-5 col-6">
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Done!</strong>
                {{Session::get('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form method="GET" action="{{route('contact.index')}}" class="formToSearch">
        @csrf
        <input type="text" name="search" value="{{request('search')}}"
            class="search form-control" placeholder="search by ID"
            oninput="checkSearch(this)" data-index-url = "{{route('contact.index')}}">
        <button><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
    <div class="card">
        <div class="card-title">
            <a href="{{route('contact.create')}}" class="btn btn-primary m-3 float-end">Create</a>
            <h3 class="p-3">Add the Contacts for Client</h3>
        </div>
        <div class="card-body">
            <table class="table text-center">
                <tr>
                    <th>Num</th>
                    <th>Client ID</th>
                    <th>Phone</th>
                    <th colspan="3">Action</th>
                </tr>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><a href="{{route('client.show', $contact->client_id)}}">{{$contact->client_id}}</a></td>
                        <td>{{$contact->phone}}</td>
                        <td><a href="{{route('contact.show', $contact->id)}}" class="text-info"><i class="fa-solid fa-eye"></i></a></td>
                        <td><a href="{{route('contact.edit', $contact->id)}}" class="text-warning"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href="{{route('contact.destroy', $contact->id)}}" class="text-danger"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
