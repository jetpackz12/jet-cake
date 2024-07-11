<x-layout>
    <div class="row py-3">
        <div class="col-12">
            <form class="input-group mb-3" action="{{ route('cusSearch') }}" method="GET">
                @csrf
                <input type="text" class="form-control shadow-none"
                    placeholder="Search... ( Cakename | Flavor | Description | Price )" id="search" name="search"
                    aria-label="Search... ( Cakename | Flavor | Description | Price )">
                <button class="btn btn-primary input-group-text" type="submit" style="width: 10%;">
                    <i class="fa fa-search"></i>
                </button>
                <a class="btn btn-success input-group-text" href="{{ route('cusCakes') }}" style="width: 10%;">
                    <i class="fa fa-arrows-rotate"></i>
                </a>
            </form>
        </div>
        @foreach ($cakes as $cake)
            <div class="col-12 col-md-6 col-lg-4 pb-2">
                <div class="card border-0" style="height: 28rem">
                    <div class="rounded-top-2"
                        style="height: 50%; background: url({{ asset('images/cakes/' . $cake->image_path) }}) center center no-repeat; background-size: cover;">
                    </div>
                    <div class="card-body bg-white rounded-bottom-2">
                        <h3 class="card-title fw-semibold">{{ $cake->cakename }}</h3>
                        <h5 class="card-subtitle mb-2 fw-light"><i>{{ $cake->subname }}</i></h5>
                        <p class="card-text fs-6 fw-light">{{ $cake->description }}</p>

                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="fs-6 fw-light"><b>Time to prepare: (
                                    {{ $cake->hour }}:{{ $cake->minute === 0 ? '00' : $cake->minute }} )</b></span>
                            <span class="fs-6 fw-light"><b>Price: ( P{{ $cake->price }} )</b></span>
                        </div>

                        <button class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#modalAdd"
                            onclick="cakeOrderId({{ $cake->id }}, {{ $cake->price }})">
                            <i class="fa fa-cart-plus"></i>
                            Order
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if (null !== $cakes->lastPage() && $cakes->lastPage() > 1)
        <div class="d-flex justify-content-center">
            <div class="px-3 pt-3 bg-white rounded-pill">
                {{ $cakes->links() }}
            </div>
        </div>
    @endif

    <x-modal-md id="modalAdd">
        <form id="formAdd">
            <div class="modal-header bg-success">
                <h4 class="text-white">
                    <i class="fa fa-cake-candles"></i>
                    Order Cake
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

    <script>
        const sideBarMenuName = document.querySelector('.cus-cakes');
        sideBarMenuName.classList.add('active');

        const addModal = document.querySelector('#modalAdd');
        const formAdd = document.querySelector('#formAdd');
        const minus = document.querySelector('#minus');
        const add = document.querySelector('#add');
        const order = document.querySelector('#order');
        const payment = document.querySelector('#payment');

        let cakeId = 0;
        let cakeStatus = 0;
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

            addModal.addEventListener('hidden.bs.modal', event => {
                clearInputFields();
            });

            formAdd.addEventListener('submit', (e) => {
                e.preventDefault();

                if (order.value < 1) {
                    Toast.fire({
                        icon: 'warning',
                        title: "<p>Please place an order first.</p>"
                    });

                    return;
                }

                const path = "/customer/orders/store";
                const formData = new FormData();
                formData.append("cakeId", cakeId);
                formData.append("cakePrice", cakePrice);
                formData.append("order", order.value);
                postData(formData, path);

            });
        }

        const cakeOrderId = (id, price) => {
            cakeId = id;
            cakePrice = price;
        }

        const clearInputFields = () => {
            order.value = "";
            payment.value = "";
        }

        init();

        function init() {
            addEvent();
        }
    </script>
</x-layout>
