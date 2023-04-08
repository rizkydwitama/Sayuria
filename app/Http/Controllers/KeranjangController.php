<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sayurmodel;

class KeranjangController extends Controller
{
    public function viewKeranjang()
    {
        return view('keranjang');
    }

    public function addToKeranjang($id)
    {
        $sayur = sayurmodel::findOrFail($id);
        $keranjang = session()->get('keranjang', []);
        if(isset($keranjang[$id])){
            $keranjang[$id]['quantity']++;
            
        } else{
            $keranjang[$id] = [
                "nama_sayur" => $sayur->nama_sayur,
                "harga_sayur" => $sayur->harga_sayur,
                "gambar" => $sayur->gambar,
                "quantity" => 1
            ];
        }
        session() -> put('keranjang', $keranjang);
        return redirect()->back()->with('success', 'Sayur berhasil ditambahkan ke keranjang!');
    }

    public function updateKeranjang(Request $request)
    {
        if($request->id && $request->quantity){
            $keranjang = session()->get('keranjang');
            $keranjang[$request->id]['quantity'] = $request->quantity;
            session()->put('keranjang', $keranjang);
            session()->flash('success', 'Keranjang berhasil diupdate!');
        }
    }

    public function removeFromKeranjang(Request $request)
    {
        if($request->id){
            $keranjang = session()->get('keranjang');
            if(isset($keranjang[$request->id])){
                unset($keranjang[$request->id]);
                session()->put('keranjang', $keranjang);
            }
            session()->flash('success', 'Sayur berhasil dihapus');
        }
    }
}
