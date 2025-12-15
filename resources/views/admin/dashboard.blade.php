<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --sidebar-bg: #1f3045;
            --sidebar-hover: #2c415b;
            --accent-color: #00bcd4;
            --text-main: #e0f7fa;
            --text-dim: #b3e5fc;
            --topbar-bg: #ffffff;
            --body-bg: #f3f6f9;
            --sidebar-width: 260px;
            --sidebar-collapsed-width: 80px;
            --topbar-height: 60px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif, system-ui;
        }

        body {
            background-color: var(--body-bg);
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Scrollbar */
        .sidebar-nav::-webkit-scrollbar {
            width: 8px;
        }

        .sidebar-nav::-webkit-scrollbar-track {
            background: #253a51;
        }

        .sidebar-nav::-webkit-scrollbar-thumb {
            background-color: #4a6584;
            border-radius: 4px;
            border: 2px solid #253a51;
        }

        /* --- Sidebar Default (Desktop Open) --- */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--sidebar-bg);
            color: var(--text-main);
            display: flex;
            flex-direction: column;
            transition: width 0.3s ease, left 0.3s ease;
            position: fixed;
            height: 100%;
            z-index: 1000;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            left: 0;
        }

        /* --- Collapsed State Styles (Desktop) --- */
        .sidebar.collapsed {
            width: var(--sidebar-collapsed-width);
        }

        /* Hide text when collapsed */
        .sidebar.collapsed .sidebar-header h2,
        .sidebar.collapsed .sidebar-nav span,
        .sidebar.collapsed .sidebar-footer span,
        .sidebar.collapsed .arrow {
            display: none;
        }

        .sidebar.collapsed .sidebar-nav a,
        .sidebar.collapsed .submenu-toggle {
            justify-content: center;
            padding: 12px 0;
        }

        .sidebar.collapsed .sidebar-nav a i,
        .sidebar.collapsed .submenu-toggle i {
            margin-right: 0;
        }

        /* Collapsed Submenu Hover (Desktop only) */
        .sidebar.collapsed .submenu {
            position: absolute;
            left: var(--sidebar-collapsed-width);
            top: auto;
            min-width: 200px;
            z-index: 1001;
            padding: 0;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
            border-radius: 0 8px 8px 0;
            display: none;
        }

        .sidebar.collapsed .has-submenu:hover .submenu {
            display: block;
        }

        .sidebar.collapsed .submenu a {
            padding: 10px 15px;
        }


        /* Header and Collapse Button */
        .sidebar-header {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--accent-color);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .collapse-btn {
            background: none;
            border: none;
            color: var(--text-dim);
            font-size: 1.1rem;
            cursor: pointer;
            transition: 0.3s;
        }

        .collapse-btn:hover {
            color: var(--accent-color);
        }

        /* Position collapse button when collapsed */
        .sidebar.collapsed .sidebar-header {
            justify-content: center;
        }


        /* Navigation */
        .sidebar-nav {
            flex-grow: 1;
            padding: 10px 0;
            overflow-y: auto;
        }

        .sidebar-nav ul {
            list-style: none;
        }

        .sidebar-nav a,
        .submenu-toggle {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: var(--text-dim);
            text-decoration: none;
            width: 100%;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 0.95rem;
            text-align: left;
            transition: 0.2s;
        }

        .sidebar-nav a i,
        .submenu-toggle i {
            width: 25px;
            margin-right: 10px;
            font-size: 1.1rem;
        }

        .sidebar-nav a:hover,
        .submenu-toggle:hover,
        .sidebar-nav a.active,
        .has-submenu.open>.submenu-toggle {
            background-color: var(--sidebar-hover);
            color: white;
        }

        .sidebar-nav a.active {
            border-left: 4px solid var(--accent-color);
            padding-left: 16px;
        }

        /* Submenu */
        .submenu {
            display: none;
            background-color: #1a2a3a;
            padding: 5px 0;
            transition: max-height 0.3s ease, opacity 0.3s ease;
        }

        .submenu a {
            padding-left: 55px;
            font-size: 0.85rem;
        }

        .submenu a:hover {
            color: var(--accent-color);
            background-color: #21354b;
        }

        .has-submenu.open .submenu {
            display: block;
        }

        .arrow {
            margin-left: auto;
            font-size: 0.7rem;
            transition: transform 0.3s;
        }

        .has-submenu.open .arrow {
            transform: rotate(180deg);
            color: var(--accent-color);
        }

        /* Footer */
        .sidebar-footer {
            padding: 15px;
            background-color: #1a2a3a;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar.collapsed .sidebar-footer {
            padding: 15px 0;
        }

        .user-footer-box {
            display: flex;
            flex-direction: column;
            gap: 5px;
            padding-top: 5px;
        }

        .user-footer-box a {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding: 10px 15px;
            border-radius: 6px;
            transition: 0.2s;
            color: var(--text-dim);
            text-decoration: none;
            font-size: 0.95rem;
        }

        .sidebar.collapsed .user-footer-box a {
            justify-content: center;
        }

        .user-footer-box a i {
            width: 25px;
            margin-right: 10px;
            font-size: 1.1rem;
        }

        .sidebar.collapsed .user-footer-box a i {
            margin-right: 0;
        }

        .user-footer-box a:hover {
            background-color: var(--sidebar-hover);
            color: white;
        }

        .logout {
            color: #ff6e6e !important;
        }

        .logout:hover {
            background-color: #3f1a1a !important;
            color: white !important;
        }

        /* Backdrop for mobile */
        .backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: 900;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .sidebar.active+.backdrop {
            opacity: 1;
            visibility: visible;
        }

        /* --- Main Content (Desktop) --- */
        .main-content {
            flex-grow: 1;
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            transition: margin-left 0.3s, width 0.3s;
        }

        .sidebar.collapsed~.main-content {
            margin-left: var(--sidebar-collapsed-width);
            width: calc(100% - var(--sidebar-collapsed-width));
        }

        /* Topbar */
        .topbar {
            height: var(--topbar-height);
            background: var(--topbar-bg);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 500;
        }

        .menu-toggle {
            display: none;
            font-size: 1.5rem;
            color: #334155;
            background: none;
            border: none;
            cursor: pointer;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 0.9rem;
            font-weight: 500;
            color: #334155;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid var(--accent-color);
        }

        /* Content */
        .content-body {
            padding: 30px;
        }

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 25px;
            margin-top: 25px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            color: #334155;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .card i {
            font-size: 2rem;
            margin-bottom: 10px;
            color: var(--accent-color);
        }

        .analytics-box {
            background: white;
            padding: 25px;
            border-radius: 10px;
            margin-top: 30px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        /* --- Responsive (Mobile View) --- */
        @media (max-width: 768px) {
            .sidebar {
                left: -100%;
                /* Hide sidebar off-screen */
                width: var(--sidebar-width);
                /* Full width on mobile when open */
            }

            .sidebar.active {
                left: 0;
            }

            /* Ensure main content is full width and has zero margin on mobile */
            .main-content {
                margin-left: 0;
                width: 100%;
            }

            /* Mobile: Disable desktop collapse styles completely */
            .sidebar.collapsed {
                width: var(--sidebar-width);
            }

            .sidebar.collapsed~.main-content {
                margin-left: 0;
                width: 100%;
            }

            .sidebar.collapsed .collapse-btn {
                display: flex;
                /* Still show the button to collapse the desktop view */
            }

            /* Mobile specific elements */
            .menu-toggle {
                display: block;
            }

            /* Make sure all text/footer is visible on mobile when active */
            .sidebar.active .sidebar-header h2,
            .sidebar.active .sidebar-nav span,
            .sidebar.active .sidebar-footer span,
            .sidebar.active .arrow {
                display: inline-block;
            }

            .collapse-btn {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="dashboard-container">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h2>ProAdmin</h2>
                <button id="sidebar-toggle-desktop" class="collapse-btn" aria-label="Collapse sidebar"><i
                        class="fa-solid fa-angles-left"></i></button>
            </div>

            <nav class="sidebar-nav" role="navigation">
                <ul>
                    <li><a href="#" class="active"><i class="fa-solid fa-gauge"></i> <span>Dashboard</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-users"></i> <span>Users</span></a></li>

                    <li class="has-submenu">
                        <button class="submenu-toggle" aria-expanded="false"><i class="fa-solid fa-folder-open"></i>
                            <span>Projects</span> <i class="fa-solid fa-chevron-down arrow"></i></button>
                        <ul class="submenu">
                            <li><a href="#"><i class="fa-solid fa-list-check"></i> Active Projects</a></li>
                            <li><a href="#"><i class="fa-solid fa-check-circle"></i> Completed</a></li>
                            <li><a href="#"><i class="fa-solid fa-box-archive"></i> Archives</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <button class="submenu-toggle" aria-expanded="false"><i class="fa-solid fa-chart-bar"></i>
                            <span>Reports</span> <i class="fa-solid fa-chevron-down arrow"></i></button>
                        <ul class="submenu">
                            <li><a href="#"><i class="fa-solid fa-money-bill-wave"></i> Sales Report</a></li>
                            <li><a href="#"><i class="fa-solid fa-user-chart"></i> User Analytics</a></li>
                            <li><a href="#"><i class="fa-solid fa-clock-rotate-left"></i> Activity Log</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <button class="submenu-toggle" aria-expanded="false"><i class="fa-solid fa-gear"></i>
                            <span>Settings</span> <i class="fa-solid fa-chevron-down arrow"></i></button>
                        <ul class="submenu">
                            <li><a href="#"><i class="fa-solid fa-user-lock"></i> Security</a></li>
                            <li><a href="#"><i class="fa-solid fa-palette"></i> Appearance</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <div class="sidebar-footer">
                <div class="user-footer-box">
                    <a href="#"><i class="fa-solid fa-circle-user"></i> <span>Profile</span></a>
                    <a href="#" class="logout"><i class="fa-solid fa-right-from-bracket"></i> <span>Logout</span></a>
                </div>
            </div>
        </aside>

        <div id="backdrop" class="backdrop"></div>

        <main class="main-content">
            <header class="topbar">
                <button id="menu-toggle" class="menu-toggle" aria-label="Toggle menu"><i
                        class="fa-solid fa-bars"></i></button>
                <div class="user-info">
                    <span>Welcome, <strong>John Doe</strong></span>
                    <img src="https://via.placeholder.com/40/00bcd4/ffffff?text=JD" alt="User Avatar" class="avatar">
                </div>
            </header>

            <section class="content-body">
                <h1>Dashboard Overview</h1>
                <div class="cards-grid">
                    <div class="card"><i class="fa-solid fa-users"></i><br>Total Users <br> <strong>1,250</strong></div>
                    <div class="card"><i class="fa-solid fa-dollar-sign"></i><br>Revenue <br> <strong>$45,200</strong>
                    </div>
                    <div class="card"><i class="fa-solid fa-list-check"></i><br>Active Tasks <br> <strong>12</strong>
                    </div>
                    <div class="card"><i class="fa-solid fa-headset"></i><br>Support Tickets <br> <strong>4</strong>
                    </div>
                </div>

                <div class="analytics-box">
                    <h3>Detailed Analytics</h3>
                    <p style="margin-top: 15px; color: #667788;">This is where charts, data tables, and complex
                        dashboard widgets would be placed.</p>
                </div>
            </section>
        </main>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const desktopToggle = document.getElementById('sidebar-toggle-desktop');
        const menuToggle = document.getElementById('menu-toggle');
        const backdrop = document.getElementById('backdrop');

        function isMobile() {
            return window.innerWidth <= 768;
        }

        // 1. Mobile toggle (used for showing/hiding on small screens)
        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            if (!sidebar.classList.contains('active')) {
                // Close submenus when sidebar is closed
                document.querySelectorAll('.has-submenu').forEach(el => el.classList.remove('open'));
            }
        });

        // Close sidebar on backdrop click (mobile)
        backdrop.addEventListener('click', () => {
            sidebar.classList.remove('active');
        });

        // 2. Desktop toggle (used for collapsing/expanding on large screens)
        desktopToggle.addEventListener('click', () => {
            // Only allow desktop collapse on large screens
            if (isMobile()) return;

            // Ensure mobile 'active' class is off if we start collapsing on desktop
            sidebar.classList.remove('active');

            sidebar.classList.toggle('collapsed');

            // Toggle icon direction
            const icon = desktopToggle.querySelector('i');
            icon.classList.toggle('fa-angles-left');
            icon.classList.toggle('fa-angles-right');
        });

        // 3. Submenu toggle (Accordion)
        document.querySelectorAll('.submenu-toggle').forEach(toggle => {
            toggle.addEventListener('click', () => {
                const parent = toggle.parentElement;

                // Prevent click interaction if on desktop and collapsed (rely on CSS hover)
                // OR if on mobile, prevent interaction unless the sidebar is explicitly active
                if (isMobile() && !sidebar.classList.contains('active')) return;
                if (!isMobile() && sidebar.classList.contains('collapsed')) return;

                // Close all other open submenus
                document.querySelectorAll('.has-submenu.open').forEach(openParent => {
                    if (openParent !== parent) openParent.classList.remove('open');
                });

                // Toggle the clicked submenu
                parent.classList.toggle('open');
                toggle.setAttribute('aria-expanded', parent.classList.contains('open'));
            });
        });

        // 4. Reset sidebar state on window resize
        window.addEventListener('resize', () => {
            // If resizing into mobile view:
            if (isMobile()) {
                // Force desktop collapse class off, ensuring the mobile state (left: -100%) is clean
                sidebar.classList.remove('collapsed');
                // Reset the desktop collapse icon to its default state
                desktopToggle.querySelector('i').classList.add('fa-angles-left');
                desktopToggle.querySelector('i').classList.remove('fa-angles-right');
                // Collapse the menu on mobile
                document.querySelectorAll('.has-submenu').forEach(el => el.classList.remove('open'));

                // If resizing into desktop view:
            } else {
                // Force mobile active class off, ensuring the sidebar is properly displayed (left: 0)
                sidebar.classList.remove('active');
            }
        });
    </script>

</body>

</html>