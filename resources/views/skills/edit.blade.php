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

        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Done!</strong>
                {{Session::get('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-title">
                <h3 class="title p-3">
                    <a href="{{route('skill.index')}}" class="btn btn-primary float-end">Back</a>
                    Edit on the Skills to the Client
                </h3>
            </div>
            <div class="card-body">
                <form action="{{route('skill.update', $skill->id)}}" method="POST" class="form-w">
                    @csrf
                    <div class="form-group mb-3">
                        <select name="client_id" class="form-select
                            @error('client_id')
                                is-invalid
                            @enderror">
                            <option selected disabled>Choose The Client</option>
                            @foreach($clients as $client)
                                @if ($client->id == $skill->client_id)
                                    <option selected value="{{$client->id}}">{{$client->name}}</option>
                                @else
                                    <option value="{{$client->id}}">{{$client->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="type">Type:</label>
                        <select name="type" class="form-select @error('type') is-invalid @enderror">
                            <option selected disabled>Choose Type</option>
                                <option value="technical skill" {{$skill->type == 'technical skill' ? 'selected' : ''}}>Technical Skill</option>
                                <option value="soft skills" {{$skill->type == 'soft skills' ? 'selected' : ''}}>Soft Skills</option>
                                <option value="courses" {{$skill->type == 'courses' ? 'selected' : ''}}>Courses</option>
                                <option value="certifications" {{$skill->type == 'certifications' ? 'selected' : ''}}>Certifications</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="title">Title (Subcategory):</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                         value="{{old('title', $skill->title)}}" placeholder="language, framework, server management">
                    </div>

                    <div class="form-group mb-3">
                        <label for="content">Content (Separate by comma):</label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror"
                        rows="3" placeholder="Example: php, js, laravel, react">{{old('content', implode(',', $skill->content))}}</textarea>
                    </div>

                    <div class="d-grid mt-3">
                        <button class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
