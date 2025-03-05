<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProductDetail extends Component
{

    public $product, $jumlah_pesanan, $nama, $nomor;
    
    public function mount($id)
    {
        $productDrtail = Product::find($id);

        if($productDrtail)
        {
            $this -> product = $productDrtail;
        }
    }

    public function masukkanKeranjang()
    {
        $this -> validate([
            'jumlah_pesanan' => 'required'
        ]);

        /* Validate jika belum login */

        if (!Auth::user())
        {
            return redirect()->route('login');
        }


        /* Menghitung total harga */
        if (!empty($this -> nama)) 
        {
            $total_harga = $this -> jumlah_pesanan * $this -> product -> harga + $this -> product -> harga_nameset;
        } else {
            $total_harga = $this -> jumlah_pesanan * $this -> product -> harga;
        }

        /* Ngecek apakah user punya data pesanan utama yang statusnya 0 apa tidak */
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', '0')->first();


        /* meyimpan / update data pemesanan utama */
        if(empty($pesanan))
        {
            Pesanan::create([
                'user_id' => Auth::user()->id,
                'total_harga' => $total_harga,
                'status' => 0,
                'potongan' => mt_rand(1000, 3000)
            ]);

            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', '0')->first();
            $pesanan -> kode_pemesanan = 'JP-'.$pesanan->id;
            $pesanan -> update();
        } else {
            $pesanan -> total_harga = $pesanan -> total_harga + $total_harga;
            $pesanan->update();
        }

        /* Menyimpan pesanan detail */
        PesananDetail::create([
            'product_id' => $this -> product -> id,
            'pesanan_id' => $pesanan -> id,
            'jumlah_pesanan' => $this -> jumlah_pesanan,
            'nama_set' => $this -> nama ? true : false,
            'nama' => $this -> nama,
            'nomor' => $this -> nomor,
            'total_harga' => $total_harga
        ]);

        $this -> emit('masukkanKeranjang');
        
        session()->flash('message', 'Sukses Masuk Keranjang');

        return redirect()->back();
    }
    
    public function render()
    {
        return view('livewire.product-detail')->layout('livewire.layouts.app');
    }
}
