<x-layout>
    <div class="row pt-4">
        <div class="col-12 col-md-4 mt-2 mt-md-0">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Total Active Orders</h4>
                    <a class="" href="/orders" style="font-size: 1.3rem;">
                        More <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
                <div class="card-body">
                    <h1 class="text-center display-2">{{ $totalActiveOrders }}</h1>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 mt-2 mt-md-0">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Today's Orders</h4>
                    <a class="" href="/orders" style="font-size: 1.3rem;">
                        More <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
                <div class="card-body">
                    <h1 class="text-center display-2">{{ $totalOrders }}</h1>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 mt-2 mt-md-0">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Today's Sales</h4>
                    <a class="" href="/sales" style="font-size: 1.3rem;">
                        More <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
                <div class="card-body">
                    <h1 class="text-center display-2">{{ $totalSale }}</h1>
                </div>
            </div>
        </div>
        <div class="col-12 mt-2 mt-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Orders & Sales</h4>
                </div>
                <div class="card-body">
                    <canvas id="myChart" style="height: 45vh;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        const orderAndSaleData = @json($orderAndSale);
    </script>

    <script>
        const sideBarMenuName = document.querySelector('.home');
        sideBarMenuName.classList.add('active');

        const ctx = document.getElementById('myChart');

        const months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        const ordersPerMonth = Array(12).fill(0);
        const salesPerMonth = Array(12).fill(0);

        orderAndSaleData.forEach(order => {
            const month = new Date(order.created_at).getMonth();
            ordersPerMonth[month]++;
            salesPerMonth[month] += order.payment;
        });

        const data = {
            labels: months,
            datasets: [{
                    label: 'Orders',
                    data: ordersPerMonth,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgb(255, 99, 132)',
                    borderWidth: 1,
                    borderRadius: 5
                },
                {
                    label: 'Sales',
                    data: salesPerMonth,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgb(54, 162, 235)',
                    borderWidth: 1,
                    borderRadius: 5
                }
            ]
        };

        new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                maintainAspectRatio: false
            }
        });
    </script>
</x-layout>
