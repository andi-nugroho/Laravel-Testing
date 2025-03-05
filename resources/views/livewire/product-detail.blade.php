<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products') }}" class="text-dark">List Jersey</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Jersey</li>
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


    <div class="row">
        <div class="col-md-6">
            <div class="card gambar-product">
                <div class="card-body">
                    <img src="{{ url('assets/jersey') }}/{{ $product -> gambar }}" class="img-fluid">
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <h2>
                <strong>{{ $product -> nama }}</strong>
            </h2>
            <h4>
                Rp. {{ number_format( $product -> harga ) }}
                @if ($product -> is_ready == 1)
                <span class="badge text-bg-success"><i class="fas fa-check"></i> Stock Ready</span>
                @else
                <span class="badge text-bg-danger"><i class="fas fa-times"></i> Stock Habis</span>
                @endif
            </h4>
            <hr>

            <div class="row">
                <div class="col">
                    <form wire:submit.prevent="masukkanKeranjang">
                        <table class="table mt-5">
                            <tr>
                                <td>Liga</td>
                                <td>:</td>
                                <td>
                                    <img src="{{ url('assets/liga') }}/{{ $product->liga->gambar }}" class="img-fluid" width="50">
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis</td>
                                <td>:</td>
                                <td>{{ $product -> jenis }}</td>
                            </tr>
                            <tr>
                                <td>Berat</td>
                                <td>:</td>
                                <td>{{ $product -> berat }}</td>
                            </tr>
                            <tr>
                                <td>Harga Satuan</td>
                                <td>:</td>
                                <td>Rp. {{ number_format($product -> harga) }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah</td>
                                <td>:</td>
                                <td>
                                    <input wire:model="jumlah_pesanan" id="jumlah_pesanan" type="number" class="form-control @error('jumlah_pesanan') is-invalid @enderror" value="{{ old('jumlah_pesanan') }}" required autocomplete="name" autofocus @if($product->is_ready !== 1) disabled @endif>

                                    @error('jumlah_pesanan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </td>
                            </tr>

                            @if($jumlah_pesanan > 1)

                            <tr>
                                <td colspan="3"><strong>Nameset </strong>(Harus Pesan Grosir)</td>
                            </tr>

                            @else

                            
                            <tr>
                                <td colspan="3"><strong>Nameset </strong>(Opsional)</td>
                            </tr>
                            <tr>
                                <td>Harga Set</td>
                                <td>:</td>
                                <td>
                                    Rp. {{ number_format($product -> harga_nameset) }}
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>
                                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" wire:model="nama" value="{{ old('nama') }}" autocomplete="name" autofocus @if($product->is_ready !== 1) disabled @endif>

                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>Nomor</td>
                                <td>:</td>
                                <td>
                                    <input id="nomor" type="number" class="form-control @error('nomor') is-invalid @enderror" wire:model="nomor" value="{{ old('nomor') }}" autocomplete="name" autofocus @if($product->is_ready !== 1) disabled @endif>

                                    @error('nomor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </td>
                            </tr>

                            @endif
                            <tr>
                                <td colspan="3">
                                    <button type="submit" class="btn btn-success btn-block" @if($product->is_ready !== 1) disabled @endif><i class="fas fa-shopping-cart"></i> Masukkan Keranjang</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>