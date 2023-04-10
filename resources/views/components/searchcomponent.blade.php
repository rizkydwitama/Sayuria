<title> Hasil Pencarian | Sayuria </title>
@extends('layout')
@section('content')
		<!--sayur-populer start -->
		<section id="sayur-populer" class="sayur-populer" >
			<div class="container" >
			  <div class="section-header" >
				<h2>Hasil Pencarian</h2>
			  </div><!--/.section-header-->
			  <div class="sayur-populer-content">
				<div class="row">
                @if(is_array($produk) || is_object($produk))
				  @foreach($produk as $sayur)
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
					  <h4><a href="#">{{$sayur->nama_sayur}}</a></h4>
					  <p class="description">{{$sayur->deskripsi}}</p>
					  <p class="arrival-product-price">@currency($sayur->harga_sayur)</p>
					</div>
				  </div>
				  @endforeach
                  @else
                        <div style="text-align: center; margin-top: 50px;">
                            <h3>Maaf, Sayur yang Anda cari tidak ditemukan.</h3>
                            <p>Silakan coba kata kunci yang lain atau cari produk lainnya.</p>
                            <img src="asset/images/product_not_found.jpeg" alt="Gambar Produk Tidak Ditemukan" style="max-width: 400px;">
                        </div>
                  @endif
				</div>
			  </div>
			</div><!--/.container-->
		  </section><!--/.sayur-populer-->
	
@endsection