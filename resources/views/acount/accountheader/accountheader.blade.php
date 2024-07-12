<!DOCTYPE html>
<html class="no-js" lang="en_AU" />
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo (!empty($title)) ? 'Title-'.$title: 'Home'; ?></title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />

	<meta name="HandheldFriendly" content="True" />
	<meta name="pinterest" content="nopin" />

	<meta property="og:locale" content="en_AU" />
	<meta property="og:type" content="website" />
	<meta property="fb:admins" content="" />
	<meta property="fb:app_id" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:url" content="" />
	<meta property="og:image" content="" />
	<meta property="og:image:type" content="image/jpeg" />
	<meta property="og:image:width" content="" />
	<meta property="og:image:height" content="" />
	<meta property="og:image:alt" content="" />

	<meta name="twitter:title" content="" />
	<meta name="twitter:site" content="" />
	<meta name="twitter:description" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:image:alt" content="" />
	<meta name="twitter:card" content="summary_large_image" />
	
    
	<link rel="stylesheet" type="text/css" href="{{asset('frontendlayout/css/slick.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('frontendlayout/css/slick-theme.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('frontendlayout/css/video-js.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontendlayout/css/style.css?v')}}=<?php echo rand(111,999); ?>" />

	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;500&family=Raleway:ital,wght@0,400;0,600;0,800;1,200&family=Roboto+Condensed:wght@400;700&family=Roboto:wght@300;400;700;900&display=swap" rel="stylesheet">

	<!-- Fav Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="#" />

	{{-- range --}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>

	<meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body data-instant-intensity="mousedown">

		<div class="bg-light top-header">        
			<div class="container">
				<div class="row align-items-center py-3 d-none d-lg-flex justify-content-between">
					<div class="col-lg-4 logo">
						<a href="index.php" class="text-decoration-none">
							<span class="h1 text-uppercase text-primary bg-dark px-2">Online</span>
							<span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">SHOP</span>
						</a>
					</div>
					<div class="col-lg-6 col-6 text-left  d-flex justify-content-end align-items-center">
						<a href="{{route('user.account')}}" class="nav-link text-dark">My Account</a>
						<form action="">					
							<div class="input-group">
								<input type="text" placeholder="Search For Products" class="form-control" aria-label="Amount (to the nearest dollar)">
								<span class="input-group-text">
									<i class="fa fa-search"></i>
								</span>
							</div>
						</form>
					</div>		
				</div>
			</div>
		</div>

		<header class="bg-dark">
			<div class="container">
				<nav class="navbar navbar-expand-xl" id="navbar">
					<a href="index.php" class="text-decoration-none mobile-logo">
						<span class="h2 text-uppercase text-primary bg-dark">Online</span>
						<span class="h2 text-uppercase text-white px-2">SHOP</span>
					</a>
					<button class="navbar-toggler menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<!-- <span class="navbar-toggler-icon icon-menu"></span> -->
						<i class="navbar-toggler-icon fas fa-bars"></i>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">




						
						
						



					</div>   
					<div class="right-nav py-0">
						<a href="{{route('card')}}" class="ml-3 d-flex pt-2">
							<i class="fas fa-shopping-cart text-primary"></i>					
						</a>
					</div> 		
				</nav>
			</div>
</header>

<main>
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="{{route('user.account')}}">My Account</a></li>
                    <li class="breadcrumb-item">Settings</li>
                </ol>
            </div>
        </div>
    </section>

    <section class=" section-11 ">
        <div class="container  mt-5">
            <div class="row">

            
                <div class="col-md-3">
                    <ul id="account-panel" class="nav nav-pills flex-column" >
                        <li class="nav-item ">
                            <a href="{{route('user.profile')}}"  class="nav-link font-weight-bold" role="tab" aria-controls="tab-login" aria-expanded="false"><i class="fas fa-user-alt"></i> My Profile</a>
                        </li>
                        <li class="nav-item active">
                            <a href="{{route('user.account')}}"  class="nav-link font-weight-bold" role="tab" aria-controls="tab-register" aria-expanded="false"><i class="fas fa-shopping-bag"></i>My Orders</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.wishlist')}}"  class="nav-link font-weight-bold" role="tab" aria-controls="tab-register" aria-expanded="false"><i class="fas fa-heart"></i> Wishlist</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.changepassword')}}"  class="nav-link font-weight-bold" role="tab" aria-controls="tab-register" aria-expanded="false"><i class="fas fa-lock"></i> Change Password</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('logout')}}"  class="nav-link font-weight-bold" role="tab" aria-controls="tab-register" aria-expanded="false"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                    </ul>
                </div>

	
			@yield('frontendcontant')

               
            </div>
        </div>
    </section>
</main>









<footer class="bg-dark mt-5">
	<div class="container pb-5 pt-3">
		<div class="row">
			<div class="col-md-4">
				<div class="footer-card">
					<h3>Get In Touch</h3>
					<p>No dolore ipsum accusam no lorem. <br>
					123 Street, New York, USA <br>
					exampl@example.com <br>
					000 000 0000</p>
				</div>
			</div>

			<div class="col-md-4">
				<div class="footer-card">
					<h3>Important Links</h3>
					<ul>
						<li><a href="about-us.php" title="About">About</a></li>
						<li><a href="contact-us.php" title="Contact Us">Contact Us</a></li>						
						<li><a href="#" title="Privacy">Privacy</a></li>
						<li><a href="#" title="Privacy">Terms & Conditions</a></li>
						<li><a href="#" title="Privacy">Refund Policy</a></li>
					</ul>
				</div>
			</div>

			<div class="col-md-4">
				<div class="footer-card">
					<h3>My Account</h3>
					<ul>
						<li><a href="#" title="Sell">Login</a></li>
						<li><a href="#" title="Advertise">Register</a></li>
						<li><a href="#" title="Contact Us">My Orders</a></li>						
					</ul>
				</div>
			</div>			
		</div>
	</div>
	<div class="copyright-area">
		<div class="container">
			<div class="row">
				<div class="col-12 mt-3">
					<div class="copy-right text-center">
						<p>© Copyright 2022 Amazing Shop. All Rights Reserved</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<script src=" {{asset('frontendlayout/js/jquery-3.6.0.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>




<script src=" {{asset('frontendlayout/js/bootstrap.bundle.5.1.3.min.js')}}"></script>
<script src=" {{asset('frontendlayout/js/instantpages.5.1.0.min.js')}}"></script>
<script src=" {{asset('frontendlayout/js/lazyload.17.6.0.min.js')}}"></script>
<script src=" {{asset('frontendlayout/js/slick.min.js')}}"></script>
<script src=" {{asset('frontendlayout/js/custom.js')}}"></script>
<script>

	// range slider
	

window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}


</script>

<script>
	  $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('customjs')
</body>
</html>




