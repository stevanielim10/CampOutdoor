@extends('layouts.main')

@section('container')

<h1 class="mb-5">{{ $title }}</h1>

<div class="container">
    <div class="row">
        @foreach ( $categories as $category )
            <div class="col-md-4 mb-2">
                <a href="/?category={{ $category->slug }}">
                    <div class="card bg-dark text-white">
                        @if ($category->image)

                        <img src="{{ asset('storage/'.$category->image) }}" class="card-img" alt="{{ $category->name }}">
                        @else

                        <img src="https://source.unsplash.com/500x450?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
                        @endif
                        <div class="card-img-overlay d-flex align-items-center p-0">
                        <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color:rgba(0, 0, 0, 0.5)">{{ $category->name }}</h5>
                    </div>
                </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

<small class="d-block mt-5 text-muted text-center">&copy <script>document.write(new Date().getFullYear())</script> | Camp Outdoor</small>

@endsection
