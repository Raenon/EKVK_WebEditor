@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update project: <strong>{{$project->project_name}}</strong></h4>
                <p class="card-text">Fields marked with <strong>*</strong> are mandatory!</p>
                <br>

                <ol>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ol>

                <form action="{{route("project.update", $project)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="">Project name:</label>
                    <input value="{{$project->project_name}}" type="text" class="form-control mb-3" placeholder="username" name="username" >
                    <label for="">Project description:</label>
                    <input value="{{$project->project_description}}" type="text" class="form-control mb-3" placeholder="email" name="email">

                    <div class="text-center">
                        <button class="btn btn-outline-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
