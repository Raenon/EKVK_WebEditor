@extends('layouts.master')


@section('content')
    <div class="settings-container">
        <!-- Bal oldali menü -->
        <div class="left-panel">
            <div class="option active"
                onclick="changeContent(this, ''); showAccountSettings()">Saját fiók
            </div>
             @if (Auth::user()->role == "3")
                <div class="option" onclick="changeContent(this, ''); showCompanySettings()">Cég Beállítás
                </div>
            @endif

            <div class="option" onclick="changeContent(this, ''); showCreateCompany()">Új Cég Létrehozás
            </div>
            <form action="{{ route('user.destroy', Auth::user()) }} " method="POST" >
                @csrf
                @method('DELETE')
            <button class="deactive">DEAKTIVÁLÁS</button>
            </form>
        </div>

        <!-- Tartalom -->
        <div class="main-content">
            <div class="header">
                <p><b>Beállítás</b></p>
            </div>

            <div id="mainContent"></div>

            <!-- Account Settings táblázat -->

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
                            <td><input type="text" placeholder="{{ Auth::user()->username }}"></td>
                            <td><button class="btnedit">Módosítás</button></td>
                        </tr>
                        <tr>
                            <td>Email cím</td>
                            <td><input type="text" placeholder="{{ Auth::user()->email }}"></td>
                            <td><button class="btnedit">Módosítás</button></td>
                        </tr>
                        <tr>
                            <td>Jelszó</td>
                            <td><input type="password" placeholder="{{

                               str_repeat('*',strlen(Auth::user()->password))
                            }}"></td>
                            <td><button class="btnedit">Módosítás</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Company Settings -->
            <div class="table-container" id="companyTableContainer" style="display: none;">
                <table>
                    <thead>
                        <tr>
                            <th colspan="5">Cég Beállítás</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Cég neve</td>
                            <td>A vállalat hivatalos neve</td>
                            <td>-</td>
                            <td><input type="text" placeholder="Cég név"></td>
                            <td><button class="btnedit">Módosítás</button></td>
                        </tr>
                        <tr>
                            <td>Adószám</td>
                            <td>A cég adószáma</td>
                            <td>-</td>
                            <td><input type="text" placeholder="Cég Adószám"></td>
                            <td><button class="btnedit">Módosítás</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Create Company táblázat -->
            <div class="table-container" id="createCompanyTableContainer" style="display: none;">
                <table>
                    <thead>
                        <tr>
                            <th colspan="5">Új cég létrehozás</th>
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
                        <tr>
                            <td colspan="5">
                                <button class="btncreate">Létrehozás</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
            document.getElementById('companyTableContainer').style.display = 'none';
            document.getElementById('createCompanyTableContainer').style.display = 'none';
        }

        function showAccountSettings() {
            hideAllTables();
            document.getElementById('accountTableContainer').style.display = 'block';
        }

        function showCompanySettings() {
            hideAllTables();
            document.getElementById('companyTableContainer').style.display = 'block';
        }

        function showCreateCompany() {
            hideAllTables();
            document.getElementById('createCompanyTableContainer').style.display = 'block';
        }
    </script>
@endsection
