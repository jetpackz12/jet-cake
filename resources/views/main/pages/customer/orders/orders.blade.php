<x-layout>
    <div class="row mt-2 gap-2 searchbar-and-table">
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
                            <th>Orders</th>
                            <th>Payment</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($orders as $order)
                            <tr>
                                <th>{{ $counter++ }}</th>
                                <td>
                                    @php
                                        $image_path = 'images/cakes/' . $order->image_path;
                                    @endphp
                                    <img src="{{ asset($image_path) }}" alt="Cake image" style="height: 60px;">
                                </td>
                                <td><b>{{ $order->cakename }}</b></td>
                                <td>{{ $order->orders }}</td>
                                <td>{{ $order->payment }}</td>
                                <td>
                                    @php
                                        $date = strtotime($order->order_date);
                                        $formatted_date = date('F j, Y', $date);
                                        echo $formatted_date;
                                    @endphp
                                </td>
                                <td>{{ $order->order_status === 1 ? 'Active' : ($order->order_status === 2 ? 'Preparing' : 'Done') }}
                                </td>
                                <td>
                                    @if ($order->order_status === 1)
                                        <div class="d-flex justify-content-center gap-2">
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit"
                                                onclick="edit({{ $order->order_id }}, {{ $order->price }})">
                                                <i class="fa fa-edit"></i>
                                                Edit
                                            </button>
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#modalDelete"
                                                onclick="edit({{ $order->order_id }}, {{ $order->price }})">
                                                <i class="fa fa-trash"></i>
                                                Delete
                                            </button>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-modal-md id="modalEdit">
        <form id="formEdit">
            <div class="modal-header bg-success">
                <h4 class="text-white">
                    <i class="fa fa-cart-arrow-down"></i>
                    Edit Order
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <label for="order">Cake Orders:</label>
                        <div class="input-group mt-2">
                            <button class="btn btn-danger" type="button" id="minus"><i
                                    class="fa fa-minus"></i></button>
                            <input class="form-control shadow-none" type="number" name="order" id="order"
                                placeholder="0" readonly>
                            <button class="btn btn-primary" type="button" id="add"><i
                                    class="fa fa-plus"></i></button>
                        </div>
                        <div class="form-group">
                            <label for="payment">Payment:</label>
                            <input class="form-control" type="text" name="payment" id="payment" placeholder="0"
                                disabled required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </x-modal-md>

    <x-modal-sm id="modalDelete">
        <form id="formDelete">
            <div class="modal-header bg-danger">
                <h4 class="text-white">
                    Delete Order
                </h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this order?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
        </form>
    </x-modal-sm>

    <script>
        const sideBarMenuName = document.querySelector('.cus-orders');
        sideBarMenuName.classList.add('active');

        const editModal = document.querySelector('#modalEdit');
        const formEdit = document.querySelector('#formEdit');
        const minus = document.querySelector('#minus');
        const add = document.querySelector('#add');
        const order = document.querySelector('#order');
        const payment = document.querySelector('#payment');

        const deleteModal = document.querySelector('#modalDelete');
        const formDelete = document.querySelector('#formDelete');

        let orderId = 0;
        let cakeId = 0;
        let cakePrice = 0;

        const addEvent = () => {
            // Add Modal
            minus.addEventListener('click', () => {
                if (order.value < 1) {
                    Toast.fire({
                        icon: 'warning',
                        title: "<p>Cannot subtract cakes. Please place an order first.</p>"
                    });

                    return;

                }
                order.value -= 1;
                payment.value -= cakePrice;
            });

            add.addEventListener('click', () => {
                order.value == "" ? order.value = 1 : order.value = parseInt(order.value) + 1;
                payment.value = cakePrice * order.value;
            });

            editModal.addEventListener('hidden.bs.modal', event => {
                clearInputFields();
            });

            formEdit.addEventListener('submit', (e) => {
                e.preventDefault();

                if (order.value < 1) {
                    Toast.fire({
                        icon: 'warning',
                        title: "<p>Please place an order first.</p>"
                    });

                    return;
                }

                const path = "/customer/orders/update/" + orderId;
                const formData = new FormData();
                formData.append("cakeId", cakeId);
                formData.append("cakePrice", cakePrice);
                formData.append("order", order.value);
                postData(formData, path);

            });

            formDelete.addEventListener('submit', (e) => {
                e.preventDefault();

                if (orderId === 0) {
                    Toast.fire({
                        icon: 'warning',
                        title: "<p>No order ID, Please contact administrator.</p>"
                    });

                    return;
                }

                const path = "/customer/orders/destroy/" + orderId;

                deleteData(path);

            });
        }

        const edit = (id, price) => {
            const path = "/customer/orders/edit/" + id;
            const xhttp = new XMLHttpRequest();
            xhttp.open("GET", path);
            xhttp.onload = function() {
                if (this.status == 200) {
                    const response = JSON.parse(this.responseText);

                    orderId = response['id'];
                    order.value = response['orders'];
                    payment.value = response['payment'];
                    cakePrice = price;
                    cakeId = response['cake_id'];
                }
            }

            xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
            xhttp.send();
        }

        const clearInputFields = () => {}

        init();

        function init() {
            addEvent();
            document.addEventListener('DOMContentLoaded', () => initSearch());
        }
    </script>
</x-layout>
