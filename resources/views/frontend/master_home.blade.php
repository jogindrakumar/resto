<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Resto - Restaurant </title>
    <meta name="description" content="Resto">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- External CSS -->
    <link rel="stylesheet" href="{{asset('frontend/vendor/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/vendor/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/vendor/owlcarousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="https://cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/brands.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Josefin+Sans:300,400,700">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/style.min.css')}}">

    <!-- Modernizr JS for IE8 support of HTML5 elements and media queries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

</head>

<body data-spy="scroll" data-target="#navbar" class="static-layout">
    <div id="side-nav" class="sidenav">
        <a href="javascript:void(0)" id="side-nav-close">&times;</a>

        <div class="sidenav-content">
            <p>
                Kuncen WB1, Wirobrajan 10010, DIY
            </p>
            <p>
                <span class="fs-16 primary-color">(+68) 120034509</span>
            </p>
            <p>info@yourdomain.com</p>
        </div>
    </div>
    <div id="side-search" class="sidenav">
        <a href="javascript:void(0)" id="side-search-close">&times;</a>
        <div class="sidenav-content">
            <form action="">

                <div class="input-group md-form form-sm form-2 pl-0">
                    <input class="form-control my-0 py-1 red-border" type="text" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="input-group-text red lighten-3" id="basic-text1">
			    	<i class="fas fa-search text-grey" aria-hidden="true"></i>
			    </button>
                    </div>
                </div>

            </form>
        </div>


    </div>
    <div id="canvas-overlay"></div>
    <div class="boxed-page">
       @include('frontend.body.navbar')
       @include('frontend.body.hero_section')
        <!-- Welcome Section -->
      
@yield('main_content')


        <!-- End of Reservation Section -->
        <footer class="mastfoot pb-5 bg-white section-padding pb-0">
            <div class="inner container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="footer-widget pr-lg-5 pr-0">
                            <img src="{{asset('frontend/img/logo.png')}}" class="img-fluid footer-logo mb-3" alt="">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et obcaecati quisquam id sit omnis explicabo voluptate aut placeat, soluta, nisi ea magni facere, itaque incidunt modi? Magni, et voluptatum dolorem.</p>
                            <nav class="nav nav-mastfoot justify-content-start">
                                <a class="nav-link" href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="nav-link" href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a class="nav-link" href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </nav>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="footer-widget px-lg-5 px-0">
                            <h4>Open Hours</h4>
                            <ul class="list-unstyled open-hours">
                                <li class="d-flex justify-content-between"><span>Monday</span><span>9:00 - 24:00</span></li>
                                <li class="d-flex justify-content-between"><span>Tuesday</span><span>9:00 - 24:00</span></li>
                                <li class="d-flex justify-content-between"><span>Wednesday</span><span>9:00 - 24:00</span></li>
                                <li class="d-flex justify-content-between"><span>Thursday</span><span>9:00 - 24:00</span></li>
                                <li class="d-flex justify-content-between"><span>Friday</span><span>9:00 - 02:00</span></li>
                                <li class="d-flex justify-content-between"><span>Saturday</span><span>9:00 - 02:00</span></li>
                                <li class="d-flex justify-content-between"><span>Sunday</span><span> Closed</span></li>
                            </ul>
                        </div>

                    </div>

                    <div class="col-lg-4">
                        <div class="footer-widget pl-lg-5 pl-0">
                            <h4>Newsletter</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <form id="newsletter">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="emailNewsletter" aria-describedby="emailNewsletter" placeholder="Enter email">
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                            </form>
                        </div>

                    </div>
                    <div class="col-md-12 d-flex align-items-center">
                        <p class="mx-auto text-center mb-0">Copyright 2019. All Right Reserved. <a href="" target="_blank">Jogindra kumar</a></p>
                    </div>

                </div>
            </div>
        </footer>
    </div>
    </div>
    <!-- External JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="{{asset('frontend/vendor/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/select2/select2.min.js')}} "></script>
    <script src="{{asset('frontend/vendor/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="https://cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.js"></script>
    <script src="{{asset('frontend/vendor/stellar/jquery.stellar.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Main JS -->
    <script src="{{asset('frontend/js/app.min.js')}} "></script>
</body>

</html>