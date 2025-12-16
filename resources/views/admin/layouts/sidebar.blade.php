<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h2>ANTS</h2>
        <button id="sidebar-toggle-desktop" class="collapse-btn" aria-label="Collapse sidebar">
            <i class="fa-solid fa-angles-left"></i>
        </button>
    </div>

    <nav class="sidebar-nav" role="navigation">
        <ul>
            <li>
                <a href="#" class="active">
                    <i class="fa-solid fa-gauge"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa-solid fa-users"></i>
                    <span>Users</span>
                </a>
            </li>

            <li class="has-submenu">
                <button class="submenu-toggle" aria-expanded="false">
                    <i class="fa-solid fa-folder-open"></i>
                    <span>Projects</span>
                    <i class="fa-solid fa-chevron-down arrow"></i>
                </button>
                <ul class="submenu">
                    <li><a href="#"><i class="fa-solid fa-list-check"></i> Active Projects</a></li>
                    <li><a href="#"><i class="fa-solid fa-check-circle"></i> Completed</a></li>
                    <li><a href="#"><i class="fa-solid fa-box-archive"></i> Archives</a></li>
                </ul>
            </li>

            <li class="has-submenu">
                <button class="submenu-toggle" aria-expanded="false">
                    <i class="fa-solid fa-chart-bar"></i>
                    <span>Reports</span>
                    <i class="fa-solid fa-chevron-down arrow"></i>
                </button>
                <ul class="submenu">
                    <li><a href="#"><i class="fa-solid fa-money-bill-wave"></i> Sales Report</a></li>
                    <li><a href="#"><i class="fa-solid fa-user-chart"></i> User Analytics</a></li>
                    <li><a href="#"><i class="fa-solid fa-clock-rotate-left"></i> Activity Log</a></li>
                </ul>
            </li>

            <li class="has-submenu">
                <button class="submenu-toggle" aria-expanded="false">
                    <i class="fa-solid fa-gear"></i>
                    <span>Settings</span>
                    <i class="fa-solid fa-chevron-down arrow"></i>
                </button>
                <ul class="submenu">
                    <li><a href="#"><i class="fa-solid fa-user-lock"></i> Security</a></li>
                    <li><a href="#"><i class="fa-solid fa-palette"></i> Appearance</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div class="sidebar-footer">
        <div class="user-footer-box">
            <a href="{{ route('profile.edit') }}">
                <i class="fa-solid fa-circle-user"></i>
                <span>Profile</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>
</aside>

<div id="backdrop" class="backdrop"></div>