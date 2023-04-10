<!doctype html>
<html class="no-js" lang="en">
	<?php
	use App\Http\Controllers\KeranjangController;
	$jumlah=KeranjangController::list_item();
	?>
    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
        
        <!-- title of site -->
        <title>Sayuria</title>

       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="order/css/font-awesome.min.css">

        <!--linear icon css-->
		<link rel="stylesheet" href="order/css/linearicons.css">

		<!--animate.css-->
        <link rel="stylesheet" href="order/css/animate.css">

        <!--owl.carousel.css-->
        <link rel="stylesheet" href="order/css/owl.carousel.min.css">
		<link rel="stylesheet" href="order/css/owl.theme.default.min.css">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="order/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="order/css/bootsnav.css" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="order/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="order/css/responsive.css">
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
	
	<body>
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
		
		
	
		<!--welcome-hero start -->
		<nav class="navbar navbar-default">
			<div class="container-fluid">	
			  	<ul class="nav navbar-nav">
					<li class="active"><a href="{{route('keranjang')}}">kembali</a></li>
				</ul>
			</div>
		</nav>

		<div class="row">
			<div class="col-75">
			  <div class="container">
				<form action="orderplace" method="POST">
					@csrf
				  <div class="row">
					<div class="col-50">
					  <h3>Data Penerima</h3>
					  <label for="fname"><i class="fa fa-user"></i> Nama Penerima</label>
					  <input type="text" id="fname" name="name"  value="{{ auth()->user()->nama_depan }} {{ auth()->user()->nama_belakang }} ">
					  <label for="adr"><i class="fa fa-address-card-o"></i> Alamat</label>
					  <input type="text" id="adr" name="alamat"  value="{{ auth()->user()->alamat	 }}"value="">
					  <label for="city"><i class="fa fa-institution"></i> Kota</label>
					  <input type="text" id="city" name="" placeholder="Bandung">
					  <div class="row">
						<div class="col-50">
						  <label for="state">Provinsi</label>
						  <input type="text" id="state" name="" placeholder="Jawa Barat">
						</div>
						<div class="col-50">
						  <label for="zip">Kode Pos</label>
						  <input type="text" id="zip" name="" placeholder="40287">
						</div>
					  </div>
					</div>
                    
					<div class="col-50">
					  <h3>Payment</h3>
					  <label for="fname">Metode Pembayaran</label>
					  <div class="icon-container">
						<input type="radio" id="COD" name="payment" value="COD">
						<label for="COD"><i class='fa fa-truck' style='font-size:36px'></i> COD</label>
						<input type="radio" id="TFB" name="payment" value="TFB">
						<label for="TFB"><i class="fa fa-bank" style="font-size:36px"></i> Transfer Bank</label>
					  </div>
					</div>
		  
				  </div>
				  <input type="submit" value="Bayar" class="btn">
				</form>
			  </div>
			</div>
		  
			<div class="col-25">
			  <div class="container">
				<h4>Ringkasan pembayaran
				  <span class="price" style="color:black">
					<i class="fa fa-shopping-cart"></i>
					<b>{{$jumlah}}</b>
				  </span>
				</h4>
				<p><a href="#">Total Belanja</a> <span class="price">@currency($total)</span></p>
				<p><a href="#">Biaya Pengiriman</a> <span class="price">Rp. 15,000</span></p>
				<p><a href="#">Biaya Layanan</a> <span class="price">Rp. 2,500</span></p>
				<hr>
				<p>Total Tagihan <span class="price" style="color:black"><b>@currency($total+15000+2500)</b></span></p>
			  </div>
			</div>
		  </div>

		
		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="order/js/jquery.js"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="order/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="order/js/bootsnav.js"></script>

		<!--owl.carousel.js-->
        <script src="order/js/owl.carousel.min.js"></script>


		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
		
        
        <!--Custom JS-->
        <script src="order/js/custom.js"></script>
        
    </body>
	
</html>