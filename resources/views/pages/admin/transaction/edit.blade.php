@extends('layouts.admin')

@section('title')
    Product
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Transaction</h2>
                <p class="dashboard-subtitle">Edit Transaction</p>
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
                                <form action="{{ route('transaction.update', $item->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Status Transaksi</label>
                                                <select name="transaction_status" class="form-control">
                                                    <option value="{{ $item->transaction_status }}" selected>
                                                        {{ $item->transaction_status }}</option>
                                                    <option value="" disabled>-----------</option>
                                                    <option value="PENDING">PENDING</option>
                                                    <option value="SHIPPING">SHIPPING</option>
                                                    <option value="SUCCESS">SUCCESS</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Total Transaksi</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">Rp</span>
                                                    <input type="text" id="priceInput" name="total_price"
                                                        class="form-control"
                                                        value="{{ number_format($item->total_price, 0, ',', '.') }}"
                                                        required>
                                                </div>
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
