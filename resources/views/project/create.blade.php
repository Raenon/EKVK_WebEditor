@extends('layouts.master')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('projectPage.store') }}" method="POST">
                        @csrf
                        <label for="">Projekt neve:</label>
                        <input value="" type="text" class="form-control mb-3" placeholder="project neve" name="project_name" required>
                        <label for="">Projekt leírás:</label>
                        <input value="" type="text" class="form-control mb-3" placeholder="projekt leírás"
                            name="project_description" required>

                        <div class="text-center">
                            <button class="btn-click">Tovább</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
