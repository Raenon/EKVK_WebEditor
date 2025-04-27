@extends('layouts.master')


@section('content')


    @if(Auth::check())
        <div class="settings-container">
            <!-- Bal oldali menü -->
            <div class="left-panel">
                <div class="option active" onclick="changeContent(this, ''); showAccountSettings()">
                    Saját fiók
                </div>

                <div class="option" onclick="changeContent(this, ''); showInvitesTable()">
                    Invites
                </div>

                    <div class="option" onclick="changeContent(this, ''); showSelectCompany()">
                        Csapat Beállítás
                    </div>


                <div class="option" onclick="changeContent(this, ''); showCreateCompany()">
                    Új Csapat Létrehozás
                </div>

                <form action="{{ route('account.deactivate', $user) }} " method="POST">
                    @csrf
                    @method('POST')
                    <button class="deactive">DEAKTIVÁLÁS</button>
                </form>
            </div>

            <!-- Tartalom -->
            <div class="main-content">
                <div class="header">
                    <p><b>{{ $user->username}}</b></p>
                </div>

                <div id="mainContent"></div>

                <!-- Account Settings táblázat -->
                <form action="{{route("account.update", $user)}}" method="POST">
                    @csrf


                    <div class="table-container" id="accountTableContainer">
                        <table>
                            <thead>
                                <tr>
                                    <th colspan="5">Saját fiók</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Felhasználónév</td>
                                    <td><input type="text" placeholder="username" name="username" value="{{$user->username }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email cím</td>
                                    <td><input type="text" placeholder="email" value="{{ $user->email }}" name="email"></td>
                                </tr>
                                <tr>
                                    <td>Jelszó (hash)</td>
                                    <td><input type="password" placeholder="password" value="{{
                str_repeat('*', strlen($user->password))
                                                                                                            }}"
                                            name="password"></td>

                                </tr>
                            </tbody>
                        </table>
                        <button class="btnedit mt-3">Módosítás</button>
                    </div>
                </form>
                {{-- Account Settings táblázat END --}}


                {{-- Invites --}}
                <div class="table-container" id="invitesTable" style="display: none;">
                    <div class="row">
                        @foreach ($user->invites as $inviteCompany)
                            @foreach ($invites as $invite)
                                @if ($invite->company_id == $inviteCompany->id)
                                    <div class="col-4 card ms-4 p-5">
                                        <form action="{{ route('account.invite', $invite)}}" method="POST">
                                            @csrf
                                            <h5 class=""><b>You got invited to {{$inviteCompany->company_name}}!</b></h5>

                                            <br>

                                            <p>Press one of the buttons to Accept or Decline the invite.</p>
                                            <br>

                                            <div class="row">

                                                <div class="col-2"></div>

                                              <button  class="col-3 btn btn-success" type="submit" name="invite" value="1">
                                                    Accept
                                                </button> </input>

                                                <div class="col-2"></div>

                                                <button class="col-3 btn btn-danger" type="submit" name="invite" value="0">
                                                    Decline
                                                </button>

                                            </div>
                                        </form>
                                    </div>
                                    @break
                                @endif
                            @endforeach

                        @endforeach



                    </div>

                </div>
                {{-- Invites END --}}


                {{-- Company Select table START --}}

                <div class=" " id="selectCompanyContainer" style="display: none;">
                    <div class="row">


                    <div class="col-6">
                        <table>
                            <thead>
                                <tr>
                                    <th colspan="1">Select Group</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($user->companies as $company)
                                    @if($user->companies)
                                        <form action="{{ route('companyPage.index', $company)}}" method="GET">
                                            <tr>
                                                <td><button class="btn">{{ $company->company_name }}</button></td>
                                            </tr>
                                        </form>
                                    @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                {{-- Company Select table END --}}

                <!-- Create Company táblázat -->
                <form action="{{ route('account.storeCompany')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="table-container" id="createCompanyTableContainer" style="display: none;">
                        <table>
                            <thead>
                                <tr>
                                    <th colspan="5">Új Csapat létrehozás</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Új csapat neve</td>
                                    <td><input type="text" placeholder="Csapat név." name="company_name"></td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btncreate mt-3">Létrehozás</button>
                    </div>
                </form>
                <!-- Create Company táblázat  END-->

            </div>
        </div>

        <!-- JavaScript -->
        <script>
            function changeContent(element, text) {
                document.getElementById("mainContent").innerText = text;

                // Inaktivál minden opciót
                const options = document.querySelectorAll('.left-panel .option');
                options.forEach(opt => opt.classList.remove('active'));

                // Aktiváljuk a kiválasztottat
                element.classList.add('active');
            }

            function hideAllTables() {
                document.getElementById('accountTableContainer').style.display = 'none';
                document.getElementById('selectCompanyContainer').style.display = 'none';
                document.getElementById('createCompanyTableContainer').style.display = 'none';
                document.getElementById('invitesTable').style.display = 'none';
            }

            function showInvitesTable() {
                hideAllTables();
                document.getElementById('invitesTable').style.display = 'block';
            }

            function showAccountSettings() {
                hideAllTables();
                document.getElementById('accountTableContainer').style.display = 'block';
            }

            function showSelectCompany() {
                hideAllTables();
                document.getElementById('selectCompanyContainer').style.display = 'block';
            }

            function showCreateCompany() {
                hideAllTables();
                document.getElementById('createCompanyTableContainer').style.display = 'block';
            }
        </script>

    @else
        <p>User not logged in</p>
    @endif
@endsection
