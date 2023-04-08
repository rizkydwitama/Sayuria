<title> {{$data->nama_sayur}} | Sayuria </title>

@extends('layout')

@section('content')
<!--welcome-hero start -->
<header id="produk" class="welcome-hero">
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
											<img src="asset/images/collection/{{$data->gambar}}" alt="slider image">
										</div><!--/.welcome-hero-img-->
									</div><!--/.single-welcome-hero-->
								</div><!--/.col-->
								<div class="col-sm-7">
									<div class="single-welcome-hero">
										<div class="welcome-hero-txt">
											<h2>{{$data->nama_sayur}}</h2>
											<h3>@currency($data->harga_sayur)</h3>
											<p>
												{{$data->deskripsi}}
											</p>
											<button type="button" id="krj">+ Tambahkan ke keranjang</button>
											<br>
											<br>
											<button type="button" id="ckt">+ Checkout</button>
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
</header><!--/.welcome-hero-->
<!--welcome-hero end -->
@endsection
