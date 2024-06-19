@extends('layouts.main')

@section('content')

<div class="carousel-inner" style="height: 120px;">
    <div class="carousel-item active">
        <img src="{{ Vite::asset('resources/images/bgcontact.png') }}" class="d-block w-100" alt="...">
    </div>
</div>

{{-- START CONTENT --}}
<div class="container-sm mt-5 mb-5 ">
    <form action="{{ route('suggestion.update', $suggestion->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row justify-content-center">
            <div class="p-5 bg-body-secondary rounded-3 border col-xl-6">

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show">
                            {{ $error }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endforeach
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <!-- Empty column on the left -->
                        <div class="card mb-4" style="height: 16vh; border: 1px solid #A52A2A;">

                                <ul class="list-group ms-3 small mt-2">
                                    {{-- <li class="list-group-item"> --}}
                                    <i class="bi bi-envelope-fill fs-4"></i>
                                    <li class="list-group"> <strong>Mail Address</strong></li>
                                    <li class="list-group"> <strong>ITTSCoffee@gmail.com</strong></li>
                                </ul>
                            </div>
                            <div class="card mb-4" style="height: 16vh; border: 1px solid #A52A2A;">
                                <ul class="list-group ms-3 small mt-2">
                                    {{-- <li class="list-group-item"> --}}
                                    <i class="bi bi-telephone-fill fs-4"></i>
                                    <li class="list-group "><strong>Phone Number</strong></li>
                                    <li class="list-group"><strong>+62 812-3456-7890</strong></li>
                                </ul>
                            </div>
                            <div class="card mb-4" style="height: 16vh; border: 1px solid #A52A2A;">
                                <ul class="list-group ms-3 small mt-2">
                                    {{-- <li class="list-group-item"> --}}
                                    <i class="bi bi-geo-alt-fill fs-4"></i>
                                    <li class="list-group"> <strong>Contact Address</strong></li>
                                    <li class="list-group"> <strong>Jl. Ketintang No.156</strong> </li>
                                </ul>
                            </div>

                        </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h4>Edit Suggestion</h4>
                        </div>
                        <div class="mb-3" style="border: 1px solid #A52A2A; border-radius: 7px;">
                            <input class="form-control" type="text" name="name" id="name"
                                value="{{ old('name', $suggestion->name) }}" placeholder="Enter Name" style="height: 6vh;">
                        </div>
                        <div class="mb-3" style="border: 1px solid #A52A2A; border-radius: 7px;">
                            <input class="form-control" type="text" name="email" id="email" value="{{ old('email', $suggestion->email) }}"
                                placeholder="Enter Email" style="height: 6vh;">
                        </div>
                        <div class="mb-2" style="border: 1px solid #A52A2A; border-radius: 7px;">
                            <textarea class="form-control resize-none" name="message" id="message" rows="6"
                                placeholder="Enter Your Suggestion">{{ old('message', $suggestion->message) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit"
                                class="btn btn-danger btn-lg d-flex align-items-center justify-content-center"
                                style="width: 60px; height: 30px;">
                                <span style="font-size: 14px;">Update</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="d-flex justify-content-center">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.3903265077283!2d112.72662707335446!3d-7.309971792697908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbf613ba5dd5%3A0xe15ebdec39ca0293!2sITTS%20Coffee!5e0!3m2!1sen!2sid!4v1689754225696!5m2!1sen!2sid"
                                width="470" height="200" style="border:1;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
{{-- END CONTENT --}}
@endsection
