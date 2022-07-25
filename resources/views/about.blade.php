@extends('layouts.main')

@section('container')

<div class="text-center">
    <h1> Tentang Kami </h1>
    <img src="img/{{ $image }}" alt="{{ $name }}" width="250" class="rounded-circle border border-dark border-3 my-3">
    <h3>{{ $name }}</h3>
    <p>{{ $nomor }}</p>
</div>
<div class="text-justify">
    <p>Berawal dari sebuah komunitas non profit yang bergerak di bidang kegiatan di alam bebas amatir di kota Bekasi, diantara beberapa partisipannya mempunyai ide untuk membuka sebuah usaha yang masih berbau kegiatan alam bebas. Seiring berjalan waktu dan gayung bersambut, usaha yang berdiri pada tanggal 25 May 2022 ini bertransformasi dan memiliki nama "Camp Outdoor" .

        Saat pertama berdiri nama yang kami pilih yaitu "Rookie Monkey", namun karena nama yang kurang familiar, akhirnya kami memutuskan untuk mengganti nama seperti yang sekarang kawan-kawan kenal yaitu "Camp Outdoor". Camp sendiri selain nama sebuah camping, diambil pula dari nama gang rumah menjadi tempat usaha kecil kami. Sekarang Camp Outdoor dikelola oleh 5 orang dan semoga masih akan terus berkembang.

        Usaha utama yang kami jalani sekarang adalah jasa penyewaan alat camping, selain itu kami juga mencoba mengembangkan jasa pemanduan naik gunung dan jasa pembuatan pakaian outdoor. Terima kasih. Salam lestari.

    </p>
</div>
<div class="text-center">
    <small class="d-block mt-5 text-muted text-center">&copy <script>
            document.write(new Date().getFullYear())
        </script> | Camp Outdoor</small>
</div>

@endsection