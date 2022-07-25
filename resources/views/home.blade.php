@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h2 class="mb-3">{{ $beranda->title}}</h2>
            <hr>
            <p> <i class="fa fa-list"></i><a href="/?category={{ $beranda->category->slug }}"
                    class="text-decoration-none">
                    {{ $beranda->category->name }}</a> | <i class="fa fa-clock"></i>
                {{ $beranda->created_at->diffForHumans() }}
                | Stok {{ $beranda->stok }} | <i class="fa fa-tags"></i> {{ 'Rp. '.number_format($beranda->harga,2,',','.') }}
             </p>

            <hr>

            @if (session()->has ('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session()->has ('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif


            @if ($beranda->image)
            <div style="max-height: 500px; overflow:hidden">
                <img src="{{ asset('storage/'. $beranda->image) }}" alt="{{ $beranda->category->name }}"
                    class="img-fluid" width="100%">
            </div>
            @else
            <img src="https://source.unsplash.com/700x300?{{ $beranda->category->name }}"
                alt="{{ $beranda->category->name }}" width="100%" class="img-fluid">
            @endif

            <div class="my-3 fs-6" style="text-align: justify;">
                {!! $beranda->body !!}
            </div>
            <a href="/" class="bi bi-arrow-left btn btn-primary"> Back to Home</a>

            @if (session()->has('id_user'))
            <a href="" class="bi bi-basket btn btn-success" data-bs-toggle="modal" data-bs-target="#pinjam"> Pinjam</a>
            <div class="modal fade" id="pinjam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> <span class="text-primary">Pinjam</span>
                                produk ini</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('pinjam') }}" method="post">

                            @csrf
                            <input type="hidden" name="beranda_id" value="{{ $beranda->id }}">
                            <div class="modal-body">
                                <div class="form-group mb-2">
                                    <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                                    <input type="date" class="form-control" name="tgl_pinjam">
                                    @error('tgl_pinjam')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-2">
                                    <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                                    <input type="date" class="form-control" name="tgl_kembali">
                                    @error('tgl_kembali')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-2">
                                    <label for="payment_method" class="form-label">Payment Method</label>
                                    <select name="payment_method" class="form-select">

                                        @foreach ($paymentmethod as $py)
                                        <option value="{{ $py->id }}">{{ $py->method }}</option>
                                        @endforeach
                                    </select>
                                    @error('tgl_pinjam')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @endif

        </div>
    </div>
</div>

@section('script')
@if (Session::get('pinjam_error'))
<script>
    var pinjamModal = new bootstrap.Modal(document.getElementById('pinjam'));
    pinjamModal.show();
</script>
@endif
@endsection

@endsection
