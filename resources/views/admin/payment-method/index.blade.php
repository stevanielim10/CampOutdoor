@extends('admin.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Payment Method</h1>
</div>




<div class="table-responsive col-lg-7">

    @if (session()->has ('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <a href="{{ route('admin.payment.method.create') }}" class="btn btn-primary mb-3"><span data-feather="plus"></span> Create New</a>
    <table class="table table-striped table-sm" id="dataTable">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Method</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paymentmethod as $pm)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pm->method }}</td>
                <td>
                    {{-- <a href="/admin/categories/{{ $category->id }}" class="badge bg-info">
                    <span data-feather="eye"></span></a> --}}
                    <a href="{{ route('admin.payment.method.edit',['id' => $pm->id]) }}" class="badge bg-warning"><span
                            data-feather="edit"></span></a>
                    <form action="{{ route('admin.payment.method.destroy',['id' => $pm->id]) }}" method="post"
                        class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0"
                            onclick="return confirm('Yakin ingin menghapus data?')"><span
                                data-feather="x-circle"></span></button>
                    </form>
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
