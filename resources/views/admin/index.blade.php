@extends('layouts.master')

@section('content')
    <div class="settings-container">
        <!-- Sidebar -->
        <div class="left-panel">
            <div class="option active" onclick="changeContent(this, ''); showUser()">User</div>
            <div class="option" onclick="changeContent(this, ''); showCompany()">Company</div>
            <div class="option" onclick="changeContent(this, ''); showProject()">Project</div>
            <hr class="mb-2">
            <div class="option" onclick="changeContent(this, ''); showUserTrashed()">Deleted Users</div>
            <div class="option" onclick="changeContent(this, ''); showCompanyTrashed()">Deleted Companies</div>
            <div class="option" onclick="changeContent(this, ''); showProjectTrashed()">Deleted Projects</div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header" id="tableHeader">
                <p id="tableTitle"><b>Leöntöttem almalével a billentyűzetem és ragad a törlés gomb :3</b></p>
            </div>

            <div id="mainContent"></div>

            <!-- User Table -->
            <div class="table-container" id="userTable">
                <table class="table-striped ">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Username</th>
                            <th>email</th>
                            <th>role</th>
                            <th>group(s)</th>
                            <th>created_at</th>
                            <th>updated_at</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            @if ($user->deleted_at == null)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            {{ $role->role_name }}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($user->companies as $company)
                                            @if($user->companies)
                                                {{ $company->company_name }},
                                            @endif

                                        @endforeach
                                    </td>

                                    <td>{{$user->created_at}}</td>
                                    <td>{{$user->updated_at}}</td>

                                    <td>
                                        <form action="{{ route('user.edit', $user) }}" method="GET">
                                            <button class="btn btn-warning ms-4"><i class="bi bi-pencil-square"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('user.destroy', $user) }} " method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger ms-4"><i class="bi bi-trash3"></i></button>
                                        </form>
                                    </td>

                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

            </div>

            <!-- Company Table -->
            <div class="table-container" id="companyTable" style="display: none;">
                <table>
                    <thead>
                        <th>id</th>
                        <th>company name</th>
                        <th>created_at</th>
                        <th>updated_at</th>

                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                            @if ($company->deleted_at == null)
                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td>{{ $company->company_name }}</td>
                                    <td>{{$company->created_at}}</td>
                                    <td>{{$company->updated_at}}</td>

                                    <td>
                                        <form action="{{ route('company.edit', $company) }}" method="GET">
                                            <button class="btn btn-warning"><i class="bi bi-pencil-square"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('company.destroy', $company) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                        </form>
                                    </td>

                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Project táblázat -->
            <div class="table-container" id="projectTable" style="display: none;">
                <table>
                    <thead>
                        <th>id</th>
                        <th>username</th>
                        <th>project_name</th>
                        <th>project_description</th>
                        <th>created_at</th>
                        <th>updated_at</th>

                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                            @if ($project->deleted_at == null)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    @foreach ($users as $user)
                                        @if ($user->id == $project->user_id)
                                            <td>{{$user->username}}</td>
                                        @endif
                                    @endforeach
                                    <td>{{ $project->project_name }}</td>
                                    <td>{{ $project->project_description }}</td>
                                    <td>{{$project->created_at}}</td>
                                    <td>{{$project->updated_at}}</td>

                                    <td>
                                        <form action="{{ route('project.edit', $project) }}" method="GET">
                                            <button class="btn btn-warning"><i class="bi bi-pencil-square"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('project.destroy', $project) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                        </form>
                                    </td>

                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Deleted users táblázat -->
            <div class="table-container" id="userTrash" style="display: none;">
                <table class="table-striped ">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Username</th>
                            <th>email</th>
                            <th>role</th>
                            <th>group(s)</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th>deleted_at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            @if ($user->deleted_at != NULL)
                                <tr>
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            {{ $role->role_name }}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($user->companies as $company)
                                            @if($user->companies)
                                                {{ $company->company_name }},
                                            @else
                                                not in a company
                                            @endif

                                        @endforeach
                                    </td>

                                    <td>{{$user->created_at}}</td>
                                    <td>{{$user->updated_at}}</td>
                                    <td>{{$user->deleted_at}}</td>
                                    <td>
                                        <form action="{{ route('user.restore', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-danger ms-5"><i
                                                    class="bi bi-arrow-counterclockwise"></i>Restore</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Deleted Company táblázat -->
            <div class="table-container" id="companyTrash" style="display: none;">
                <table>
                    <thead>
                        <th>id</th>
                        <th>company_name</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                        <th>deleted_at</th>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                            @if ($company->deleted_at != NULL)
                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td>{{ $company->company_name }}</td>
                                    <td>{{$company->created_at}}</td>
                                    <td>{{$company->updated_at}}</td>
                                    <td>{{$company->deleted_at}}</td>
                                    <td>
                                        <form action="{{ route('company.restore', $company->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-danger ms-3"><i
                                                    class="bi bi-arrow-counterclockwise"></i>Restore</button>
                                        </form>
                                    </td>

                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>


            <!-- Deleted Project táblázat -->
            <div class="table-container" id="projectTrash" style="display: none;">
                <table>
                    <thead>
                        <th>id</th>
                        <th>username</th>
                        <th>project_name</th>
                        <th>project_description</th>
                        <th>created_at</th>
                        <th>updated_at</th>

                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                            @if ($project->deleted_at != null)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    @foreach ($users as $user)
                                        @if ($user->id == $project->user_id)
                                            <td>{{$user->username}}</td>
                                        @endif
                                    @endforeach
                                    <td>{{ $project->project_name }}</td>
                                    <td>{{ $project->project_description }}</td>
                                    <td>{{$project->created_at}}</td>
                                    <td>{{$project->updated_at}}</td>
                                    <td>
                                        <form action="{{ route('project.restore', $project->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-danger ms-3"><i
                                                    class="bi bi-arrow-counterclockwise"></i>Restore</button>
                                        </form>
                                    </td>

                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
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
            document.getElementById('userTable').style.display = 'none';
            document.getElementById('companyTable').style.display = 'none';
            document.getElementById('projectTable').style.display = 'none';
            document.getElementById('userTrash').style.display = 'none';
            document.getElementById('companyTrash').style.display = 'none';
            document.getElementById('projectTrash').style.display = 'none';
        }

        function showUser() {
            hideAllTables();
            document.getElementById('userTable').style.display = 'block';
        }

        function showCompany() {
            hideAllTables();
            document.getElementById('companyTable').style.display = 'block';
        }

        function showProject() {
            hideAllTables();
            document.getElementById('projectTable').style.display = 'block';
        }

        function showUserTrashed() {
            hideAllTables();
            document.getElementById('userTrash').style.display = 'block';
        }

        function showCompanyTrashed() {
            hideAllTables();
            document.getElementById('companyTrash').style.display = 'block';
        }
        function showProjectTrashed() {
            hideAllTables();
            document.getElementById('projectTrash').style.display = 'block';
        }
    </script>
@endsection
