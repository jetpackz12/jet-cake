<x-layout>
    <x-filter />
    <div class="loadingbars d-flex flex-column gap-2 mt-2 w-100 h-75">
        <x-loadingbar class="w-100 rounded-2" style="height: 7%;" />
        <x-loadingbar class="w-50 rounded-2" style="height: 7%;" />
        <x-loadingbar class="w-75 rounded-2" style="height: 7%;" />
        <x-loadingbar class="w-50 rounded-2" style="height: 7%;" />
        <x-loadingbar class="w-25 rounded-2" style="height: 7%;" />
        <x-loadingbar class="w-75 rounded-2" style="height: 7%;" />
        <x-loadingbar class="w-50 rounded-2" style="height: 7%;" />
        <x-loadingbar class="w-25 rounded-2" style="height: 7%;" />
        <x-loadingbar class="w-75 rounded-2" style="height: 7%;" />
        <x-loadingbar class="w-75 rounded-2" style="height: 7%;" />
        <x-loadingbar class="w-50 rounded-2" style="height: 7%;" />
        <x-loadingbar class="w-100 rounded-2" style="height: 7%;" />
    </div>

    <div class="row mt-2 gap-2 gap-md-0 total-orders-sales d-none">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <h1>Total Orders</h1>
                    <h3>10</h3>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <h1>Total Sales</h1>
                    <h3>100,000</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2 gap-2 searchbar-and-table d-none">
        <div class="col-12">
            <x-searchbar />
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" id="myTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Images</th>
                            <th>Cake</th>
                            <th>Customer</th>
                            <th>Adress</th>
                            <th>Phone#</th>
                            <th>Orders</th>
                            <th>Price</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody id="table-data">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        const sideBarMenuName = document.querySelector('.sales');
        sideBarMenuName.classList.add('active');
        const loadingBar = document.querySelector('.loadingbars');
        const searchbarAndTable = document.querySelector('.searchbar-and-table');
        const formFilter = document.querySelector('#formFilter');
        const filterby = document.querySelector('#filterby');
        const fromContainer = document.querySelector('#from-container');
        const toContainer = document.querySelector('#to-container');
        const from = document.querySelector('#from');
        const to = document.querySelector('#to');
        const tableData = document.querySelector('#table-data');

        const formattedDate = (value) => {
            const date = new Date(value);
            const options = {
                year: 'numeric',
                month: 'short',
                day: 'numeric'
            };
            return date.toLocaleDateString('en-US', options);
        }

        const getOrders = () => {
            const path = "/sales/show";
            const formData = new FormData();
            formData.append("filterby", filterby.value);
            formData.append("from", from.value);
            formData.append("to", to.value);

            const xhttp = new XMLHttpRequest();
            xhttp.open("POST", path);
            xhttp.onload = function() {
                if (this.status == 200) {
                    const response = JSON.parse(this.responseText);

                    const responseData = response.orders.map((item) => {
                        return {
                            ...item,
                            created_at: formattedDate(item.created_at)
                        }
                    })

                    let data = "";

                    let i = 0;
                    let counter = 1;
                    while (i < responseData.length) {
                        let status = responseData[i].status === 1 ? 'Active' : (responseData[i].status == 2 ?
                            'Preparing' : 'Done');

                        data += `<tr>
                                    <th>${counter}</th>
                                    <td>
                                        <img src="{{ asset('images/cakes/${responseData[i].image_path}') }}" alt="Cake image" style="height: 60px;">
                                    </td>
                                    <td>${responseData[i].cakename}</td>
                                    <td>${responseData[i].fname} ${responseData[i].mname} ${responseData[i].lname}</td>
                                    <td>${responseData[i].street} ${responseData[i].village} ${responseData[i].municipality}, ${responseData[i].province}</td>
                                    <td>${responseData[i].pnumber}</td>
                                    <td>${responseData[i].orders}</td>
                                    <td>${responseData[i].payment}</td>
                                    <td>${responseData[i].created_at}</td>
                                </tr>`;
                        i++;
                    }

                    tableData.innerHTML = data;

                }

                loadingBar.classList.add('d-none');
                searchbarAndTable.classList.remove('d-none');
            }

            xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]")
                .content);
            xhttp.send(formData);
        }

        const addEvent = () => {
            filterby.addEventListener('change', () => {
                if (filterby.value === "3") {
                    fromContainer.classList.remove('blur');
                    toContainer.classList.remove('blur');
                    from.removeAttribute('disabled');
                    to.removeAttribute('disabled');
                } else {
                    if (!from.hasAttribute('disabled') && !to.hasAttribute('disabled')) {
                        fromContainer.classList.add('blur');
                        toContainer.classList.add('blur');
                        from.setAttribute('disabled', true);
                        to.setAttribute('disabled', true);
                        from.value = '';
                        to.value = '';
                    }
                }

                loadingBar.classList.remove('d-none');
                searchbarAndTable.classList.add('d-none');
            });

            formFilter.addEventListener('submit', (e) => {
                e.preventDefault();
                getOrders();
            });
        }

        init();

        function init() {
            addEvent();
            document.addEventListener('DOMContentLoaded', () => initSearch());
        }
    </script>
</x-layout>
