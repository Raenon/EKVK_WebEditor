@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Company: <strong>{{$company->username}}</strong></h4>
                <p class="card-text">Fields marked with <strong>*</strong> are mandatory!</p>
                <br>

                <ol>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ol>

                <form action="{{route("company.update", $company->id)}}" method="POST">
                    @csrf
                    <label for="">Company Name:</label>
                    <input value="{{$company->company_name}}" type="text" class="form-control mb-3" placeholder="username" name="username" >
                    <label for="">Company Email:</label>
                    <input value="{{$company->company_email}}" type="text" class="form-control mb-3" placeholder="email" name="email">
                    <label for="">Tax num:</label>
                    <input value="{{$company->tax_num}}" type="password" class="form-control mb-3" placeholder="password" name="password">

                    <div class="text-center">
                        <button class="btn btn-outline-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
