@extends('layouts.main')

@section('content')
    {{-- carousel about --}}
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner" style="height: 120px;">
            <div class="carousel-item active">
                <img src="{{ Vite::asset('resources/images/bgabout.png') }}" class="d-block w-100" alt="...">
            </div>

            <div class="carousel-item">
                <img src="{{ Vite::asset('resources/images/bgabout2.png') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previouss</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- carousel about --}}


    {{-- START CONTENT --}}
    <div class="container-sm mt-5 mb-5 ">
        @csrf
        <div class="row justify-content-center">
            <div class="p-5 bg-body-secondary rounded-3 border col-xl-6">
                <h1 style="text-align: center; font-weight: bold;">TEKOP <br>
                    (Telkom University Coffee Surabaya)</h1>
                <hr>
                <p style="text-align: justify">TEKOP
                    (Telkom University Coffee Surabaya) adalah tempat nongkrong yang asik dengan menyajikan minuman
                    berkualitas tinggi dengan cita
                    rasa yang unik dan menyenangkan. Pada kopi-nya sendiri kami menggunakan biji kopi pilihan yang diperoleh
                    dari berbagai daerah penghasil kopi terbaik di dunia. Dengan kombinasi antara keahlian kopi yang
                    mendalam, teknologi modern, dan dedikasi terhadap kepuasan pelanggan, kami berusaha untuk memberikan
                    pengalaman kopi yang luar biasa kepada setiap pelanggan kami.
                    <br>
                    <br>
                    Produk dan Layanan:
                    <br>
                    1. Kopi Segar: TEKOP
                    (Telkom University Coffee Surabaya) menawarkan berbagai macam jenis kopi segar yang dipanggang secara
                    teratur
                    untuk menjaga kualitasnya. Kami menyediakan biji kopi single origin dan campuran dengan berbagai tingkat
                    kepekatan dan karakteristik rasa yang berbeda.
                    <br>
                    2. Minuman Khas: Selain kopi hitam, TEKOP
                    (Telkom University Coffee Surabaya) juga menyajikan beragam minuman khas seperti cappuccino, latte,
                    espresso, mocaccino, dan banyak lagi. Kami menggunakan teknik penyajian yang terampil dan bahan-bahan
                    berkualitas tinggi untuk menciptakan minuman kopi yang lezat.
                    <br>
                    3. Camilan dan Makanan Ringan: Kami juga menawarkan camilan dan makanan ringan yang cocok untuk menemani
                    secangkir kopi. Mulai dari roti panggang, kue-kue, croissant, hingga sandwich, kami menyajikan pilihan
                    yang beragam untuk memenuhi selera pelanggan.

                </p>
            </div>
        </div>

    </div>

    {{-- END CONTENT --}}
@endsection
