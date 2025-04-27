@extends('layouts.master')

@section('content')
    <div class="settings-container">
        <!-- Sidebar -->
        <div class="left-panel">
            <div class="option active" onclick="changeContent(this, ''); showLanding()">{{ $company->company_name }}</div>
            <hr>
            <p>Management:</p>
            <div class="option " onclick="changeContent(this, ''); showCompany()">Beállítások</div>
            <div class="option " onclick="changeContent(this, ''); showInvite()">Invite</div>


        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <p><b>{{ $company->company_name }}</b></p>

            </div>

            <div id="mainContent"></div>
            <div class="table-container" id="landingPage">
                <div class="row">

                    <p>This is the landing page of {{ $company->company_name }}.
                        <br><br>
                        Some stats will go here probably. <br>
                        Like how many projects and users the group has and stuff like that if I don't forget.
                    </p>

                </div>
            </div>

            <div class="table-container" id="companyTable" style="display: none">
                <table>
                    <thead>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Company name</th>
                            <td>{{ $company->company_name }}</td>
                        </tr>

                        <tr>
                            <th>Users</th>
                            <td>
                                @foreach ($company->users as $user)
                                    @if($company->users)
                                        {{ $user->username }},
                                    @endif
                                @endforeach

                            </td>
                        </tr>

                        <tr>
                            <th>Created At</th>
                            <td>{{$company->created_at}}</td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{$company->updated_at}}</td>
                        </tr>


                    </tbody>
                </table>
                <div class="row ms-5">

                <form class="col-3" action="{{-- {{ route('company.edit', $company) }} --}}" method="GET">
                    <button class="btn btn-primary m-5"><i class="bi bi-eye"></i> Show</button>
                </form>

                <form class="col-3" action="{{-- {{ route('company.edit', $company) }} --}}" method="GET">
                    <button class="btn btn-success m-5 "><i class="bi bi-eye"></i> Users</button>
                </form>

                <form class="col-3" action="{{ route('company.edit', $company) }}" method="GET">
                    <button class="btn btn-warning m-5"><i class="bi bi-pencil-square"></i> Edit</button>
                </form>

                <form class="col-3" action="{{ route('company.destroy', $company) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger m-5"><i class="bi bi-trash3"></i> Delete</button>
                </form>
                </div>
            </div>

            <div class="table-container" id="inviteContainer" style="display: none">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Send a group invite to a user! <strong></strong></h4>
                            <br>

                            <form action="{{route("companyPage.invite", $company->id) }} " method="POST">
                                @csrf
                                <label for="">Username:</label>
                                <input value="" type="text" class="form-control mb-3" placeholder="username"
                                    name="username">
                                <input value="{{ $company->id }}" type="hidden" class="form-control mb-3"
                                    placeholder="username" name="companyID">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-warning">Send invite</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function changeContent(element, text) {
                document.getElementById("mainContent").innerText = text;
                document.querySelectorAll('.left-panel .option').forEach(opt => opt.classList.remove('active'));
                element.classList.add('active');
            }

            function hideAllTables() {
                document.getElementById('companyTable').style.display = 'none';
                document.getElementById('landingPage').style.display = 'none';
                document.getElementById('inviteContainer').style.display = 'none';
            }


            function showLanding() {
                hideAllTables();
                document.getElementById('landingPage').style.display = 'block';
            }

            function showCompany() {
                hideAllTables();
                document.getElementById('companyTable').style.display = 'block';
            }

            function showInvite() {
                hideAllTables();
                document.getElementById('inviteContainer').style.display = 'block';
            }


        </script>
@endsection
