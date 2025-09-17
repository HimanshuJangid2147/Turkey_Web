<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top shadow-sm">
    <div class="container-fluid">
        {{-- Toggle for the desktop sidebar collapse --}}
        <button class="btn btn-outline-light me-3 d-none d-lg-block" id="sidebarToggle" aria-label="Toggle sidebar">
            <i class="bi bi-list"></i>
        </button>

        {{-- Dropdown Toggle for Mobile Sidebar Menu --}}
        <div class="dropdown me-2 d-lg-none">
            <a class="nav-link text-white dropdown-toggle" href="#" id="mobileSidebarMenuToggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Menu">
                Menu
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="mobileSidebarMenuToggle">
                <li>
                    <a class="dropdown-item" href="#" title="Dashboard">
                        <i class="bi bi-speedometer2 me-2"></i>Dashboard
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#" title="Users">
                        <i class="bi bi-people me-2"></i>Users
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#" title="Products">
                        <i class="bi bi-box me-2"></i>Products
                    </a>
                </li>
            </ul>
        </div>

        <a class="navbar-brand fs-5" href="#">Admin Panel</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="d-flex ms-auto">
                <a class="nav-link text-white me-2" href="#">Profile</a>
                <a class="nav-link text-white" href="#">Sign out</a>
            </div>
        </div>
    </div>
</nav>
