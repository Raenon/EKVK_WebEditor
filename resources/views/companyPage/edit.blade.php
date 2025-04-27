@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Company: <strong>{{$company->username}}</strong></h4>
                <p class="card-text">Fields marked with <strong>*</strong> are mandatory!</p>
                <br>

                <form action="{{route("companyPage.update", $company->id)}}" method="POST">
                    @csrf
                    <label for="">Company Name:</label>
                    <input value="{{$company->company_name}}" type="text" class="form-control mb-3" placeholder="company_name" name="company_name" >
                    <div class="text-center">
                        <button class="btn btn-outline-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
