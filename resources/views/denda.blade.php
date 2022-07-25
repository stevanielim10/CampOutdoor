@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-lg-12">
        <a href="{{ route('index') }}" class="btn btn-danger"> <i class="fas fa-arrow-left"></i> Kembali</a>
        <hr>
        <h1>Denda</h1>
        <strong>Jumlah Denda yang belum dibayar : {{ 'Rp. '.number_format($denda->where('status_denda','unpaid')->sum('jml_denda'),2,',','.') }}</strong>
        <br>
        <small>*) Silahkan hubungi <a href="{{ route('about') }}">admin</a> untuk membayar denda </small>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mx-auto">
        <div class="table-responsive">

            @if (session()->has ('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif


            <table class="table table-striped table-sm" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Code</th>
                        <th scope="col">Jumlah Denda</th>
                        <th scope="col">Status</th>
                        <th scope="col">Waktu</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($denda as $dd)
                    <tr>
                        <td width="30px">{{ $loop->iteration }}</td>

                        <td width="180px">
                            <a class="btn btn-link" href="{{ route('transaksi.show',['code' => $dd->transaction[0]->code]) }}">{{ $dd->transaction[0]->code }}</a>
                        </td>
                        <td>{{ 'Rp '.number_format($dd->jml_denda,2,',','.') }}</td>
                        <td>
                            @if ($dd->status_denda == 'paid')
                                <span class="badge bg-success">{{ Str::ucfirst($dd->status_denda) }}</span>
                            @endif

                            @if ($dd->status_denda == 'unpaid')
                                <span class="badge bg-secondary">{{ Str::ucfirst($dd->status_denda) }}</span>
                            @endif
                        </td>
                        <td>{{ $dd->created_at }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@section('style')
<link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bootstrap5.min.css') }}">
@endsection

@section('script')
<script src="{{ asset('vendor/jquery/jquery.min.js') }}
"></script>
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap5.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
@endsection

<small class="d-block mt-5 text-muted text-center">&copy; 2022 | Camp Outdoor</small>
@endsection
