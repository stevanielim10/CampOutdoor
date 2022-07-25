@extends('admin.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Denda</h1>
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
                <th scope="col">User</th>
                <th scope="col">Jumlah Denda</th>
                <th scope="col">Status</th>
                <th scope="col">Waktu</th>
                <td scope="col" class="text-center"><i class="fa fa-cog"></i></td>
            </tr>
        </thead>
        <tbody>
            {{-- @dd($denda) --}}
            @foreach ($denda as $dd)
            <tr>
                <td width="30px">{{ $loop->iteration }}</td>

                <td width="180px">
                    <a class="btn btn-link" href="{{ route('admin.transaction.show',['code' => $dd->transaction[0]->code]) }}">{{ $dd->transaction[0]->code }}</a>
                </td>
                <td>{{ $dd->transaction[0]->user->name }}</td>
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
                <td class="text-center">
                    @if ($dd->status_denda == 'unpaid')

                    <a href="{{ route('admin.denda.proccess',['id' => $dd->id]) }}" class="btn btn-success"> <i class="fa fa-money-bill"></i> Bayar</a>
                    @else
                    <button type="button" class="btn btn-success" disabled> <i class="fa fa-money-bill"></i> Bayar</button>

                    @endif
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
