<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use App\Models\sayurmodel;
use App\Models\Keranjang;
use App\Models\Order;

class KeranjangController extends Controller
{
    public function viewKeranjang()
    {
        $keranjang=Keranjang::where('user_id',Auth::id())->get();
        return view('keranjang' ,compact('keranjang'));
    }
    
    public function addToKeranjang(Request $request)
    {
        $sayur_id=$request->sayur_id;
        $quantity=$request->jumlah;

        if(Auth::check()){
            $sayur_check=sayurmodel::where('id',$sayur_id)->first();
            if($sayur_check){
                if(Keranjang::where('sayur_id',$sayur_id)->where('user_id',Auth::id())->exists()){
                     return response()->json(['status'=>$sayur_check->nama_sayur." sudah ditambahkan ke keranjang"]);
                }else{
                    $keranjang=new Keranjang();
                    $keranjang->sayur_id=$sayur_id;
                    $keranjang->user_id=Auth::id();
                    $keranjang->quantity=$quantity;
                    $keranjang->save();
                    return redirect()->back()->with('success', 'Sayur berhasil ditambahkan ke keranjang!');
                }
            }
        }
        else{
            return response()->json(['status'=> "Login Untuk menambah ke keranjang"]);
        }
    }

    public function updateKeranjang(Request $request)
    {
        $sayur_id=$request->input('sayur_id');
        $quantity=$request->input('quantity');

        if(Auth::check()){
            if(Keranjang::where('sayur_id',$sayur_id)->where('user_id',Auth::id())->exist()){
                $keranjang=Keranjang::where('sayur_id',$sayur_id)->where('user_id',Auth::id())->first();
                $keranjang->quantity=$quantity;
                $keranjang->update();

                return response()->json(['status'=>'Jumlah di Update']);
            }
        }
    }

    public function removeFromKeranjang(Request $request)
    {
        Keranjang::destroy($id);
        return redirect('keranjang');
    }

    public function viewOrder(){
        $user_id = Auth::id();
        $user = Auth::user()->username;
        $keranjang = keranjang::where('user_id', $user_id)->get();
        $total = 0;
    
        foreach ($keranjang as $item) {
            $total += $item->item_sayur->harga_sayur * $item->quantity;
        }
    
        return view('order', compact('total', 'user'));
    }

    static function list_item(){
        $keranjang=keranjang::where('user_id',Auth::id())->get();
        return $keranjang->count();
    }

    public function orderplace(Request $request){
        $user_id = Auth::id();
        $keranjang=keranjang::where('user_id',$user_id)->get();
        foreach($keranjang as $cart){
            $order=new order;
            $order->sayur_id=$cart['sayur_id'];
            $order->user_id=$cart['user_id'];
            $order->nama_penerima=$request->name;
            $order->quantity=$cart['quantity'];
            $order->status="pending";
            $order->metode_pembayaran=$request->payment;
            $order->status_pembayaran="pending";
            $order->alamat=$request->alamat;
            $order->bukti=NULL;
            $order->save();
            keranjang::where('user_id',$user_id)->delete();
        }
        $request->input();
        if($order->metode_pembayaran == "COD"){
            return redirect('beranda');
        }else{
            return redirect('transfer');
        }
        
        
    }
}
