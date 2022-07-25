@extends('admin.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Payment Method</h1>
</div>
<div class="row">
    <div class="col-lg-8 ">

        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <form action="{{ route('admin.payment.method.update',['id' => $paymentmethod->id]) }}" method="post">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="method">Method</label>
                <input type="text" name="method" placeholder="Method" class="form-control mt-2" value="{{ $paymentmethod->method }}">
                @error('method')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-4">Submit</button>
        </form>

    </div>
</div>
@endsection
