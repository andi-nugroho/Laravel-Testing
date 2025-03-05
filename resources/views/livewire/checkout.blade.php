<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products') }}" class="text-dark">List Jersey</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('keranjang') }}" class="text-dark">Keranjang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
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
            <a href="{{ route('keranjang') }}" class="btn btn-sm btn-dark kiri"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <h4 align="center">Informasi Pembayaran</h4>
            <hr>
            <p>Untuk pembayaran bisa lakukan transfer pada rekening di bawah ini dengan nominal sebesar : <strong>Rp. {{ number_format($total_harga) }}</strong></p>
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
        <div class="col">
            <h4 align="center">Informasi Pengiriman</h4>
            <hr>
            <form wire:submit.prevent="checkout">

                <div class="form-group">
                    <label for="">No. Hp</label>
                    <input id="nohp" type="text" class="form-control @error('nohp') is-invalid @enderror" wire:model="nohp" value="{{ old('nohp') }}" autocomplete="name" autofocus>

                    @error('nohp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <br>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea wire:model="alamat" class="form-control @error('nama') is-invalid @enderror"></textarea>

                    @error('alamat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-success btn-block">Checkout  <i class="fas fa-arrow-right"></i></button>
            </form>
        </div>
    </div>
</div>