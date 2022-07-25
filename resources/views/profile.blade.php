@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-lg-12">
        <a href="{{ route('index') }}" class="btn btn-danger"> <i class="fas fa-arrow-left"></i> Kembali</a>
        <hr>
        <h4>Profile</h4>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mx-auto">
        <div class="table-responsive">

            @if (session()->has ('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">

                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="Name" class="form-control mt-2" value="{{ $user->name }}">
                    @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="Username" class="form-control mt-2" value="{{ $user->username }}">
                    @error('username')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Email" class="form-control mt-2" value="{{ $user->email }}">
                    @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>



                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control">{{ $user->alamat }}</textarea>
                    @error('alamat')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image" class="form-label">Gambar Data Diri</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5 d-block" src="{{ asset('storage/'.$user->image) }}">
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"
                        onchange="previewImage()">
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>




                <button type="submit" class="btn btn-info mt-4"> <i class="fa fa-user-cog"></i> Edit Profile</button>
            </form>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <hr>
        <h4>Ganti Password</h4>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('profile.pass') }}" method="post">
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


            <button type="submit" class="btn btn-warning mt-4"> <i class="fa fa-user-lock"></i> Ganti Password</button>
        </form>
    </div>
</div>



<small class="d-block mt-5 text-muted text-center">&copy; 2022 | Camp Outdoor</small>
@section('script')
<script>
    document.addEventListener('trix-file-accept', function (e) {
        e.preventDefault();
    });

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block';

        const ofReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);

        ofReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection
@endsection
