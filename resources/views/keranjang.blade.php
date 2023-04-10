<!DOCTYPE html>
<html>
<head>
	<title>Keranjang Belanja</title>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" type="text/css" href="asset/css/keranjang.css">
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
			margin-bottom: 20px;
		}
		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		.total {
			font-weight: bold;
		}
        nav{
            background-color:#7CC644; 
        }
	</style>
</head>
<body>
  	<nav>
		<a href="{{route('produk')}}"> <button href=> Kembali </button> </a>
	</nav>
	<table id="keranjang">
		<tr>
      <th>Gambar</th>
			<th>Produk</th>
			<th>Harga</th>
			<th>Jumlah (Kg)</th>
			<th>Total</th>
			<th></th>
		</tr>
		<tr>
            @php $total = 0 @endphp
            @foreach($keranjang as $details)
            @php $total_per_sayur = $details->item_sayur->harga_sayur * $details->quantity @endphp
            @php $total +=  $total_per_sayur @endphp
            
      <td><img src="asset/images/collection/{{ $details->item_sayur->gambar }}" alt="Produk 1" class="gmbar_prdk"></td>
			<td>{{ $details->item_sayur->nama_sayur }}</td>
			<td>@currency($details->item_sayur->harga_sayur) </td>
			<input type="hidden" class="sayur_id" value="{{$details->sayur_id}}">
			<td>
				<span class="quantity">{{ $details->quantity }}</span>
			</td>
			<td>@currency($total_per_sayur)</td>
			<td>
				<a href="removeFromKeranjang/{{$details['id']}}" ><button id="cart_remove">Hapus</button></a>
			</td>
		</tr>
        @endforeach
        <tr class="total">
			<td colspan="4">Total</td>
			<td>@currency($total)</td>
			<td></td>
		</tr>

	</table>
	<h2>Checkout</h2>
	<form action="{{route('order-detail')}}">
		<label for="pengiriman">Pengiriman:</label>
		<select id="pengiriman">
			<option value="5000">Gosend</option>
			<option value="10000">Grab Express</option>
		</select>
		<br>
		<button>Checkout</button>
	</form>
</body>

</html>
