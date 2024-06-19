@extends('layouts.main')

@section('content')
    @if (session('message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Header - set the background image for the header in the line below-->
    {{-- <header class="py-5 bg-image-full position-relative" style="background-image: url('https://coolwallpapers.me/th700/5255650-coffee-shop-cafe-flag-counter-coffee-shop-business-bistro-coffee-machine-caf-bar-coffee-house-local-american-flag-america-american-expresso-bestro-food-relaxation-free-pictures.jpg')">
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.5);"></div>
        <div class="text-center my-5 position-relative">
            <h1 style="font-size: 200px" class="text-white fs-1 fw-bolder">TEKOP</h1>
            <p class="text-white mb-0 fs-4">Greatest Coffee Shope In Surabaya</p>
        </div>
    </header> --}}


    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">TEKOP <br>(Telkom University Coffee Surabaya)
                    </h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white mb-5">Start Bootstrap can help you build better websites using the Bootstrap
                        framework! Just download a theme and start customizing, no strings attached!</p>
                    <a class="btn btn-primary btn-xl" href="{{ route('about') }}">Find Out More</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Content section-->
    <section class="py-5">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2>TEKOP: Setiap Cangkir Menceritakan Kisah</h2>
                    <p class="lead">TEKOP bukan hanya tempat untuk menikmati secangkir kopi. Di sini, setiap cangkir
                        kopi yang kami sajikan menceritakan sebuah kisah. Dari biji kopi yang dipilih dengan hati-hati,
                        proses pembuatan yang penuh perhatian, hingga penyajian yang hangat dan menarik, kami berusaha untuk
                        memberikan pengalaman minum kopi terbaik bagi setiap pelanggan kami.
                    </p>
                    <p class="mb-0">Kami percaya bahwa kopi bukan hanya tentang rasa, tetapi juga tentang pengalaman. Oleh
                        karena itu, kami berusaha untuk membuat setiap kunjungan ke TEKOP menjadi sebuah pengalaman
                        yang tak terlupakan. Baik itu pertemuan bisnis, kencan romantis, atau sekadar bersantai sendiri,
                        kami berusaha untuk membuat setiap momen menjadi spesial.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Section 3 --}}
    <div class="container-fluid">
        <div class="px-lg-5">

            <!-- For demo purpose -->
            <div
                style="width: 100%; height: 300px; display: flex; align-items: center; justify-content: center; position: relative;">
                <img src="{{ Vite::asset('resources/images/banner.png') }}" alt="Banner Image"
                    style="width: 100%; height: auto; position: absolute; left: 0; right: 0; margin: auto;">
            </div>

            <!-- End -->

            <div class="row">
                <!-- Gallery item -->
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
                    @if (!empty($products) && count($products) > 0)
                        @foreach ($products as $product)
                            <div class="col">
                                <div class="bg-white rounded shadow-sm">
                                    <div class="crop-image-container">
                                        <img src="{{ asset('storage/images/' . $product->image) }}" alt=""
                                            class="img-fluid card-img-top crop-image"
                                            style="object-fit: cover; height: 200px;">
                                    </div>
                                    <div class="p-4">
                                        <h5><a href="#" class="text-dark">{{ $product->name }}</a></h5>
                                        <p class="small text-muted mb-0">{{ $product->subKategory->name }}</p>
                                        <div
                                            class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                                            <p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span
                                                    class="font-weight-bold">Harga: Rp
                                                    {{ number_format($product->price, 0, ',', '.') }}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <!-- End -->
            </div>
        </div>
    </div>

    <!-- Section-->
    {{-- <section class="py-2">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @if (!empty($products) && count($products) > 0)
                    @foreach ($products as $product)
                        <div class="col mb-5">
                            <div class="card h-100 shadow-sm rounded">
                                <img src="{{ asset('storage/images/' . $product->image) }}" class="card-img-top"
                                    alt="Gambar" style="object-fit: cover; height: 200px;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                    <p class="card-text">{{ $product->subKategory->name }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section> --}}
@endsection
