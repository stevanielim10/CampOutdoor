@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-4">
        <main class="form-registration">
            <form action="/register" method="post" enctype="multipart/form-data">
                @csrf

              <h3 class="h3 mb-5 fw-normal text-center">Registration</h3>

              <input type="hidden" name='role_id' value="2">
              <div class="form-floating mb-2">
                <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror"
                id="name" placeholder="Name" autofocus required value="{{ old('name') }}">
                <label for="name">Name</label>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-floating mb-2">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                id="username" placeholder="Usename" required value="{{ old('username') }}">
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-floating mb-2">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                id="email" placeholder="name@example.co." required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-floating mb-2">
                <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror"
                id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="image" class="form-label">Gambar Data Diri</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"
                    onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

              <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3">Already Registered? <a href="/login">Click Here</a></small>
            <small class="d-block mt-5 text-muted text-center">&copy <script>document.write(new Date().getFullYear())</script> | Camp Outdoor</small>
        </main>
    </div>
</div>

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
