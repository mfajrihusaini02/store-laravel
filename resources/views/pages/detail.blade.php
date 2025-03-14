@extends('layouts.app')

@section('title')
    Store Detail Page
@endsection

@section('content')
    <div class="page-content page-details">
        <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Product Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <section class="store-gallery mb-3" id="gallery">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8" data-aos="zoom-in">
                        <transition name="slide-fade" mode="out-in">
                            <img :src="photos[activePhoto].url" :key="photos[activePhoto].id" class="w-100 main-image"
                                alt="" />
                        </transition>
                    </div>
                    <div class="col-lg-2">
                        <div class="row">
                            <div v-for="(photo, index) in photos" :key="photo.id" data-aos="zoom-in"
                                data-aos-delay="100" class="col-3 col-lg-12 mt-2 mt-lg-0">
                                <a href="#" @click="changeActive(index)">
                                    <img :src="photo.url" class="w-100 thumbnail-image"
                                        :class="{ active: index == activePhoto }" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="store-details-container" data-aos="fade-up">
            <section class="store-heading">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <h1>{{ $products->name }}</h1>
                            <div class="owner">By {{ $products->user->store_name ?? '-' }}</div>
                            <div class="price">Rp {{ number_format($products->price, 0, ',', '.') }}</div>
                        </div>
                        <div class="col-lg-2" data-aos="zoom-in">
                            @auth
                                <form action="{{ route('detail-add', $products->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="btn btn-success px-4 text-white btn-block mb-3">Add to
                                        Cart</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-success px-4 text-white btn-block mb-3">Sign In to
                                    Add</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </section>
            <section class="store-description">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            {!! $products->description !!}
                        </div>
                    </div>
                </div>
            </section>
            <section class="store-review">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8 mt-3 mb-3">
                            <h5>Customer Review (3)</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <ul class="list-unstyled">
                                <li class="media">
                                    <img src="/images/icons-testimonial-1.png" alt="" class="mr-3 rounded-circle" />
                                    <div class="media-body">
                                        <h5 class="mt-2 mb-1">Hazza Risky</h5>
                                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem
                                        Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum.
                                    </div>
                                </li>
                                <li class="media">
                                    <img src="/images/icons-testimonial-2.png" alt="" class="mr-3 rounded-circle" />
                                    <div class="media-body">
                                        <h5 class="mt-2 mb-1">Hazza Risky</h5>
                                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem
                                        Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum.
                                    </div>
                                </li>
                                <li class="media">
                                    <img src="/images/icons-testimonial-3.png" alt="" class="mr-3 rounded-circle" />
                                    <div class="media-body">
                                        <h5 class="mt-2 mb-1">Hazza Risky</h5>
                                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem
                                        Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum.
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
        var gallery = new Vue({
            el: "#gallery",
            mounted() {
                AOS.init();
            },
            data: {
                activePhoto: 0,
                photos: [
                    @foreach ($products->galleries as $gallery)
                        {
                            id: {{ $gallery->id }},
                            url: "{{ Storage::url($gallery->photos) }}",
                        },
                    @endforeach
                ],
            },
            methods: {
                changeActive(id) {
                    this.activePhoto = id;
                },
            },
        });
    </script>
@endpush
