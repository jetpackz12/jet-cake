<nav class="navbar" style="background: #1205A5;">
    <div class="container-fluid">
        <span class="navbar-brand d-none d-lg-block"></span>
        <button class="navbar-toggler d-md-none bg-primary shadow-none" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h2 class="text-white me-2 me-md-0 ms-md-5">JetCake's</h2>
        <div class="d-none d-md-block me-3">
            <button class="btn btn-outline-primary text-white" data-bs-toggle="modal" data-bs-target="#modalSm">
                <i class="fa fa-door-open"></i>
                logout
            </button>
        </div>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel"
            style="background: #28DDBC;">
            <div class="offcanvas-header">
                <h2 class="offcanvas-title text-white" id="offcanvasNavbarLabel">JetCake's</h2>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="dropdown-menu position-static d-grid gap-2 p-2 border-0" style="background: #28DDBC;">
                    <x-sidebar-menu>
                        <a class="dropdown-item h-100 rounded-2 d-flex align-items-center justify-content-center active"
                            href="#" style="font-size: 1.2rem">
                            <i class="fa fa-home me-2"></i>
                            Home
                        </a>
                    </x-sidebar-menu>
                    <x-sidebar-menu>
                        <a class="dropdown-item h-100 rounded-2 d-flex align-items-center justify-content-center"
                            href="#" style="font-size: 1.2rem">
                            <i class="fa fa-cake me-2"></i>
                            Cakes
                        </a>
                    </x-sidebar-menu>
                    <x-sidebar-menu>
                        <a class="dropdown-item h-100 rounded-2 d-flex align-items-center justify-content-center"
                            href="#" style="font-size: 1.2rem">
                            <i class="fa fa-cart-arrow-down me-2"></i>
                            Orders
                        </a>
                    </x-sidebar-menu>
                    <x-sidebar-menu>
                        <a class="dropdown-item h-100 rounded-2 d-flex align-items-center justify-content-center"
                            href="#" style="font-size: 1.2rem">
                            <i class="fa fa-chart-column me-2"></i>
                            Sales
                        </a>
                    </x-sidebar-menu>
                    <x-sidebar-menu>
                        <a class="dropdown-item h-100 rounded-2 d-flex align-items-center justify-content-center"
                            href="#" style="font-size: 1.2rem">
                            <i class="fa fa-users me-2"></i>
                            Users
                        </a>
                    </x-sidebar-menu>
                    <x-sidebar-menu>
                        <button class="btn btn-secondary shadow-none border-0 h-100 w-100 text-white"
                            style="font-size: 1.2rem" data-bs-toggle="modal" data-bs-target="#modalSm">
                            <i class="fa fa-door-open"></i>
                            logout
                        </button>
                    </x-sidebar-menu>
                </ul>
            </div>
        </div>

    </div>
</nav>
