<x-layout>
    <div class="container-fluid p-2 px-md-5">
        <div class="row gap-3 gap-md-0">
            <div class="col-md-8 d-none d-sm-block">
                <div class="card rounded-2 shadow">
                    <div class="card-body">
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('images/cakeimage.jpg') }}"
                                        class="d-block w-100 object-fit-cover" alt="Cake image" style="height: 550px;">
                                    <div class="carousel-caption opacity-75 bg-dark rounded-2">
                                        <h5 class="fw-semibold">Chocolate Cake</h5>
                                        <h6 class="mb-2 fw-light"><i>Indulge in Pure Chocolate Bliss</i></h6>
                                        <p class="fs-6 fw-light">
                                            Indulge in our rich, velvety Chocolate Cake, layered with smooth chocolate
                                            ganache. A
                                            must-try for chocolate lovers!
                                        </p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('images/cakeimage2.jpg') }}"
                                        class="d-block w-100 object-fit-cover" alt="Cake image" style="height: 550px;">
                                    <div class="carousel-caption opacity-75 bg-dark rounded-2">
                                        <h4 class="fw-semibold">Ube Rose Cake</h4>
                                        <h6 class="mb-2 fw-light"><i>A Floral Twist on a Filipino Favorite</i></h6>
                                        <p class="fs-6 fw-light">
                                            Delight in our Ube Rose Cake, made with vibrant purple yam and delicate rose
                                            essence.
                                            Perfect for special occasions.
                                        </p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('images/cakeimage3.jpg') }}"
                                        class="d-block w-100 object-fit-cover" alt="Cake image" style="height: 550px;">
                                    <div class="carousel-caption opacity-75 bg-dark rounded-2">
                                        <h4 class="fw-semibold">Choco Grapes Cake</h4>
                                        <h6 class="mb-2 fw-light"><i>A Fusion of Decadence and Freshness</i></h6>
                                        <p class="fs-6 fw-light">Enjoy our Choco Grapes Cake, featuring layers of rich
                                            chocolate
                                            cake and juicy grapes, topped with smooth chocolate frosting. A delightful
                                            twist on
                                            tradition!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row gap-3 gap-md-4">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <h1 class="text-center mt-3 mb-5">Date & Time</h1>
                                <div class="d-flex justify-content-center">
                                    <h2 id="date"></h2>
                                </div>
                                <div class="d-flex justify-content-center mb-5">
                                    <h2 id="time"></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <h1 class="text-center">Login</h1>
                                <form id="post">
                                    <div class="mb-2">
                                        <label for="username">Username:</label>
                                        <input type="text"
                                            class="form-control border-0 border-bottom rounded-0 shadow-none"
                                            name="username" id="username" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password">Password:</label>
                                        <input type="password"
                                            class="form-control border-0 border-bottom rounded-0 shadow-none"
                                            name="password" id="password" required>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center gap-3">
                                        <a class="text-success text-decoration-none" href="/registration">Create
                                            Account</a>
                                        <button class="btn btn-primary w-25" type="submit">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        setInterval(() => {
            getCurrentTime();
        }, 1000);

        const getCurrentDate = () => {
            const months = [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec"
            ];

            const currentDate = document.getElementById('date');
            const date = new Date();

            const year = date.getFullYear();
            const month = months[date.getMonth()];
            const day = date.getDate();

            currentDate.innerText = `${month}. ${day}, ${year}`

        }

        const getCurrentTime = () => {
            const currentTime = document.getElementById('time');
            const date = new Date();

            const hours = date.getHours() > 12 ? addZero(date.getHours() - 12) : addZero(date.getHours());
            const minutes = addZero(date.getMinutes());
            const seconds = addZero(date.getSeconds());
            const ampm = date.getHours() < 12 ? 'AM' : 'PM';

            currentTime.innerText = `${hours}:${minutes}:${seconds} ${ampm}`;
        }

        const addZero = (number) => {
            if (number < 10) {
                return number = '0' + number;
            }
            return number;
        }

        const formPos = () => {
            const username = document.querySelector('#username');
            const password = document.querySelector('#password');
            const form = document.querySelector('#post');

            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const path = "/authenticate";
                const formData = new FormData();
                formData.append("username", username.value);
                formData.append("password", password.value);
                username.value = "";
                password.value = "";
                postData(formData, path);
            });

        }

        init();

        function init() {
            getCurrentDate();
            getCurrentTime();
            formPos();
        }
    </script>
</x-layout>
