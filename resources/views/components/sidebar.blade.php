<div class="sidebar border border-right d-none d-md-block col-md-3 col-lg-2 p-0"
    style="background: #28DDBC; height: 100vh;">
    <ul class="dropdown-menu position-static d-grid gap-2 p-2 border-0" style="background: #28DDBC;">
        @php
            $access_rule = explode(',', auth()->user()->access_rule);
        @endphp
        @if (auth()->user()->user_position === 1)
            <x-sidebar-menu>
                <a class="dropdown-item h-100 rounded-2 d-flex align-items-center justify-content-center home"
                    href="/home" style="font-size: 1.2rem">
                    <i class="fa fa-home me-2"></i>
                    Home
                </a>
            </x-sidebar-menu>
            @if (in_array('1', $access_rule))
                <x-sidebar-menu>
                    <a class="dropdown-item h-100 rounded-2 d-flex align-items-center justify-content-center cakes"
                        href="/cakes" style="font-size: 1.2rem">
                        <i class="fa fa-cake me-2"></i>
                        Cakes
                    </a>
                </x-sidebar-menu>
            @endif
            @if (in_array('2', $access_rule))
                <x-sidebar-menu>
                    <a class="dropdown-item h-100 rounded-2 d-flex align-items-center justify-content-center orders"
                        href="/orders" style="font-size: 1.2rem">
                        <i class="fa fa-cart-arrow-down me-2"></i>
                        Orders
                    </a>
                </x-sidebar-menu>
            @endif
            @if (in_array('3', $access_rule))
                <x-sidebar-menu>
                    <a class="dropdown-item h-100 rounded-2 d-flex align-items-center justify-content-center sales"
                        href="/sales" style="font-size: 1.2rem">
                        <i class="fa fa-chart-column me-2"></i>
                        Sales
                    </a>
                </x-sidebar-menu>
            @endif
            @if (in_array('4', $access_rule))
                <x-sidebar-menu>
                    <a class="dropdown-item h-100 rounded-2 d-flex align-items-center justify-content-center users"
                        href="/users" style="font-size: 1.2rem">
                        <i class="fa fa-users me-2"></i>
                        Users
                    </a>
                </x-sidebar-menu>
            @endif
        @else
            <x-sidebar-menu>
                <a class="dropdown-item h-100 rounded-2 d-flex align-items-center justify-content-center cus-cakes"
                    href="/customer/cakes" style="font-size: 1.2rem">
                    <i class="fa fa-cake-candles me-2"></i>
                    Cakes
                </a>
            </x-sidebar-menu>
            <x-sidebar-menu>
                <a class="dropdown-item h-100 rounded-2 d-flex align-items-center justify-content-center cus-orders"
                    href="/customer/orders" style="font-size: 1.2rem">
                    <i class="fa fa-cart-arrow-down me-2"></i>
                    Orders
                </a>
            </x-sidebar-menu>
        @endif

    </ul>
</div>
