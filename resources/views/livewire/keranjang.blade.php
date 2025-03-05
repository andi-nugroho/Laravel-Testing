<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products') }}" class="text-dark">List Jersey</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                </ol>
            </nav>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>


    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Gambar</td>
                            <td>Keterangan</td>
                            <td>Name Set</td>
                            <td>Nomor Set</td>
                            <td>Jumlah</td>
                            <td>Harga</td>
                            <td><strong>Total Harga</strong></td>
                            <td class="text-danger">Cancel</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @forelse ($pesanan_details as $pesanan_detail)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                <img src="{{ url('assets/jersey') }}/{{ $pesanan_detail->product -> gambar }}" class="img-fluid" width="200">
                            </td>
                            <td>
                                {{ $pesanan_detail-> product -> nama}}
                            </td>
                            <td>
                                @if($pesanan_detail -> nama_set)
                                <strong>{{ $pesanan_detail -> nama }}</strong>
                                @else
                                <strong> - </strong>
                                @endif
                            </td>
                            <td>
                                @if($pesanan_detail -> nama_set)
                                <strong>{{ $pesanan_detail -> nomor }}</strong>
                                @else
                                <strong> - </strong>
                                @endif
                            </td>
                            <td>
                                {{ $pesanan_detail -> jumlah_pesanan}}
                            </td>
                            <td>
                                Rp. {{ number_format($pesanan_detail -> product -> harga) }}
                            </td>
                            <td>
                                <strong>Rp. {{ number_format($pesanan_detail -> total_harga) }}</strong>
                            </td>
                            <td>
                                <i wire:click="destroy({{ $pesanan_detail -> id }})" class="fas fa-trash text-danger"></i>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">Keranjang Kosong</td>
                        </tr>
                        @endforelse


                        @if(!empty($pesanan))
                        <tr>
                            <td colspan="6" align="right"><strong>Total Harga</strong></td>
                            <td>:</td>
                            <td align="left">
                                <strong>Rp. {{ number_format($pesanan -> total_harga) }}</strong>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="6" align="right"><strong>Potongan</strong></td>
                            <td>:</td>
                            <td align="left">
                                <strong>Rp. {{ number_format($pesanan -> potongan) }}</strong>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="6" align="right"><strong>Total Yang Dibayarkan</strong></td>
                            <td>:</td>
                            <td align="left">
                                <strong>Rp. {{ number_format($pesanan -> total_harga - $pesanan -> potongan) }}</strong>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="7"></td>
                            <td colspan="2">
                                <a href="{{ route('checkout') }}" class="btn btn-success btn-block">
                                    <i class="fas fa-arrow-right">Check Out</i>
                                </a>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>