<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="JetCake's - The best cakes for your special occasions.">
    <meta name="keywords" content="cakes, bakery, JetCake's, birthday cakes, custom cakes">
    <title>JetCake's</title>
    <link rel="shortcut icon" href="{{ asset('images/mylogo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.4.2-web/fontawesome-free-6.4.2-web/css/all.min.css') }}">
    <script src="{{ asset('bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js') }}"></script>
</head>

<style>
    header {
        background: url("{{ asset('images/cakeImage2.jpg') }}") center center no-repeat;
        background-size: cover;
        height: 66vh;
        opacity: .85;
    }

    .red {
        border: 1px solid red;
    }

    .animate-arrow {
        animation: upDown 1s infinite;
    }

    @keyframes upDown {
        0% {
            transform: translateY(3px);
        }

        50% {
            transform: translateY(-10px);
        }

        100% {
            transform: translateY(3px);
        }
    }
</style>

<body class="position-relative">
    <header>
        <nav class="d-flex justify-content-between align-items-center py-2 px-3 py-md-3 px-md-5 position-sticky top-0"
            style="background: rgba(0, 0, 0, 0.6); " id="navigation">
            <a class="text-white text-decoration-none d-flex align-items-center gap-2 fs-5 fw-light" href="#">
                <img class="rounded-circle" src="{{ asset('images/mylogo.png') }}" alt="My Logo" style="width: 30px">
                JetCake's
            </a>
            <div class="align-items-center flex-row gap-5 d-none d-md-flex">
                <a class="text-white text-decoration-none fs-5 fw-light" href="#">
                    Home
                </a>
                <a class="text-white text-decoration-none fs-5 fw-light" href="#about">
                    About
                </a>
                <a class="text-white text-decoration-none fs-5 fw-light" href="#cakes">
                    Cakes
                </a>
            </div>
            <div class="d-none d-md-block">
                <a class="btn btn-dark text-white text-decoration-none fs-5 fw-light py-1 px-4 rounded-1"
                    href="{{ url('/login') }}">
                    Order Now
                </a>
            </div>
            <div class="d-block d-md-none">
                <button class="btn btn-dark text-white py-2 px-4" id="OpenMenu">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
        </nav>
        <div class="d-flex justify-content-center align-items-center flex-column h-100">
            <h1 class="display-1 fw-semibold">Cake Shop</h1>
            <span class="fs-3">"Life is what you bake it."</span>
        </div>
    </header>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasNavbarLabel"
        style="background: #FAFAFA">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item text-center">
                    <a class="nav-link fs-5 fw-light" href="#">Home</a>
                </li>
                <li class="nav-item text-center">
                    <a class="nav-link fs-5 fw-light" href="#about">About</a>
                </li>
                <li class="nav-item text-center">
                    <a class="nav-link fs-5 fw-light" href="#cakes">Cakes</a>
                </li>
                <hr>
                <li class="nav-item text-center">
                    <a class="btn btn-dark text-white text-decoration-none fs-5 fw-light py-1 px-4 rounded-1"
                        href="{{ url('/login') }}">
                        Order Now
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <section class="p-2 p-xl-5 d-flex justify-content-center align-items-center"
        style="height: 34vh; background: #FAFAFA">
        <div class="d-block d-md-none">
            <div class="d-flex justify-content-center align-items-center gap-3">
                <i class="fa fa-cake" style="font-size: 1.5rem; color: #4d6d9a;"></i>
                <div>
                    <p class="fs-5 fw-light">
                        "Make every birthday unforgettable with our delicious cakes!".
                    </p>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center gap-3">
                <i class="fa fa-gifts" style="font-size: 1.5rem; color: #4d6d9a;"></i>
                <div>
                    <p class="fs-5 fw-light">
                        "Celebrate life's special moments with a slice of our heavenlycakes!".
                    </p>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center gap-3">
                <i class="fa fa-champagne-glasses" style="font-size: 1.5rem; color: #4d6d9a;"></i>
                <div>
                    <p class="fs-5 fw-light">
                        "Turn any party into a sweet success with our custom cakes!".
                    </p>
                </div>
            </div>
        </div>
        <div class="d-none d-md-block">
            <div class="row px-xl-5 mx-xl-5">
                <div class="col-4">
                    <div class="d-flex justify-content-center align-items-center gap-3">
                        <i class="fa fa-cake" style="font-size: 3rem; color: #4d6d9a;"></i>
                        <div>
                            <h5 class="display-6 fw-semibold">Birth Day</h5>
                            <p class="fs-5 fw-light">"Make every birthday unforgettable with our delicious cakes!".</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="d-flex justify-content-center align-items-center gap-3">
                        <i class="fa fa-gifts" style="font-size: 3rem; color: #4d6d9a;"></i>
                        <div>
                            <h5 class="display-6 fw-semibold">Celebration</h5>
                            <p class="fs-5 fw-light">"Celebrate life's special moments with a slice of our heavenly
                                cakes!".
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="d-flex justify-content-center align-items-center gap-3">
                        <i class="fa fa-champagne-glasses" style="font-size: 3rem; color: #4d6d9a;"></i>
                        <div>
                            <h5 class="display-6 fw-semibold">Party</h5>
                            <p class="fs-5 fw-light">"Turn any party into a sweet success with our custom cakes!".</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="p-2 p-xl-5 d-flex justify-content-center align-items-center" style="height: 100vh;"
        id="about">
        <div class="row">
            <div class="col-12 col-md-6 d-flex align-items-center flex-column ps-md-5 d-xl-none">
                <h1 class="display-6 fw-semibold">Work Shop</h1>

                <div class="d-flex justify-content-center align-items-center flex-column gap-2 d-md-none">
                    <img class="rounded-2 d-block d-sm-none" src="{{ asset('images/work-shop.jpg') }}"
                        alt="Work Shop Image" style="width: 80%; height: 250px">
                    <img class="rounded-2 d-block d-sm-none" src="{{ asset('images/work-shop-2.jpg') }}"
                        alt="Work Shop Image" style="width: 80%; height: 250px">
                    <img class="rounded-2 d-none d-sm-block" src="{{ asset('images/work-shop.jpg') }}"
                        alt="Work Shop Image" style="width: 100%; height: 300px">
                    <img class="rounded-2 d-none d-sm-block" src="{{ asset('images/work-shop-2.jpg') }}"
                        alt="Work Shop Image" style="width: 100%; height: 300px">
                </div>

                <ul class="d-none d-md-block">
                    <li>
                        <p class="fs-5 fw-light">
                            Our talented team blends traditional techniques with modern designs, crafting visually
                            stunning cakes for every occasion.
                        </p>
                    </li>
                    <li>
                        <p class="fs-5 fw-light">
                            We use only the finest, freshest ingredients to ensure every bite is delightful.
                        </p>
                    </li>
                    <li>
                        <p class="fs-5 fw-light">
                            We use only the finest, freshest ingredients to ensure every bite is delightful.
                        </p>
                    </li>
                    <li>
                        <p class="fs-5 fw-light">
                            We're obsessed with every detail, from consultation to delivery.
                        </p>
                    </li>
                    <li>
                        <p class="fs-5 fw-light">
                            Learn the art of cake making and decorating from our expert team.
                        </p>
                    </li>
                    <li>
                        <p class="fs-5 fw-light">
                            Experience the magic in person. Let us make your special moments sweeter with our
                            handcrafted cakes.
                        </p>
                    </li>
                </ul>
            </div>
            <div class="col-6 d-none align-items-start flex-column ps-5 d-xl-flex">
                <h1 class="display-6 fw-semibold" style="margin-left: 100px">Work Shop</h1>
                <p class="fs-5 fw-light" style="margin-left: 100px">
                    At JetCake's, we blend creativity with craftsmanship to create sweet memories:
                </p>
                <ul style="margin-left: 100px">
                    <li><b class="fs-5 fw-semibold">Artistry and Innovation</b>
                        <p class="fs-6 fw-light">
                            - Our talented team blends traditional techniques with modern designs, crafting visually
                            stunning cakes for every occasion.
                        </p>
                    </li>
                    <li><b class="fs-5 fw-semibold">Quality Ingredients</b>
                        <p class="fs-6 fw-light">
                            - We use only the finest, freshest ingredients to ensure every bite is delightful.
                        </p>
                    </li>
                    <li><b class="fs-5 fw-semibold">Customized Creations</b>
                        <p class="fs-6 fw-light">
                            - We use only the finest, freshest ingredients to ensure every bite is delightful.
                        </p>
                    </li>
                    <li><b class="fs-5 fw-semibold">Passion for Perfection</b>
                        <p class="fs-6 fw-light">
                            - We're obsessed with every detail, from consultation to delivery.
                        </p>
                    </li>
                    <li><b class="fs-5 fw-semibold">Workshops and Classes</b>
                        <p class="fs-6 fw-light">
                            - Learn the art of cake making and decorating from our expert team.
                        </p>
                    </li>
                    <li><b class="fs-5 fw-semibold">Visit Us</b>
                        <p class="fs-6 fw-light">
                            - Experience the magic in person. Let us make your special moments sweeter with our
                            handcrafted cakes.
                        </p>
                    </li>
                </ul>
            </div>
            <div class="col-6 align-items-center justify-content-center flex-column gap-2 d-none d-md-flex">
                <img class="rounded-2" src="{{ asset('images/work-shop.jpg') }}" alt="Work Shop Image"
                    style="width: 70%; height: 70%">
                <img class="rounded-2" src="{{ asset('images/work-shop-2.jpg') }}" alt="Work Shop Image"
                    style="width: 70%; height: 70%">
            </div>
        </div>
    </section>
    <section class="p-2 p-xl-5 d-flex justify-content-start align-items-center flex-column" id="cakes"
        style="height: 100vh; background: #FAFAFA">
        <h1 class="d-block display-6 fw-semibold py-2 text-center d-sm-none">Some <br> of our popular <br> cakes</h1>
        <h1 class="d-none display-6 fw-semibold py-5 d-sm-block">Some of our popular cakes</h1>

        <div id="carouselExampleCaptions" class="carousel slide d-md-none">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="card-img-top" src="{{ asset('images/cakeImage.jpg') }}" alt="Cake Image"
                        height="500">
                    <div class="carousel-caption opacity-75 bg-dark rounded-2">
                        <h5 class="fw-semibold">Chocolate Cake</h5>
                        <h6 class="mb-2 fw-light"><i>Indulge in Pure Chocolate Bliss</i></h6>
                        <p class="fs-6 fw-light">
                            Indulge in our rich, velvety Chocolate Cake, layered with smooth chocolate ganache. A
                            must-try for chocolate lovers!
                        </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="card-img-top" src="{{ asset('images/cakeImage2.jpg') }}" alt="Cake Image"
                        height="500">
                    <div class="carousel-caption opacity-75 bg-dark rounded-2">
                        <h4 class="fw-semibold">Ube Rose Cake</h4>
                        <h6 class="mb-2 fw-light"><i>A Floral Twist on a Filipino Favorite</i></h6>
                        <p class="fs-6 fw-light">
                            Delight in our Ube Rose Cake, made with vibrant purple yam and delicate rose essence.
                            Perfect for special occasions.
                        </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="card-img-top" src="{{ asset('images/cakeImage3.jpg') }}" alt="Cake Image"
                        height="500">
                    <div class="carousel-caption opacity-75 bg-dark rounded-2">
                        <h4 class="fw-semibold">Choco Grapes Cake</h4>
                        <h6 class="mb-2 fw-light"><i>A Fusion of Decadence and Freshness</i></h6>
                        <p class="fs-6 fw-light">Enjoy our Choco Grapes Cake, featuring layers of rich chocolate
                            cake and juicy grapes, topped with smooth chocolate frosting. A delightful twist on
                            tradition!
                        </p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="d-none justify-content-center align-items-center gap-3 d-md-flex d-xl-none">
            <div class="card border-0" style="width: 15rem; height: 35rem">
                <div class="rounded-top-2"
                    style="height: 50%; background: url({{ asset('images/cakeImage.jpg') }}) center center no-repeat; background-size: cover;">
                </div>
                <div class="card-body bg-white">
                    <h4 class="card-title fw-semibold">Chocolate Cake</h4>
                    <h6 class="card-subtitle mb-2 fw-light"><i>Indulge in Pure Chocolate Bliss</i></h6>
                    <p class="card-text fs-6 fw-light">Some quick example text to build on the card title and make up
                        the bulk of the
                        card's content.</p>
                </div>
            </div>
            <div class="card border-0" style="width: 15rem; height: 35rem">
                <div class="rounded-top-2"
                    style="height: 50%; background: url({{ asset('images/cakeImage2.jpg') }}) center center no-repeat; background-size: cover;">
                </div>
                <div class="card-body bg-white">
                    <h4 class="card-title fw-semibold">Ube Rose Cake</h4>
                    <h6 class="card-subtitle mb-2 fw-light"><i>A Floral Twist on a Filipino Favorite</i></h6>
                    <p class="card-text fs-6 fw-light">Delight in our Ube Rose Cake, made with vibrant purple yam and
                        delicate rose essence. Perfect for special occasions.</p>
                </div>
            </div>
            <div class="card border-0" style="width: 15rem; height: 35rem">
                <div class="rounded-top-2"
                    style="height: 50%; background: url({{ asset('images/cakeImage3.jpg') }}) center center no-repeat; background-size: cover;">
                </div>
                <div class="card-body bg-white">
                    <h4 class="card-title fw-semibold">Choco Grapes Cake</h4>
                    <h6 class="card-subtitle mb-2 fw-light"><i>A Fusion of Decadence and Freshness</i></h6>
                    <p class="card-text fs-6 fw-light">Enjoy our Choco Grapes Cake, featuring layers of rich chocolate
                        cake and juicy grapes, topped with smooth chocolate frosting. A delightful twist on tradition!
                    </p>
                </div>
            </div>
        </div>
        <div class="d-none justify-content-center align-items-center gap-3 d-xl-flex">
            <div class="card border-0" style="width: 25rem; height: 35rem">
                <div class="rounded-top-2"
                    style="height: 50%; background: url({{ asset('images/cakeImage.jpg') }}) center center no-repeat; background-size: cover;">
                </div>
                <div class="card-body bg-white">
                    <h3 class="card-title fw-semibold">Chocolate Cake</h3>
                    <h5 class="card-subtitle mb-2 fw-light"><i>Indulge in Pure Chocolate Bliss</i></h5>
                    <p class="card-text fs-5 fw-light">Some quick example text to build on the card title and make up
                        the bulk of the
                        card's content.</p>
                </div>
            </div>
            <div class="card border-0" style="width: 25rem; height: 35rem">
                <div class="rounded-top-2"
                    style="height: 50%; background: url({{ asset('images/cakeImage2.jpg') }}) center center no-repeat; background-size: cover;">
                </div>
                <div class="card-body bg-white">
                    <h3 class="card-title fw-semibold">Ube Rose Cake</h3>
                    <h5 class="card-subtitle mb-2 fw-light"><i>A Floral Twist on a Filipino Favorite</i></h5>
                    <p class="card-text fs-5 fw-light">Delight in our Ube Rose Cake, made with vibrant purple yam and
                        delicate rose essence. Perfect for special occasions.</p>
                </div>
            </div>
            <div class="card border-0" style="width: 25rem; height: 35rem">
                <div class="rounded-top-2"
                    style="height: 50%; background: url({{ asset('images/cakeImage3.jpg') }}) center center no-repeat; background-size: cover;">
                </div>
                <div class="card-body bg-white">
                    <h3 class="card-title fw-semibold">Choco Grapes Cake</h3>
                    <h5 class="card-subtitle mb-2 fw-light"><i>A Fusion of Decadence and Freshness</i></h5>
                    <p class="card-text fs-5 fw-light">Enjoy our Choco Grapes Cake, featuring layers of rich chocolate
                        cake and juicy grapes, topped with smooth chocolate frosting. A delightful twist on tradition!
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="p-2 p-xl-5 d-flex justify-content-center align-items-center">
        <div
            class="d-flex flex-column justify-content-center align-items-center gap-2 px-2 gap-sm-5 px-sm-5 flex-sm-row">
            <div class="d-flex flex-column">
                <h1 class="display-6 fw-semibold">Follow Us</h1>
                <p class="fs-5 fw-light">
                    Stay connected with JetCake's! Follow us on social media for the latest updates, delicious cake
                    inspirations, behind-the-scenes looks at our workshop, special promotions, and more. Join our
                    community and share your sweet moments with us!
                </p>
            </div>
            <div class="d-flex flex-row gap-2">
                <button class="btn btn-outline-dark rounded-bottom-circle" style="width: 60px; height: 70px;">
                    <i class="fa-brands fa-twitter"></i>
                </button>
                <button class="btn btn-outline-dark rounded-top-circle" style="width: 60px; height: 70px;">
                    <i class="fa-brands fa-facebook"></i>
                </button>
                <button class="btn btn-outline-dark rounded-bottom-circle" style="width: 60px; height: 70px;">
                    <i class="fa-brands fa-youtube"></i>
                </button>
                <button class="btn btn-outline-dark rounded-top-circle" style="width: 60px; height: 70px;">
                    <i class="fa-brands fa-instagram"></i>
                </button>
            </div>
        </div>
    </section>
    <div style="position: fixed; bottom: 30px; right: 30px; display: none;" id="arrow_up">
        <a href="#">
            <button class="btn btn-outline-dark rounded-bottom-circle opacity-50" style="width: 60px; height: 70px;">
                <i class="fa fa-arrow-up animate-arrow"></i>
            </button>
        </a>
    </div>
    <footer class="py-4" style="background: #4d6d9a;">
        <div class="d-flex justify-content-center align-items-center">
            <span class="text-white fs-6 fw-light d-block d-md-none">&copy; Copyright 2025 JetCake's - All Rights
                Reserved</span>
            <span class="text-white fs-5 fw-light d-none d-md-block">&copy; Copyright 2025 JetCake's - All Rights
                Reserved</span>
        </div>
    </footer>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navigationSection = document.getElementById('navigation');
        const arrowUp = document.getElementById('arrow_up');

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (!entry.isIntersecting) {
                    arrowUp.style.display = 'block';
                } else {
                    arrowUp.style.display = 'none';
                }
            });
        });

        observer.observe(navigationSection);
    });

    document.addEventListener("DOMContentLoaded", function() {
        var myOffcanvas = document.getElementById('offcanvasExample');
        var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas);
        document.getElementById("OpenMenu").addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            bsOffcanvas.toggle();
        });
    });
</script>

</html>
