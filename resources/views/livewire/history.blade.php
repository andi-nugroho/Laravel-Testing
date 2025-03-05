<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">History</li>
                </ol>
            </nav>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <div class="col">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Tanggal Pesan</td>
                                <td>Kode Pemesanan</td>
                                <td>Pesanan</td>
                                <td>Status</td>
                                <td><strong>Total Harga</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @forelse ($pesanans as $pesanan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $pesanan -> created_at }}</td>
                                <td>{{ $pesanan -> kode_pemesanan }}</td>
                                <td>
                                    <?php $pesanan_details = \App\Models\PesananDetail::where('pesanan_id', $pesanan->id)->get(); ?>
                                    @foreach ($pesanan_details as $pesanan_detail)
                                    <img src="{{ url('assets/jersey') }}/{{ $pesanan_detail->product->gambar }}" class="img-fluid" width="60">
                                    {{ $pesanan_detail -> product -> nama }}
                                    <br>
                                    @endforeach
                                </td>
                                <td>
                                    @if($pesanan -> status == 1)
                                    Belum Lunas
                                    @else
                                    Lunas
                                    @endif
                                </td>
                                <td>
                                    <strong>
                                        Rp. {{ number_format($pesanan -> total_harga - $pesanan -> potongan) }}
                                    </strong>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9">Keranjang Kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body shadow">
                    <p>Untuk pembayaran bisa lakukan transfer pada rekening di bawah ini.</p>
                    <br>
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="{{ url('assets/bri.png') }}" alt="Bank BRI" width="60">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mt-0"><strong>BANK BRI</strong></h5>
                            No. Rekening 01293812390813 | atas nama <strong>Anhar Mukhlis</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>