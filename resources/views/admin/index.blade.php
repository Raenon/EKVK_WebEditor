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
            <div class="header">
                <p id="tableTitle"><b>Leöntöttem almalével a billentyűzetem és ragad a törlés gomb :3</b></p>
            </div>

            <div id="mainContent"></div>

            <!-- User Table -->
            <div class="table-container" id="userTable">
                <table class="table-striped ">
                    <thead >
                        <tr>
                            <th>id</th>
                            <th>Username</th>
                            <th>email</th>
                            <th>Password</th>
                            <th>role</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th>deleted_at</th>
                        </tr>
                    </thead>
                   <tbody>
                   @foreach($users as $user)
                    @if ($user->deleted_at == NULL)



                         <tr>
                              <td>{{ $user->id }}</td>
                              <td>{{ $user->username }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ str_repeat('*',strlen($user->password)) }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->updated_at}}</td>
                            <td>{{$user->deleted_at}}</td>
                            <td>
                                <form action="{{ route('user.edit', $user) }}" method="GET">
                                    <button
                                        class="btn btn-warning"><i class="bi bi-pencil-square"></i></button></form>
                            </td>
                            <td>
                                <form action="{{ route('user.destroy', $user) }} " method="POST">
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

            <!-- Company Table -->
            <div class="table-container" id="companyTable" style="display: none;">
                <table>
                    <thead>
                        <th>id</th>
                        <th>company name</th>
                        <th>company_email</th>
                        <th>tax_num</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                        <th>deleted_at</th>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)

                              <tr>
                                   <td>{{ $company->id }}</td>
                                   <td>{{ $company->company_name }}</td>
                                   <td>{{ $company->company_email }}</td>
                                   <td>{{ $company->tax_num }}</td>
                                 <td>{{$user->created_at}}</td>
                                 <td>{{$user->updated_at}}</td>
                                 <td>{{$user->deleted_at}}</td>
                                 <td>
                                     <form action="{{-- {{ route('user.edit', $user) }} --}}" method="GET">
                                         <button
                                             class="btn btn-warning"><i class="bi bi-pencil-square"></i></button></form>
                                 </td>
                                 <td>
                                     <form action="{{-- {{ route('user.destroy', $user) }} --}}" method="POST">
                                         @csrf
                                         @method('DELETE')
                                         <button class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                     </form>
                                 </td>

                              </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>

            <!-- Project táblázat -->
            <div class="table-container" id="projectTable" style="display: none;">
                <table>
                    <thead>
                        <tr>
                            <th colspan="5">Project</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Új cég neve</td>
                            <td>Adja meg az új cég nevét</td>
                            <td>-</td>
                            <td><input type="text" placeholder="Pl: Új Cég Kft."></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>Kapcsolattartó email cím</td>
                            <td>-</td>
                            <td><input type="email" placeholder="email@example.com"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Telefonszám</td>
                            <td>Kapcsolattartó telefonszáma</td>
                            <td>-</td>
                            <td><input type="text" placeholder="+36..."></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Cím</td>
                            <td>Székhely vagy telephely</td>
                            <td>-</td>
                            <td><input type="text" placeholder="Cím megadása"></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Bonusz táblázat -->
            <div class="table-container" id="userTrash" style="display: none;">
                <table class="table-striped ">
                    <thead >
                        <tr>
                            <th>id</th>
                            <th>Username</th>
                            <th>email</th>
                            <th>Password</th>
                            <th>role</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th>deleted_at</th>
                        </tr>
                    </thead>
                   <tbody>
                   @foreach($users as $user)
                    @if ($user->deleted_at != NULL)



                         <tr>
                              <td>{{ $user->id }}</td>
                              <td>{{ $user->username }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ str_repeat('*',strlen($user->password)) }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->updated_at}}</td>
                            <td>{{$user->deleted_at}}</td>

                            <td>
                                <form action="{{ route('userRestore' , $user) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger ms-5"><i class="bi bi-arrow-counterclockwise"></i>Restore</button>
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
    </script>
@endsection
