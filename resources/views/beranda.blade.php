@extends('layouts.main')

@section('container')


<h3 class="mb-4 text-center">{{ $title }}</h3>

<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/">
            @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">

            @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>

<div class="d-flex justify-content-end">
    {{ $beranda->links() }}
</div>


@if ($beranda->count())
<div class="card mb-3">
    @if ($beranda[0]->image)
    <div style="max-height: 300px;  overflow:hidden">
        <img src="{{ asset('storage/'. $beranda[0]->image) }}" alt="{{ $beranda[0]->category->name }} " class="mx-auto d-block" style="max-height:300px;">
    </div>
    @else
    <img src="https://source.unsplash.com/1200x400?{{ $beranda[0]->category->name }}" class="card-img-top" alt="{{ $beranda[0]->category->name }}"></a>
    @endif
    <a href="/beranda/{{ $beranda[0]->slug }}" class="text-decoration-none text text-dark">
        <div class="card-body text-center">
            <h3 class="card-title"><a href="/beranda/{{ $beranda[0]->slug }}" class="text-decoration-none text text-dark">{{ $beranda[0]->title }}</a></h3>
            <p>
                <small class="text-muted">
                    Kategori | <a href="/?category={{ $beranda[0]->category->slug }}" class="text-decoration-none">{{ $beranda[0]->category->name }}</a>
                    <!-- {{ $beranda[0]->created_at->diffForHumans() }} -->
                </small>
            </p>
            <p class="card-text">{{ $beranda[0]->excerpt }}</p>
            <a href="/beranda/{{ $beranda[0]->slug }}" class="text-decoration-none btn btn-primary"> Click Me </a>
        </div>
</div>

<div class="container">
    <div class="row">
        @foreach ($beranda->skip(1) as $beranda)
        <div class="col-md-4 mb-3">
            <div class="card" style="height:18cm">
                <div class="position-absolute px-3 py-2" style="background-color:rgba(0, 0, 0, 0.5)">
                    <a href="/?category={{ $beranda->category->slug }}" class="text-decoration-none text-white">{{ $beranda->category->name }}</a>
                </div>
                <a href="/beranda/{{ $beranda->slug }}">

                    @if ($beranda->image)
                    <img src="{{ asset('storage/'. $beranda->image) }}" alt="{{ $beranda->category->name }}" class="img-fluid">
                    @else
                    <img src="https://source.unsplash.com/500x450?{{ $beranda->category->name }}" class="card-img-top" alt="{{ $beranda->category->name }}"></a>
                @endif

                <div class="card-body">
                    <h5 class="card-title"><a href="/beranda/{{ $beranda->slug }}" class="text-decoration-none text text-dark">{{$beranda->title}}</a></h5>
                    <p>
                        <small class="text-muted">
                            <i class="fa fa-list"></i> <a href="/?category={{ $beranda->category->slug }}" class="text-decoration-none">{{ $beranda->category->name }}</a>

                            | <i class="fa fa-clock"></i> {{ $beranda->created_at->diffForHumans() }}
                            | Stok {{ $beranda->stok }}
                        </small>

                    </p>

                    <p class="card-text">{{ $beranda->excerpt }}</p>


                    <hr>
                    <div class="d-flex justify-content-between">
                        <div class="float-start">

                            <p class="card-text"><i class="fa fa-tags"></i> {{ 'Rp. '.number_format($beranda->harga,2,',','.') }}</p>
                        </div>
                        <div class="float-end">

                            <a href="/beranda/{{ $beranda->slug }}" class="btn btn-primary"><i class="fa fa-search"></i> Detail</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@else
<p class="text-center fs-5">Post Tidak Ditemukan</p>
@endif

<small class="d-block mt-5 text-muted text-center">&copy <script>
        document.write(new Date().getFullYear())
    </script> | Camp Outdoor</small>




@endsection