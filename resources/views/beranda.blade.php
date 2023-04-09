<title> Beranda | Sayuria </title>

@extends('layout')

@section('content')
<!--welcome-hero start -->
<header id="home" class="welcome-hero">
	<div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
		<!--/.carousel-inner -->
		<div class="carousel-inner" role="listbox">
			<!-- .item -->
			<div class="item active">
				<div class="single-slide-item slide1">
					<div class="container">
						<div class="welcome-hero-content">
							<div class="row">
								<div class="col-sm-5">
									<div class="single-welcome-hero">
										<div class="welcome-hero-img">
											<img src="asset/images/foto_beranda1.png" alt="slider image">
										</div><!--/.welcome-hero-txt-->
									</div><!--/.single-welcome-hero-->
								</div><!--/.col-->
								<div class="col-sm-7">
									<div class="single-welcome-hero">
										<div class="welcome-hero-txt">
											<h2>Platform Terbaik Untuk Menyediakan Kebutuhan Sayuran Anda</h2>
											<p>
												Lebih dari 50 macam sayuran tersedia di Sayuria, <br>
												dipetik langsung dari lahan perkebunan dengan  <br>
												standar terbaik se-Indonesia. Tunggu apa lagi! <br>
												Jelajahi Sayuria sekarang!
											</p>
										</div><!--/.welcome-hero-txt-->
									</div><!--/.single-welcome-hero-->
								</div><!--/.col-->
							</div><!--/.row-->
						</div><!--/.welcome-hero-content-->
					</div><!-- /.container-->
				</div><!-- /.single-slide-item-->
			</div><!-- /.item .active-->
		</div><!-- /.carousel-inner-->
	</div><!--/#header-carousel-->
</header>

<!--sayur-populer start -->
<section id="sayur-populer" class="sayur-populer" >
	<div class="container" >
		<div class="section-header" >
			<h2>List Sayur</h2>
	  	</div><!--/.section-header-->
	  	<div class="sayur-populer-content">
			<div class="row">
		  		@foreach($data as $sayur)
		  		<div class="col-sm-6 col-md-4 col-lg-4" >
					<div class="single-sayur-populer"  >
			  			<div class="single-sayur-populer-bg">
							<img src="asset/images/collection/{{$sayur->gambar}}" alt="sayur-populer images">
							<div class="single-sayur-populer-bg-overlay"></div>
							<div class="sayur-populer-cart">
				  				<p>
									<span class="lnr lnr-cart"></span>
									<a href="#">add <span>to </span> cart</a>
				  				</p>
				  				<p class="arrival-review pull-right">
									<span class="lnr lnr-heart"></span>
									<span class="lnr lnr-frame-expand"></span>
				  				</p>
							</div>
						</div>
						<h4><a href="{{route('detail_produk', $sayur->id)}}">{{$sayur->nama_sayur}}</a></h4>
							<p class="description">{{$sayur->deskripsi}}</p>
			  				<p class="arrival-product-price">@currency($sayur->harga_sayur)</p>
					</div>
				</div>
				@endforeach
				<div>
					<a href="{{route ('produk')}}" style="position:absolute; margin-top: 600px">See more produk</a>
		  		</div>
			</div>
		</div>
	</div><!--/.container-->
</section><!--/.sayur-populer-->
@endsection
		