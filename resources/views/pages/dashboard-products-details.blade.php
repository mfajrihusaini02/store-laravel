@extends('layouts.dashboard')

@section('title')
    Store Dashboard Product Detail Page
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">{{ $product->name }}</h2>
                <p class="dashboard-subtitle">Product Details</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('dashboard-product-update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Product Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $product->name }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Price</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">Rp</span>
                                                    <input type="text" id="priceInput" name="price"
                                                        class="form-control"
                                                        value="{{ number_format($product->price, 0, ',', '.') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Category</label>
                                                <select name="categories_id" class="form-control">
                                                    <option value="" disabled>-- Pilih --</option>
                                                    <option value="{{ $product->categories_id }}" selected>
                                                        {{ $product->category->name }}</option>
                                                    @foreach ($categories as $category)
                                                        @if ($category->id == $product->categories_id)
                                                            @continue
                                                        @endif
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Description</label>
                                                <textarea name="description" id="editor" cols="30" rows="10">{!! $product->description !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success px-5 btn-block">
                                                Update Product
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($product->galleries as $gallery)
                                        <div class="col-md-4">
                                            <div class="gallery-container">
                                                <img src="{{ Storage::url($gallery->photos ?? '') }}" alt=""
                                                    class="w-100" />
                                                <a href="{{ route('dashboard-product-gallery-delete', $gallery->id) }}"
                                                    class="delete-gallery">
                                                    <img src="/images/icon-delete.svg" alt="" />
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="{{ route('dashboard-product-gallery-upload') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="products_id" value="{{ $product->id }}">
                                            <input type="file" name="photos" id="file" style="display: none"
                                                onchange="form.submit()" />
                                            <button type="button" class="btn btn-secondary btn-block mt-3"
                                                onclick="thisFileUpload()">
                                                Add Photo
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace("editor");
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const priceInput = document.getElementById("priceInput");

            // Format angka saat input berubah
            priceInput.addEventListener("input", function(e) {
                let value = this.value.replace(/\D/g, ""); // Hapus semua karakter non-angka
                value = new Intl.NumberFormat("id-ID").format(value); // Format angka dengan separator
                this.value = value;
            });

            // Menghapus separator saat form dikirim agar tetap angka murni
            priceInput.form.addEventListener("submit", function() {
                priceInput.value = priceInput.value.replace(/\./g, ""); // Hapus titik separator
            });
        });
    </script>
    <script>
        function thisFileUpload() {
            document.getElementById("file").click();
        }
    </script>
@endpush
