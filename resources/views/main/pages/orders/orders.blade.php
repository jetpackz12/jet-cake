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
                            <th>Adress</th>
                            <th>Phone#</th>
                            <th>Orders</th>
                            <th>Payment</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="table-data">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-modal-sm id="modalPrepared">
        <form id="formPrepared">
            <div class="modal-header bg-primary">
                <h4 class="text-white">
                    <i class="fa fa-utensils"></i>
                    Order Status
                </h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to update this order status to prepared?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
            </div>
        </form>
    </x-modal-sm>

    <x-modal-sm id="modalDone">
        <form id="formDone">
            <div class="modal-header bg-warning">
                <h4 class="text-white">
                    <i class="fa fa-check-double"></i>
                    Order Status
                </h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to update this order status to done?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
            </div>
        </form>
    </x-modal-sm>

    <x-modal-sm id="modalDelete">
        <form id="formDelete">
            <div class="modal-header bg-danger">
                <h4 class="text-white">
                    <i class="fa fa-trash"></i>
                    Delete Order
                </h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this order?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
            </div>
        </form>
    </x-modal-sm>

    <script>
        const sideBarMenuName = document.querySelector('.orders');
        sideBarMenuName.classList.add('active');
        const filterByInput = document.querySelector('.filterbyInput');
        const loadingBar = document.querySelector('.loadingbars');
        const searchbarAndTable = document.querySelector('.searchbar-and-table');
        const formFilter = document.querySelector('#formFilter');
        const filterby = document.querySelector('#filterby');
        const fromContainer = document.querySelector('#from-container');
        const toContainer = document.querySelector('#to-container');
        const from = document.querySelector('#from');
        const to = document.querySelector('#to');
        const tableData = document.querySelector('#table-data');

        const formPrepared = document.querySelector('#formPrepared');

        const formDone = document.querySelector('#formDone');

        const formDelete = document.querySelector('#formDelete');

        let orderId = 0;
        const ORDERPREPARING = 2;
        const ORDERDONE = 0;

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
            const path = "/orders/show";
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

                        data += `
                            <tr>
                                <th>${counter}</th>
                                <td>
                                    <img src="{{ asset('images/cakes/${responseData[i].image_path}') }}" alt="Cake image" style="height: 60px;">
                                </td>
                                <td>${responseData[i].cakename}</td>
                                <td>${responseData[i].street} ${responseData[i].village} ${responseData[i].municipality}, ${responseData[i].province}</td>
                                <td>${responseData[i].pnumber}</td>
                                <td>${responseData[i].orders}</td>
                                <td>${responseData[i].payment}</td>
                                <td>${responseData[i].created_at}</td>
                                <td>${status}</td>`;

                        switch (responseData[i].status) {
                            case 1:
                                data += `
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPrepared" onclick="edit(${responseData[i].id})">
                                                    <i class="fa fa-utensils"></i>
                                                    Preparing
                                                </button>
                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete" onclick="edit(${responseData[i].id})">
                                                    <i class="fa fa-trash"></i>
                                                    Delete
                                                </button>
                                            </div>
                                        </td>`;
                                break;
                            case 2:
                                data += `
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalDone" onclick="edit(${responseData[i].id})">
                                                    <i class="fa fa-check-double"></i>
                                                    Done
                                                </button>
                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete" onclick="edit(${responseData[i].id})">
                                                    <i class="fa fa-trash"></i>
                                                    Delete
                                                </button>
                                            </div>
                                        </td>`;
                                break;
                            default:
                                data += `<td></td>`;
                        }

                        data += `</tr>`;
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

        const updateStatus = (path, formData) => {
            const xhttp = new XMLHttpRequest();
            xhttp.open("POST", path);
            xhttp.onload = function() {
                if (this.status == 200) {
                    const response = JSON.parse(this.responseText);

                    if (response['response'] == 1) {
                        Toast.fire({
                            icon: 'success',
                            title: "<p class='text-center'>" + response['message'] + "</p>"
                        })
                        getOrders();
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: "<p class='text-center'>" + response['message'] + "</p>"
                        })
                    }
                }
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

            formPrepared.addEventListener('submit', (e) => {
                e.preventDefault();

                const path = "/orders/update/" + orderId;
                const formData = new FormData();
                formData.append("status", ORDERPREPARING);

                updateStatus(path, formData);

            });

            formDone.addEventListener('submit', (e) => {
                e.preventDefault();

                const path = "/orders/update/" + orderId;
                const formData = new FormData();
                formData.append("status", ORDERDONE);

                updateStatus(path, formData);

            });

            formDelete.addEventListener('submit', (e) => {
                e.preventDefault();

                const path = "/orders/destroy/" + orderId;
                const xhttp = new XMLHttpRequest();
                xhttp.open("DELETE", path);
                xhttp.onload = function() {
                    if (this.status == 200) {
                        const response = JSON.parse(this.responseText);

                        if (response['response'] == 1) {
                            Toast.fire({
                                icon: 'success',
                                title: "<p class='text-center'>" + response['message'] + "</p>"
                            })
                            getOrders();
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: "<p class='text-center'>" + response['message'] + "</p>"
                            })
                        }
                    }
                }

                xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]")
                    .content);
                xhttp.send();

            });
        }

        const edit = (id) => {
            orderId = id;
        }

        init();

        function init() {
            addEvent();
            document.addEventListener('DOMContentLoaded', () => initSearch());
        }
    </script>
</x-layout>
