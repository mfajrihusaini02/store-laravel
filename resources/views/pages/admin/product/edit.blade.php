@extends('layouts.admin')

@section('title')
    Product
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Product</h2>
                <p class="dashboard-subtitle">Edit Product</p>
            </div>
            <div class="dashbaord-content">
                <div class="row">
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('product.update', $item->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Nama Produk</label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $item->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Pemilik Produk</label>
                                                <select name="users_id" class="form-control">
                                                    <option value="" selected disabled>-- Pilih --</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Kategori Produk</label>
                                                <select name="categories_id" class="form-control">
                                                    <option value="" selected disabled>-- Pilih --</option>
                                                    <option value="{{ $item->categories_id }}" disabled>
                                                        {{ $item->category->name }}</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Harga Produk</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">Rp</span>
                                                    <input type="text" id="priceInput" name="price"
                                                        class="form-control"
                                                        value="{{ number_format($item->price, 0, ',', '.') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Deskripsi Produk</label>
                                                <textarea name="description" id="editor" cols="30" rows="10">{{ $item->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success px-5">Save Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
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
@endpush
