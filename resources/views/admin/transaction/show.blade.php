@extends('admin.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"># {{ $transaction->code }} | {{ $transaction->post->title }}</h1>
</div>



<div class="row">
    <div class="col-lg-6">
        @if (session()->has ('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
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
            <form action="{{ route('admin.transaction.process',['code' => $transaction->code]) }}" method="post">
                @method('PUT')
                @csrf


                <input type="hidden" name="payment_id" value="{{ $payment->id }}">

                <div class="form-group">
                    <label for="payment_status" class="form-label">Payment Status</label>
                    <select name="payment_status" class="form-select">
                        @foreach ($payment_status as $ps)
                            @if ($payment->payment_status == 'paid')

                            <option value="{{ $ps }}" {{ ($payment->payment_status == $ps) ? 'selected' : '' }}>{{ $ps }}</option>
                            @break
                            @else

                            <option value="{{ $ps }}" {{ ($payment->payment_status == $ps) ? 'selected' : '' }}>{{ $ps }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="status_transaksi" class="form-label">Status Transaksi</label>
                    <select name="status_transaksi" class="form-select">
                        @foreach ($status_transaksi as $st)

                        <option value="{{ $st }}" {{ ($transaction->status_transaksi == $st) ? 'selected' : '' }}>{{ $st }}</option>
                        @endforeach
                    </select>
                </div>


                <button type="submit" class="btn btn-success mt-2">Proccess</button>
            </form>
        <hr>



    </div>
</div>








@endsection
