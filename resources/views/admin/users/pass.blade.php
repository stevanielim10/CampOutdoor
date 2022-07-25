@extends('admin.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Password Account</h1>
</div>
<div class="row">
    <div class="col-lg-8 ">

        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <form action="{{ route('admin.pass', ['user' => $user->id]) }}" method="post">
            @method('PATCH')
            @csrf



            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="New Password" class="form-control mt-2">
                @error('password')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirm">Password Confirm</label>
                <input type="password" name="password_confirm" placeholder="Password Confirm" class="form-control mt-2">
                @error('password_confirm')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>






            <button type="submit" class="btn btn-warning mt-4">Submit</button>
        </form>

    </div>
</div>
@endsection
