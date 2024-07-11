<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>JetCake's</title>
    <link rel="shortcut icon" href="{{ asset('images/mylogo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.4.2-web/fontawesome-free-6.4.2-web/css/all.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <script src="{{ asset('plugins/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <style>
        .blur {
            filter: blur(2px);
            transition: .5s;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
</head>

<body style="background: #85F7E2;">
    @auth
        <x-navbar />
        <div class="container-fluid">
            <div class="row">
                <x-sidebar />
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    {{ $slot }}
                </main>
            </div>
        </div>
        <x-modal-sm id="modalSm">
            <form method="POST" action="/logout">
                @csrf
                <div class="modal-header">
                    <h4>
                        <i class="fa fa-info-circle"></i>
                        Log out
                    </h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to log out?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </x-modal-sm>
    @else
        <main class="d-flex justify-content-center align-items-center" style="height: 100vh">
            {{ $slot }}
        </main>
    @endauth

    <script>
        function postData(formData, path) {
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

                        setTimeout(() => {
                            window.location.reload();
                            window.location.href = response['path'];
                        }, 1500);

                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: "<p class='text-center'>" + response['message'] + "</p>"
                        })
                    }
                }
            }

            xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
            xhttp.send(formData);
        }

        function deleteData(path) {
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

                        setTimeout(() => {
                            window.location.reload();
                            window.location.href = response['path'];
                        }, 1500);

                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: "<p class='text-center'>" + response['message'] + "</p>"
                        })
                    }
                }
            }

            xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
            xhttp.send();
        }

        function initSearch() {
            const searchInput = document.getElementById('search');
            const table = document.getElementById('myTable');
            const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

            searchInput.addEventListener('keyup', function() {
                const filter = searchInput.value.toLowerCase();

                for (let i = 0; i < rows.length; i++) {
                    const cells = rows[i].getElementsByTagName('td');
                    let match = false;
                    for (let j = 0; j < cells.length; j++) {
                        if (cells[j].innerText.toLowerCase().indexOf(filter) > -1) {
                            match = true;
                            break;
                        }
                    }
                    rows[i].style.display = match ? '' : 'none';
                }
            });
        }
    </script>
</body>

</html>
