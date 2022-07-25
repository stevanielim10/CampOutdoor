@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-lg-12">
        <a href="{{ route('index') }}" class="btn btn-danger"> <i class="fas fa-arrow-left"></i> Kembali</a>
        <hr>
        <h1>Transaction</h1>
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
                        <th scope="col">Product</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Tanggal Kembali</th>
                        <th scope="col">Status</th>
                        <td scope="col" class="text-center"><i class="fa fa-cog"></i></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaction as $tr)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tr->code }}</td>
                        <td>
                            <a href="{{ route('detail.post',['home' => $tr->post->slug]) }}">{{ $tr->post->title }}</a>
                        </td>
                        <td>{{ $tr->tgl_pinjam }}</td>
                        <td>{{ $tr->tgl_kembali }}</td>
                        <td>{{ $tr->status_transaksi }}</td>
                        <td class="text-center">
                            <a href="{{ route('transaksi.show',['code' => $tr->code]) }}" class="btn btn-info"> <i class="fa fa-pencil-alt"></i> Action</a>
                        </td>
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
