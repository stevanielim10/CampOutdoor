@extends('admin.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Posts</h1>
</div>

@if (session()->has ('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<div class="table-responsive col-lg-10">
  <a href="/admin/posts/create" class="btn btn-primary mb-3"><span data-feather="plus"></span> Create New Post</a>
  <table class="table table-striped table-sm" id="dataTable">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Harga</th>
        <th scope="col">Stok</th>
        <th scope="col" class="text-center"><i class="fa fa-cogs"></i></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $beranda)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $beranda->title }}</td>
        <td>{{ $beranda->category->name }}</td>
        <td>{{ 'Rp. '.number_format($beranda->harga,2,',',',') }}</td>
        <td>{{ $beranda->stok }}</td>
        <td class="text-center">
          <a href="/admin/posts/{{ $beranda->id }}" class="badge bg-info">
            <span data-feather="eye"></span></a>
          <a href="/admin/posts/{{ $beranda->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
          <form action="/admin/posts/{{ $beranda->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus data?')"><span data-feather="x-circle"></span></button>
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
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>
@endsection

@endsection