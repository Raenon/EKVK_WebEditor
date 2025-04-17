@extends('layouts.master')

@section('content')
    <span class="sidebar-toggle" onclick="openSidebar()">
        <i class="sidebar-icon bi bi-filter-left"></i>
    </span>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h1 class="sidebar-title"></h1>
            <i class="sidebar-close bi bi-x" onclick="openSidebar()"></i>
        </div>

        <div class="sidebar-divider"></div>

        <div class="sidebar-search">
            <i class="bi bi-search text-sm"></i>
            <input type="text" placeholder="Search" class="sidebar-search-input" />
        </div>

        <div class="sidebar-link">
            <i class="bi bi-house-door-fill"></i>
            <span class="sidebar-link-text">Home</span>
        </div>

        <div class="sidebar-link">
            <i class="bi bi-bookmark-fill"></i>
            <span class="sidebar-link-text">Bookmark</span>
        </div>

        <div class="sidebar-divider"></div>

        <div class="sidebar-dropdown" onclick="toggleDropdown()">
            <div style="display: flex; align-items: center;">
                <i class="bi bi-chat-left-text-fill"></i>
                <span class="sidebar-link-text">Chatbox</span>
            </div>
            <span id="arrow" class="bi bi-chevron-down"
                style="transform: rotate(180deg); transition: transform 0.3s;"></span>
        </div>

        <div class="submenu hidden" id="submenu">
            <h1 class="submenu-item">Social</h1>
            <h1 class="submenu-item">Personal</h1>
            <h1 class="submenu-item">Friends</h1>
        </div>

        <div class="sidebar-link">
            <i class="bi bi-box-arrow-in-right"></i>
            <span class="sidebar-link-text">Logout</span>
        </div>
    </div>

    <script>
        function openSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hidden');
        }

        function toggleDropdown() {
            const submenu = document.getElementById('submenu');
            const arrow = document.getElementById('arrow');
            submenu.classList.toggle('hidden');
            arrow.style.transform = submenu.classList.contains('hidden') ? 'rotate(180deg)' : 'rotate(0deg)';
        }
    </script>
@endsection