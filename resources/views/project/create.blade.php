@extends('layouts.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('editor') }}" method="GET">
                        <label for="">Projekt neve:</label>
                        <input value="" type="text" class="form-control mb-3" placeholder="project neve" name="projectname">
                        <label for="">Projekt leírás:</label>
                        <input value="" type="text" class="form-control mb-3" placeholder="projekt leírás"
                            name="project_description">

                        <div class="text-center">
                            <button class="btn-next">Tovább</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection