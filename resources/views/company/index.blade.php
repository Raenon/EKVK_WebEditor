@extends('layouts.master')

@section('content')
{{-- Ezzel lesz majd valami :D --}}
{{--     <div class="settings-container">
        <!-- Sidebar -->
        <div class="left-panel">
            <div class="option active" onclick="changeContent(this, ''); showProject()">Projects</div>
            <div class="option" onclick="changeContent(this, ''); showNewProject()">New project</div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <p><b>Számlák</b></p>
            </div>

            <div id="mainContent"></div>

            <!-- Project Table -->
            <div class="table-container" id="projectTable">
                <table>
                    <thead>
                        <tr>
                            <th colspan="5">Projects</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>A</tr>
                        <!--
                                TODO Project table foreach
                            -->
                    </tbody>
                </table>
            </div>
        </div>

        <div class="table-container" id="newProjectTable" style="display: none;">
            <table>
                <thead>
                    <tr>
                        <th colspan="5">New project</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>B</tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function changeContent(element, text) {
            document.getElementById("mainContent").innerText = text;
            document.querySelectorAll('.left-panel .option').forEach(opt => opt.classList.remove('active'));
            element.classList.add('active');
        }

        function hideAllTables() {
            document.getElementById('projectTable').style.display = 'none';
            document.getElementById('newProjectTable').style.display = 'none';
        }

        function showProject() {
            hideAllTables();
            document.getElementById('projectTable').style.display = 'block';
        }

        function showNewProject() {
            hideAllTables();
            document.getElementById('newProjectTable').style.display = 'block';
        }
    </script> --}}
@endsection
