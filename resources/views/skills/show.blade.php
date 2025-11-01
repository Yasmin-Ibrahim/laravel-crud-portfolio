@extends('layouts.app')
@section('content')
    <div class="container mt-5 col-6">
        <div class="card">
            <div class="card-title">
                <a href="{{route('skill.index')}}" class="btn btn-primary m-3 float-end">Back</a>
                <h3 class="title p-3">Complete Skills</h3>
            </div>
            <body>
                <ul>
                    @foreach ($client->skills as $skill)
                        <li><h6>{{$skill->type}}</h6></li>
                        @if ($skill->type == 'technical skill')
                            <h6>{{$skill->title}}</h6>
                            <ul>
                                @foreach ($skill->content as $item)
                                    <li><h6>{{$item}}</h6></li>
                                @endforeach
                            </ul>
                        @else
                            <ul>
                                @foreach ($skill->content as $item)
                                    <li><h6>{{$item}}</h6></li>
                                @endforeach
                            </ul>
                        @endif
                    @endforeach
                    <hr>
                </ul>
            </body>
        </div>
    </div>
@endsection
