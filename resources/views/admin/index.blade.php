@extends('layouts.master')

@section('content')
    <div class="settings-container">
        <!-- Sidebar -->
        <div class="left-panel">
            <div class="option active" onclick="changeContent(this, ''); showUser()">User</div>
            <div class="option" onclick="changeContent(this, ''); showCompany()">Company</div>
            <div class="option" onclick="changeContent(this, ''); showProject()">Project</div>
            <div class="option" onclick="changeContent(this, ''); showBonusz()">+1</div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <p><b>Beállítás</b></p>
            </div>

            <div id="mainContent"></div>

            <!-- User Table -->
            <div class="table-container" id="userTable">
                <table>
                    <thead>
                        <tr>
                            <th colspan="5">User</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Felhasználónév</td>
                            <td>A felhasználó egyedi azonosító neve</td>
                            <td>-</td>
                            <td><input type="text" placeholder="Felhasználó név"></td>
                        </tr>
                        <tr>
                            <td>Email cím</td>
                            <td>A fiókhoz társított email</td>
                            <td>-</td>
                            <td><input type="text" placeholder="Email cím"></td>
                        </tr>
                        <tr>
                            <td>Jelszó</td>
                            <td>A fiókhoz tartozó jelszó</td>
                            <td>-</td>
                            <td><input type="text" placeholder="Jelszó"></td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Company Table -->
            <div class="table-container" id="companyTable" style="display: none;">
                <table>
                    <thead>
                        <tr>
                            <th colspan="5">Company</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Cég neve</td>
                            <td>A vállalat hivatalos neve</td>
                            <td>-</td>
                            <td><input type="text" placeholder="Cég név"></td>
                        </tr>
                        <tr>
                            <td>Adószám</td>
                            <td>A cég adószáma</td>
                            <td>-</td>
                            <td><input type="text" placeholder="Cég Adószám"></td>
                        </tr>
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
            <div class="table-container" id="bonuszTable" style="display: none;">
                <table>
                    <thead>
                        <tr>
                            <th colspan="5">Plusz 1 ha kellene</th>
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
            document.getElementById('bonuszTable').style.display = 'none';
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

        function showBonusz() {
            hideAllTables();
            document.getElementById('bonuszTable').style.display = 'block';
        }
    </script>
@endsection