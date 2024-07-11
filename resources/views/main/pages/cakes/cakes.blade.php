<x-layout>
    <div class="row pt-4 g-2">
        <div class="d-block d-md-none col-12">
            <button class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#modalAdd">
                <i class="fa fa-plus-circle"></i>
                Add cake
            </button>
        </div>
        <div class="col-12 col-md-10">
            <x-searchbar />
        </div>
        <div class="d-none d-md-block col-md-2">
            <button class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#modalAdd">
                <i class="fa fa-plus-circle"></i>
                Add cake
            </button>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle text-center" id="myTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Images</th>
                            <th>Cakenames</th>
                            <th>Flavor</th>
                            <th>Price</th>
                            <th>Time to prepared</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($cakes as $cake)
                            <tr>
                                <th>{{ $counter++ }}</th>
                                <td>
                                    @php
                                        $image_path = 'images/cakes/' . $cake->image_path;
                                    @endphp
                                    <img src="{{ asset($image_path) }}" alt="Cake image" style="height: 60px;">
                                </td>
                                <td>{{ $cake->cakename }}</td>
                                <td>{{ $cake->flavor }}</td>
                                <td>{{ $cake->price }}</td>
                                <td>
                                    @php
                                        $hour = $cake->hour < 10 ? '0' . $cake->hour : $cake->hour;
                                        $minute = $cake->minute < 10 ? '0' . $cake->minute : $cake->minute;
                                        echo $hour . ':' . $minute . ':00';
                                    @endphp
                                </td>
                                <td>
                                    {{ $cake->status == 1 ? 'Active' : 'Inactive' }}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit" onclick="edit({{ $cake->id }})">
                                            <i class="fa fa-edit"></i>
                                            Edit
                                        </button>
                                        <button class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#modalStatus" onclick="edit({{ $cake->id }})">
                                            <i class="{{ $cake->status == 1 ? 'fa fa-x' : 'fa fa-check' }}"></i>
                                            {{ $cake->status == 1 ? 'Inactive' : 'Active' }}
                                        </button>
                                        <button class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDelete" onclick="edit({{ $cake->id }})">
                                            <i class="fa fa-trash"></i>
                                            Delete
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

    <x-modal-xl id="modalAdd">
        <form id="formAdd">
            <div class="modal-header bg-success">
                <h4 class="text-white">
                    <i class="fa fa-cake-candles"></i>
                    Add Cake
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cakename">Cakename:</label>
                            <input class="form-control shadow-none border-0 border-bottom border-black rounded-0"
                                type="text" name="cakename" id="cakename" required>
                        </div>
                        <div class="form-group">
                            <label for="subname">Subname:</label>
                            <input class="form-control shadow-none border-0 border-bottom border-black rounded-0"
                                type="text" name="subname" id="subname" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input class="form-control shadow-none border-0 border-bottom border-black rounded-0"
                                type="text" name="description" id="description" required>
                        </div>
                        <div class="form-group">
                            <label for="flavor">Flavor:</label>
                            <input class="form-control shadow-none border-0 border-bottom border-black rounded-0"
                                type="text" name="flavor" id="flavor" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input class="form-control shadow-none border-0 border-bottom border-black rounded-0"
                                type="number" name="price" id="price" required>
                        </div>
                        <label>Time to prepared:</label>
                        <div class="d-flex align-items-center justify-content-start gap-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="hour">
                                <label class="form-check-label" for="hour">
                                    Hour
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="minute">
                                <label class="form-check-label" for="minute">
                                    Minute
                                </label>
                            </div>
                            <input class="form-control shadow-none border-0 border-bottom border-black rounded-0 d-none"
                                type="number" name="numtime" id="numtime" min="1">
                            <div class="d-flex justify-content-between d-none" id="hourMinute">
                                <input class="form-control shadow-none border-0 border-bottom border-black rounded-0"
                                    type="number" name="hourInput" id="hourInput" min="1" placeholder="Hour">
                                :
                                <input class="form-control shadow-none border-0 border-bottom border-black rounded-0"
                                    type="number" name="minuteInput" id="minuteInput" min="1"
                                    placeholder="Minute">
                            </div>
                        </div>
                        <div class="form-group d-none">
                            <input class="form-control shadow-none border-0 border-bottom border-black rounded-0"
                                type="text" name="imagename" id="imagename">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card bg-secondary">
                            <img class="object-fit-contain" src="{{ asset('images/cakeIcon.png') }}" alt="Cake Icon"
                                id="cakeImage" style="width: 100%; height: 35vh;">
                            <div class="card-img-overlay d-flex justify-content-center align-items-center">
                                <label for="formFile" class="form-label" style="font-size: 1.3rem;">
                                    <i class="fa fa-camera-retro"></i>
                                    Select Image
                                </label>
                                <input class="form-control d-none" type="file" id="formFile">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </x-modal-xl>

    <x-modal-xl id="modalEdit">
        <form id="formEdit">
            <div class="modal-header bg-primary">
                <h4 class="text-white">
                    Edit Cake
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="e_cakename">Cakename:</label>
                            <input class="form-control shadow-none border-0 border-bottom border-black rounded-0"
                                type="text" name="e_cakename" id="e_cakename" required>
                        </div>
                        <div class="form-group">
                            <label for="e_subname">Subname:</label>
                            <input class="form-control shadow-none border-0 border-bottom border-black rounded-0"
                                type="text" name="e_subname" id="e_subname" required>
                        </div>
                        <div class="form-group">
                            <label for="e_description">Description:</label>
                            <input class="form-control shadow-none border-0 border-bottom border-black rounded-0"
                                type="text" name="e_description" id="e_description" required>
                        </div>
                        <div class="form-group">
                            <label for="e_flavor">Flavor:</label>
                            <input class="form-control shadow-none border-0 border-bottom border-black rounded-0"
                                type="text" name="e_flavor" id="e_flavor" required>
                        </div>
                        <div class="form-group">
                            <label for="e_price">Price:</label>
                            <input class="form-control shadow-none border-0 border-bottom border-black rounded-0"
                                type="number" name="e_price" id="e_price" required>
                        </div>
                        <label>Time to prepared:</label>
                        <div class="d-flex align-items-center justify-content-start gap-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="e_hour">
                                <label class="form-check-label" for="e_hour">
                                    Hour
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="e_minute">
                                <label class="form-check-label" for="e_minute">
                                    Minute
                                </label>
                            </div>
                            <input
                                class="form-control shadow-none border-0 border-bottom border-black rounded-0 d-none"
                                type="number" name="e_numtime" id="e_numtime" min="1">
                            <div class="d-flex justify-content-between d-none" id="e_hourMinute">
                                <input class="form-control shadow-none border-0 border-bottom border-black rounded-0"
                                    type="number" name="e_hourInput" id="e_hourInput" min="1"
                                    placeholder="Hour">
                                :
                                <input class="form-control shadow-none border-0 border-bottom border-black rounded-0"
                                    type="number" name="e_minuteInput" id="e_minuteInput" min="1"
                                    placeholder="Minute">
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="form-control shadow-none border-0 border-bottom border-black rounded-0"
                                type="text" name="e_imagename" id="e_imagename" hidden>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card bg-secondary">
                            <img class="object-fit-contain" src="{{ asset('images/cakeIcon.png') }}" alt="Cake Icon"
                                id="e_cakeImage" style="width: 100%; height: 35vh;">
                            <div class="card-img-overlay d-flex justify-content-center align-items-center">
                                <label for="e_formFile" class="form-label" style="font-size: 1.3rem;">
                                    <i class="fa fa-camera-retro"></i>
                                    Select Image
                                </label>
                                <input class="form-control d-none" type="file" id="e_formFile">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </x-modal-xl>

    <x-modal-sm id="modalStatus">
        <form id="formStatus">
            <div class="modal-header bg-warning">
                <h4 class="text-white">
                    Edit Cake
                </h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to update the status of this cake?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
        </form>
    </x-modal-sm>

    <x-modal-sm id="modalDelete">
        <form id="formDelete">
            <div class="modal-header bg-danger">
                <h4 class="text-white">
                    Delete Cake
                </h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this cake?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
        </form>
    </x-modal-sm>
    <script>
        const sideBarMenuName = document.querySelector('.cakes');
        sideBarMenuName.classList.add('active');

        const addModal = document.querySelector('#modalAdd');
        const formAdd = document.querySelector('#formAdd');
        const cakename = document.querySelector('#cakename');
        const subname = document.querySelector('#subname');
        const description = document.querySelector('#description');
        const flavor = document.querySelector('#flavor');
        const price = document.querySelector('#price');
        const hour = document.querySelector('#hour');
        const minute = document.querySelector('#minute');
        const numtime = document.querySelector('#numtime');
        const hourMinute = document.querySelector('#hourMinute');
        const formFile = document.querySelector('#formFile');
        const hourInput = document.querySelector('#hourInput');
        const minuteInput = document.querySelector('#minuteInput');
        const cakeImage = document.querySelector('#cakeImage');
        const imagename = document.querySelector('#imagename');

        // Edit Modal
        const editModal = document.querySelector('#modalEdit');
        const formEdit = document.querySelector('#formEdit');
        const e_cakename = document.querySelector('#e_cakename');
        const e_subname = document.querySelector('#e_subname');
        const e_description = document.querySelector('#e_description');
        const e_flavor = document.querySelector('#e_flavor');
        const e_price = document.querySelector('#e_price');
        const e_hour = document.querySelector('#e_hour');
        const e_minute = document.querySelector('#e_minute');
        const e_numtime = document.querySelector('#e_numtime');
        const e_hourMinute = document.querySelector('#e_hourMinute');
        const e_formFile = document.querySelector('#e_formFile');
        const e_hourInput = document.querySelector('#e_hourInput');
        const e_minuteInput = document.querySelector('#e_minuteInput');
        const e_cakeImage = document.querySelector('#e_cakeImage');
        const e_imagename = document.querySelector('#e_imagename');

        // Edit Status Modal
        const editStatusModal = document.querySelector('#modalStatus');
        const formStatus = document.querySelector('#formStatus');

        // Delete Status Modal
        const deleteModal = document.querySelector('#modalDelete');
        const formDelete = document.querySelector('#formDelete');

        let timeChecked = 0;
        let cakeImageSrc = '';
        let cakeId = 0;
        let cakeStatus = 0;

        const addEvent = () => {
            // Add Modal
            hour.addEventListener('change', () => {
                if (hour.checked && minute.checked) {
                    numtime.value = "";
                    numtime.classList.add('d-none');
                    hourMinute.classList.remove('d-none');
                    timeChecked = 3;
                } else if (minute.checked) {

                    hourInput.value = "";
                    minuteInput.value = "";
                    hourMinute.classList.add('d-none');
                    numtime.classList.remove('d-none');
                    numtime.placeholder = "Minute";
                    timeChecked = 2;
                } else if (hour.checked) {

                    hourInput.value = "";
                    minuteInput.value = "";
                    hourMinute.classList.add('d-none');
                    numtime.classList.remove('d-none');
                    numtime.placeholder = "Hour";
                    timeChecked = 1;
                } else {
                    numtime.classList.add('d-none');
                    hourMinute.classList.add('d-none');
                    timeChecked = 0;
                }
            });

            minute.addEventListener('change', () => {
                if (hour.checked && minute.checked) {
                    numtime.value = "";
                    numtime.classList.add('d-none');
                    hourMinute.classList.remove('d-none');
                    timeChecked = 3;
                } else if (minute.checked) {

                    hourInput.value = "";
                    minuteInput.value = "";
                    hourMinute.classList.add('d-none');
                    numtime.classList.remove('d-none');
                    numtime.placeholder = "Minute";
                    timeChecked = 2;
                } else if (hour.checked) {

                    hourInput.value = "";
                    minuteInput.value = "";
                    hourMinute.classList.add('d-none');
                    numtime.classList.remove('d-none');
                    numtime.placeholder = "Hour";
                    timeChecked = 1;
                } else {
                    numtime.classList.add('d-none');
                    hourMinute.classList.add('d-none');
                    timeChecked = 0;
                }
            });

            formFile.addEventListener('change', () => {
                const path = "/cakes/storeImage";
                const formData = new FormData();
                formData.append("cakeimage", formFile.files[0]);

                const xhttp = new XMLHttpRequest();
                xhttp.open("POST", path);
                xhttp.onload = function() {
                    if (this.status == 200) {
                        let response = JSON.parse(this.responseText);

                        imagename.value = response["image_name"];
                        cakeImage.src = response["image"];
                    }
                }

                xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]")
                    .content);
                xhttp.send(formData);
            });

            addModal.addEventListener('hidden.bs.modal', event => {
                clearInputFields();
            });

            formAdd.addEventListener('submit', (e) => {
                e.preventDefault();

                if (formFile.value == "") {
                    Toast.fire({
                        icon: 'warning',
                        title: "<p>No cake image selected, Please select.</p>"
                    });

                    return;
                }

                if (timeChecked < 1) {
                    Toast.fire({
                        icon: 'warning',
                        title: "<p>No selection in time to prepared, Please select.</p>"
                    });
                    return;
                } else if (timeChecked < 3 && numtime.value == "") {
                    Toast.fire({
                        icon: 'warning',
                        title: "<p>No inputted number, Please enter a number.</p>"
                    });
                    return;
                } else if (timeChecked == 3 && hourInput.value == "" || timeChecked == 3 && minuteInput.value ==
                    "") {
                    Toast.fire({
                        icon: 'warning',
                        title: "<p>No inputted number, Please enter a number.</p>"
                    });
                    return;
                }

                const path = "/cakes/store";
                const formData = new FormData();
                formData.append("cakename", cakename.value);
                formData.append("subname", subname.value);
                formData.append("description", description.value);
                formData.append("flavor", flavor.value);
                formData.append("price", price.value);
                formData.append("timeChecked", timeChecked);
                formData.append("imagename", imagename.value);
                formData.append("numtime", numtime.value);
                formData.append("hourInput", hourInput.value);
                formData.append("minuteInput", minuteInput.value);
                postData(formData, path);

            });

            // Edit Modal
            e_hour.addEventListener('change', () => {
                if (e_hour.checked && e_minute.checked) {
                    e_numtime.value = "";
                    e_numtime.classList.add('d-none');
                    e_hourMinute.classList.remove('d-none');
                    timeChecked = 3;
                } else if (e_minute.checked) {
                    e_hourInput.value = "";
                    e_minuteInput.value = "";
                    e_hourMinute.classList.add('d-none');
                    e_numtime.classList.remove('d-none');
                    e_numtime.placeholder = "Minute";
                    timeChecked = 2;
                } else if (e_hour.checked) {
                    e_hourInput.value = "";
                    e_minuteInput.value = "";
                    e_hourMinute.classList.add('d-none');
                    e_numtime.classList.remove('d-none');
                    e_numtime.placeholder = "Hour";
                    timeChecked = 1;
                } else {
                    e_numtime.classList.add('d-none');
                    e_hourMinute.classList.add('d-none');
                    timeChecked = 0;
                }
            });

            e_minute.addEventListener('change', () => {
                if (e_hour.checked && e_minute.checked) {
                    e_numtime.value = "";
                    e_numtime.classList.add('d-none');
                    e_hourMinute.classList.remove('d-none');
                    timeChecked = 3;
                } else if (e_minute.checked) {
                    e_hourInput.value = "";
                    e_minuteInput.value = "";
                    e_hourMinute.classList.add('d-none');
                    e_numtime.classList.remove('d-none');
                    e_numtime.placeholder = "Minute";
                    timeChecked = 2;
                } else if (e_hour.checked) {
                    e_hourInput.value = "";
                    e_minuteInput.value = "";
                    e_hourMinute.classList.add('d-none');
                    e_numtime.classList.remove('d-none');
                    e_numtime.placeholder = "Hour";
                    timeChecked = 1;
                } else {
                    e_numtime.classList.add('d-none');
                    e_hourMinute.classList.add('d-none');
                    timeChecked = 0;
                }
            });

            e_formFile.addEventListener('change', () => {
                const path = "/cakes/storeImage";
                const formData = new FormData();
                formData.append("cakeimage", e_formFile.files[0]);

                const xhttp = new XMLHttpRequest();
                xhttp.open("POST", path);
                xhttp.onload = function() {
                    if (this.status == 200) {
                        let response = JSON.parse(this.responseText);

                        e_imagename.value = response["image_name"];
                        e_cakeImage.src = response["image"];
                    }
                }

                xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]")
                    .content);
                xhttp.send(formData);
            });

            formEdit.addEventListener('submit', (e) => {
                e.preventDefault();

                if (e_imagename.value == "") {
                    Toast.fire({
                        icon: 'warning',
                        title: "<p>No cake image selected, Please select.</p>"
                    });

                    return;
                }

                if (timeChecked < 1) {
                    Toast.fire({
                        icon: 'warning',
                        title: "<p>No selection in time to prepared, Please select.</p>"
                    });
                    return;
                } else if (timeChecked < 3 && e_numtime.value == "") {
                    Toast.fire({
                        icon: 'warning',
                        title: "<p>No inputted number, Please enter a number.</p>"
                    });
                    return;
                } else if (timeChecked == 3 && e_hourInput.value == "" || timeChecked == 3 && e_minuteInput
                    .value == "") {
                    Toast.fire({
                        icon: 'warning',
                        title: "<p>No inputted number, Please enter a number.</p>"
                    });
                    return;
                }

                const path = "/cakes/update/" + cakeId;
                const formData = new FormData();
                formData.append("e_cakename", e_cakename.value);
                formData.append("e_subname", e_subname.value);
                formData.append("e_description", e_description.value);
                formData.append("e_flavor", e_flavor.value);
                formData.append("e_price", e_price.value);
                formData.append("timeChecked", timeChecked);
                formData.append("e_imagename", e_imagename.value);
                formData.append("e_numtime", e_numtime.value);
                formData.append("e_hourInput", e_hourInput.value);
                formData.append("e_minuteInput", e_minuteInput.value);

                postData(formData, path);

            });

            formStatus.addEventListener('submit', (e) => {
                e.preventDefault();

                if (cakeId === 0) {
                    Toast.fire({
                        icon: 'warning',
                        title: "<p>No cake ID, Please contact administrator.</p>"
                    });

                    return;
                }

                const path = "/cakes/updateStatus/" + cakeId;
                const formData = new FormData();
                formData.append("status", cakeStatus);

                postData(formData, path);

            });

            formDelete.addEventListener('submit', (e) => {
                e.preventDefault();

                if (cakeId === 0) {
                    Toast.fire({
                        icon: 'warning',
                        title: "<p>No cake ID, Please contact administrator.</p>"
                    });

                    return;
                }

                const path = "/cakes/destroy/" + cakeId;

                deleteData(path);

            });

        }

        const edit = (id) => {
            const path = "/cakes/edit/" + id;
            const formData = new FormData();
            formData.append("id", id);

            const xhttp = new XMLHttpRequest();
            xhttp.open("GET", path);
            xhttp.onload = function() {
                if (this.status == 200) {
                    const response = JSON.parse(this.responseText);
                    cakeId = response['id'];
                    cakeStatus = response['status'];

                    e_cakename.value = response['cakename'];
                    e_subname.value = response['subname'];
                    e_description.value = response['description'];
                    e_flavor.value = response['flavor'];
                    e_price.value = response['price'];

                    if (response['hour'] > 0 && response['minute'] > 0) {
                        timeChecked = 3;
                        e_hour.checked = true;
                        e_minute.checked = true;
                        e_numtime.classList.add('d-none');
                        e_hourMinute.classList.remove('d-none');
                        e_hourInput.value = response['hour'];
                        e_minuteInput.value = response['minute'];
                    } else if (response['hour'] > 0) {
                        timeChecked = 1;
                        e_hour.checked = true;
                        e_hourMinute.classList.add('d-none');
                        e_numtime.classList.remove('d-none');
                        e_numtime.value = response['hour'];
                    } else if (response['minute'] > 0) {
                        timeChecked = 2;
                        e_minute.checked = true;
                        e_hourMinute.classList.add('d-none');
                        e_numtime.classList.remove('d-none');
                        e_numtime.value = response['minute'];
                    }

                    e_imagename.value = response["image_path"];
                    e_cakeImage.src = "/images/cakes/" + response['image_path'];

                }
            }

            xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
            xhttp.send(formData);
        }

        const clearInputFields = () => {
            cakename.value = "";
            flavor.value = "";
            price.value = "";
            hour.checked = false;
            minute.checked = false;
            numtime.value = "";
            hourInput.value = "";
            minuteInput.value = "";
            imagename.value = "";
            formFile.value = "";
            cakeImage.src = "{{ asset('images/cakeIcon.png') }}";
            hourMinute.classList.add('d-none');
            numtime.classList.add('d-none');
        }

        init();

        function init() {
            addEvent();
            document.addEventListener('DOMContentLoaded', () => initSearch());
        }
    </script>
</x-layout>
