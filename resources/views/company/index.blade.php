@extends('layouts.master')

@section('content')
    <div class="settings-container">
        <!-- Sidebar -->
        <div class="left-panel">
            <div class="option active" onclick="changeContent(this, ''); showUser()">Beállítás</div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <p><b>Cég Beállítás</b></p>
            </div>

            <div id="mainContent"></div>

            <!-- User Table -->
            <div class="table-container" id="userTable">
                <table class="table-table">
                    <tbody>
                        <tr>
                            <td>Új Cég neve</td>
                            <td>A vállalat hivatalos neve</td>
                            <td><input type="text" placeholder="Új Cég név"></td>
                            <td><button class="btnedit">Módosítás</button></td>
                        </tr>
                        <tr>
                            <td>Jelszó</td>
                            <td>A fiókhoz tartozó jelszó</td>
                            <td><input type="text" placeholder="Jelszó"></td>
                            <td><button class="btnedit">Módosítás</button></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>Kapcsolattartó email cím</td>
                            <td><input type="email" placeholder="email@example.com"></td>
                            <td><button class="btnedit">Módosítás</button></td>
                        </tr>
                        <tr>
                            <td>Telefonszám</td>
                            <td>Kapcsolattartó telefonszáma</td>
                            <td><input type="text" placeholder="+36..."></td>
                            <td><button class="btnedit">Módosítás</button></td>
                        </tr>
                        <tr>
                            <td>Adószám</td>
                            <td>A cég adószáma</td>
                            <td><input type="text" placeholder="Cég Adószám"></td>
                            <td><button class="btnedit">Módosítás</button></td>
                        </tr>
                        <tr>
                            <td>Cím</td>
                            <td>Székhely vagy telephely</td>
                            <td><input type="text" placeholder="Cím megadása"></td>
                            <td><button class="btnedit">Módosítás</button></td>
                        </tr>
                    </tbody>
                </table>
                <button class="save">MENTÉS</button>
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
        }

        function showUser() {
            hideAllTables();
            document.getElementById('userTable').style.display = 'block';
        }
    </script>
@endsection