@extends('admin.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Transaction</h1>
</div>


<div class="table-responsive col-lg-12">

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
                <th scope="col">User</th>
                <th scope="col">Status</th>
                <td scope="col" class="text-center"><i class="fa fa-cog"></i></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaction as $tr)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tr->code }}</td>
                <td>{{ $tr->post->title }}</td>
                <td>{{ $tr->tgl_pinjam }}</td>
                <td>{{ $tr->tgl_kembali }}</td>
                <td>{{ $tr->user->name }}</td>
                <td>{{ $tr->status_transaksi }}</td>
                <td class="text-center">
                    <a href="{{ route('admin.transaction.show',['code' => $tr->code]) }}" class="btn btn-info"> <i class="fa fa-pencil-alt"></i> Action</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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

@endsection
