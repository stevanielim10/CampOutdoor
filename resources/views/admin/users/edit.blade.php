@extends('admin.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Account</h1>
</div>
<div class="row">
    <div class="col-lg-8 ">

        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <form action="{{ route('users.update',['user' => $user->id]) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
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
                <label for="role">Role</label>
                <select name="role" class="form-select">
                    <option value="">Role</option>
                    @foreach ($role as $rl)
                    <option value="{{ $rl->id }}" {{ ($rl->id == $user->role_id) ? 'selected' : '' }}>{{ Str::ucfirst($rl->role) }}</option>
                    @endforeach
                </select>
                @error('role')
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




            <button type="submit" class="btn btn-info mt-4">Submit</button>
        </form>

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
