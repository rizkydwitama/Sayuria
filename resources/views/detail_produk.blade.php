<title> {{$data->nama_sayur}} | Sayuria </title>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

@extends('layout')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--welcome-hero start -->
<header id="produk" class="welcome-hero ">
	<div id="header-carousel" class="carousel slide carousel-fade data_sayur" data-ride="carousel">
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
											<form action="{{route('addToKeranjang')}}" method="POST">
											@csrf
											<input type="hidden" name="sayur_id" value="{{$data->id}}" class="sayur_id">
											<p>Masukkan Jumlah Yang ingin Dibeli </p>
											<input type="number" name="jumlah" class="quantity"><br><br>
											<input type="submit" id="krj" value="+ Tambahkan ke keranjang">
											</form>
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
<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
			url: "{{ route('addToKeranjang') }}",
			type: "POST",
			data: {
				sayur_id: sayur_id,
				jumlah: jumlah,
				"_token": "{{ csrf_token() }}"
			},
				success: function (response) {
					alert(response.status);
				},
				error: function (xhr) {
					alert(xhr.responseText);
				}
		});
	});
   
</script>