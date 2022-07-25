@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-lg-12">

        <a href="{{ route('transaksi') }}" class="btn btn-danger"> <i class="fas fa-arrow-left"></i> Kembali</a>
        <hr>
        <h1>Transaction | # {{ $transaction->code }}</h1>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <h6>Produk</h6>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th width="200px">Code</th>
                    <td>:</td>
                    <td>{{ $transaction->code }}</td>
                </tr>
                <tr>
                    <th width="200px">Produk</th>
                    <td>:</td>
                    <td>{{ $transaction->post->title }}</td>
                </tr>
                <tr>
                    <th width="200px">Gambar</th>
                    <td>:</td>
                    <td>
                        @if ($transaction->post->image)
                        <img src="{{ asset('storage/'.$transaction->post->image) }}" width="500px" alt="">

                        @else
                        -
                        @endif
                    </td>
                </tr>

                <tr>
                    <th width="200px">Tanggal Pinjam</th>
                    <td>:</td>
                    <td>{{ $transaction->tgl_pinjam }}</td>
                </tr>
                <tr>
                    <th width="200px">Tanggal Kembali</th>
                    <td>:</td>
                    <td>{{ $transaction->tgl_kembali }}</td>
                </tr>
                <tr>
                    <th width="200px">Status</th>
                    <td>:</td>
                    <td>{{ $transaction->status_transaksi }}</td>
                </tr>
                <tr>
                    <th width="200px">Waktu</th>
                    <td>:</td>
                    <td>{{ $transaction->created_at }}</td>
                </tr>
            </table>
        </div>
        <div class="mb-4"></div>
        <h6>Data Peminjam</h6>
        <div class="table-responsive">
            <table class="table table-striped">

                <tr>
                    <th width="200px">User</th>
                    <td>:</td>
                    <td>{{ $transaction->user->name }}</td>
                </tr>
                <tr>
                    <th width="200px">Email</th>
                    <td>:</td>
                    <td>{{ $transaction->user->email }}</td>
                </tr>
                <tr>
                    <th width="200px">Alamat</th>
                    <td>:</td>
                    <td>{{ $transaction->user->alamat }}</td>
                </tr>

            </table>
        </div>
        <div class="mb-4"></div>
        <h6>Pembayaran</h6>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th width="200px">Harga</th>
                    <td>:</td>
                    <td>{{ 'Rp. '.number_format($transaction->post->harga,2,',','.').'/hari' }}</td>
                </tr>
                <tr>
                    <th width="200px">Total</th>
                    <td>:</td>
                    <td>{{ 'Rp. '.number_format($total,2,',','.') }}</td>
                </tr>
                <tr>
                    <th width="200px">Payment Method</th>
                    <td>:</td>
                    <td>{{ $payment->paymentmethod->method }}</td>
                </tr>
                <tr>
                    <th width="200px">Bukti Transaksi</th>
                    <td>:</td>
                    <td>
                        @if ($payment->bukti_transaksi)
                        <img src="{{ asset('storage/'.$payment->bukti_transaksi) }}" width="500px" alt="">

                        @else
                        -
                        @endif
                    </td>
                </tr>
                <tr>
                    <th width="200px">Status</th>
                    <td>:</td>
                    <td>
                        @if ($payment->payment_status == 'paid')
                        <span class="badge bg-success">Paid</span>
                        @endif

                        @if ($payment->payment_status == 'unpaid')
                        <span class="badge bg-danger">Unpaid</span>
                        @endif
                    </td>
                </tr>
            </table>
        </div>

        <hr>
        <form action="{{ route('transaksi.pay') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="payment_id" value="{{ $payment->id }}">
            <div class="form-group">
                <label for="image" class="form-label">Upload Bukti Pembayaran</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"
                    onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark mt-2"> <i class="fa fa-upload"></i> Upload</button>
        </form>
        <hr>




    </div>
</div>

<small class="d-block mt-5 text-muted text-center">&copy; 2022 | Camp Outdoor</small>

@section('script')
<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block';

        const ofReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);

        ofReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection
@endsection
