<x-layout>
    <div class="row pt-4 g-2">
        <div class="col-12">
            <x-searchbar />
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" id="myTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Fullname</th>
                            <th>Gender</th>
                            <th>Birthdate</th>
                            <th>Age</th>
                            <th>Address</th>
                            <th>Phone#</th>
                            <th>Date Registered</th>
                            <th>Access Rule</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($users as $users)
                            <tr>
                                <th>{{ $counter++ }}</th>
                                <td>{{ $users->fname }} {{ $users->mname }} {{ $users->lname }}</td>
                                <td>{{ $users->gender === 1 ? 'Male' : 'Female' }}</td>
                                <td>
                                    @php
                                        $currentDate = new DateTime();
                                        $date = new DateTime($users->bdate);
                                        $age = $currentDate->diff($date)->y;
                                        echo $date->format('M j, Y');
                                    @endphp
                                </td>
                                <td>{{ $age }}</td>
                                <td>{{ $users->street }} {{ $users->village }} {{ $users->municipality }},
                                    {{ $users->province }}</td>
                                <td>{{ $users->pnumber }}</td>
                                <td>
                                    @php
                                        $date = new DateTime($users->created_at);
                                        echo $date->format('M j, Y');
                                    @endphp
                                </td>
                                <td>{{ $users->user_position === 1 ? 'Admin' : 'Customer' }}</td>
                                <td>{{ $users->status === 1 ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalAccessRule"
                                            onclick="edit({{ $users->id }}, {{ $users->status }}, {{ $users->user_position }}, '{{ $users->access_rule }}')">
                                            <i class="fa fa-list-check"></i>
                                            Access Rule
                                        </button>
                                        <button class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalStatus"
                                            onclick="edit({{ $users->id }}, {{ $users->status }}, {{ $users->user_position }}, '{{ $users->access_rule }}')">
                                            @if ($users->status === 1)
                                                <i class="fa fa-times-circle"></i>
                                                Inactive
                                            @else
                                                <i class="fa fa-check-circle"></i>
                                                Active
                                            @endif
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-modal-sm id="modalAccessRule">
        <form id="formAccessRule">
            <div class="modal-header bg-primary">
                <h4 class="text-white">
                    Access Rule
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="admin">
                            <label class="form-check-label" for="admin">
                                Admin
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="2" id="customer">
                            <label class="form-check-label" for="customer">
                                Customer
                            </label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="cakes">
                            <label class="form-check-label" for="cakes">
                                Cakes
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="2" id="ordes">
                            <label class="form-check-label" for="ordes">
                                Ordes
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="3" id="sales">
                            <label class="form-check-label" for="sales">
                                Sales
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="4" id="users">
                            <label class="form-check-label" for="users">
                                Users
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </x-modal-sm>

    <x-modal-sm id="modalStatus">
        <form id="formStatus">
            <div class="modal-header bg-danger">
                <h4 class="text-white">
                    User Status
                </h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to update this user status?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </x-modal-sm>

    <script>
        const sideBarMenuName = document.querySelector('.users');
        sideBarMenuName.classList.add('active');

        const accessRuleModal = document.querySelector('#modalAccessRule');
        const formAccessRule = document.querySelector('#formAccessRule');
        const admin = document.querySelector('#admin');
        const customer = document.querySelector('#customer');
        const cakes = document.querySelector('#cakes');
        const ordes = document.querySelector('#ordes');
        const sales = document.querySelector('#sales');
        const users = document.querySelector('#users');

        const statusModal = document.querySelector('#modalStatus');
        const formStatus = document.querySelector('#formStatus');

        let userId = 0;
        let userStatus = 0;
        const ADMIN = 1;
        const CUSTOMER = 2;

        const setCheckBoxDisabled = () => {
            cakes.setAttribute('disabled', true);
            ordes.setAttribute('disabled', true);
            sales.setAttribute('disabled', true);
            users.setAttribute('disabled', true);
            cakes.checked = false;
            ordes.checked = false;
            sales.checked = false;
            users.checked = false;
        }

        const removeCheckBoxDisabled = () => {
            cakes.removeAttribute('disabled');
            ordes.removeAttribute('disabled');
            sales.removeAttribute('disabled');
            users.removeAttribute('disabled');
        }

        const setAccessRule = (access_rule) => {
            const accessRule = access_rule.split(",");

            let i = 0;
            while (i < accessRule.length) {

                switch (accessRule[i]) {
                    case "1":
                        cakes.checked = true;
                        break;
                    case "2":
                        ordes.checked = true;
                        break;
                    case "3":
                        sales.checked = true;
                        break;
                    case "4":
                        users.checked = true;
                        break;
                }

                i++;
            }
        }

        const addEvent = () => {
            admin.addEventListener('change', () => {
                if (admin.checked) {
                    customer.checked = false;
                    removeCheckBoxDisabled();
                } else {
                    customer.checked = true;
                    setCheckBoxDisabled();
                }
            });
            customer.addEventListener('change', () => {
                if (customer.checked) {
                    admin.checked = false;
                    setCheckBoxDisabled();
                } else {
                    admin.checked = true;
                    removeCheckBoxDisabled();
                }
            });
            formAccessRule.addEventListener('submit', (e) => {
                e.preventDefault();

                let user_position = 0;
                let access_rule = [];

                if (admin.checked) {
                    user_position = ADMIN;
                } else {
                    user_position = CUSTOMER;
                }

                if (cakes.checked) {
                    access_rule.push(1);
                }

                if (ordes.checked) {
                    access_rule.push(2);
                }

                if (sales.checked) {
                    access_rule.push(3);
                }

                if (users.checked) {
                    access_rule.push(4);
                }

                const path = "/users/updateAccessRule/" + userId;
                const formData = new FormData();
                formData.append("user_position", user_position);
                formData.append("access_rule", access_rule);
                postData(formData, path);
            });
            formStatus.addEventListener('submit', (e) => {
                e.preventDefault();

                const path = "/users/updateStatus/" + userId;
                const formData = new FormData();
                formData.append("status", userStatus);
                postData(formData, path);
            });
        }

        const edit = (id, status, user_position, access_rule) => {
            userId = id;
            userStatus = status;

            if (user_position === 1) {
                customer.checked = false;
                admin.checked = true;
                removeCheckBoxDisabled();

                if (typeof access_rule !== 'undefined' && access_rule !== null) {
                    setAccessRule(access_rule);
                }

            } else {
                admin.checked = false;
                customer.checked = true;
                setCheckBoxDisabled();
            }

        }

        const clearInputFields = () => {}

        init();

        function init() {
            addEvent();
            document.addEventListener('DOMContentLoaded', () => initSearch());
        }
    </script>
</x-layout>
