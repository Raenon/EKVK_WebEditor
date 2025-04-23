@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update user: <strong>{{$user->username}}</strong></h4>
                <p class="card-text">Fields marked with <strong>*</strong> are mandatory!</p>
                <br>

                <ol>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ol>

                <form action="{{route("user.update", $user)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="">Username:</label>
                    <input value="{{$user->username}}" type="text" class="form-control mb-3" placeholder="username" name="username" >
                    <label for="">Email:</label>
                    <input value="{{$user->email}}" type="text" class="form-control mb-3" placeholder="email" name="email">
                    <label for="">Password:</label>
                    <input value="{{$user->password}}" type="password" class="form-control mb-3" placeholder="password" name="password">
                    <label for="">Role:</label>
                    <input value="{{$user->role}}" type="number" class="form-control mb-3" placeholder="role" name="role">

                    <div class="text-center">
                        <button class="btn btn-outline-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
