@extends('admin.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Account</h1>
</div>

@if (session()->has ('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
     {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif



<div class="table-responsive">
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3"><span data-feather="plus"></span> Create New Account</a>
  <table class="table table-striped table-sm" id="dataTable">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col" class="text-center"><i class="fa fa-cogs"></i></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{!! ($user->role_id == 1) ? '<span class="badge bg-primary">Admin</span>' : '<span class="badge bg-secondary">User</span>' !!}</td>
        <td class="text-center">
          {{-- <a href="/admin/users/{{ $user->id }}" class="badge bg-info">
          <span data-feather="eye"></span></a> --}}

            <a href="{{ route('admin.pass.update',['user' => $user->id]) }}" class="btn btn-warning"><i class="fa fa-lock"></i></a>

          <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-info"><i class="fa fa-edit"></i></a>
          <form action="/admin/users/{{ $user->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger border-0" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fa fa-trash"></i></button>
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
    $(document).ready(function(){
        $('#dataTable').DataTable();
    });
</script>
@endsection

@endsection
