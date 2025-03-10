@extends('layouts.admin')

@section('title')
    Product
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Transaction</h2>
                <p class="dashboard-subtitle">List of Transactions</p>
            </div>
            <div class="dashbaord-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Code</th>
                                                <th>Nama</th>
                                                <th>Harga</th>
                                                <th>Status</th>
                                                <th>Tanggal Dibuat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
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
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}'
            },
            columns: [{
                    data: null,
                    name: 'id',
                    width: '5%',
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    data: 'code',
                    name: 'code'
                },
                {
                    data: 'user.name',
                    name: 'user.name'
                },
                {
                    data: 'total_price',
                    name: 'total_price',
                    render: function(data, type, row) {
                        // Format harga dengan pemisah ribuan dan dua desimal
                        let formattedPrice = new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                            minimumFractionDigits: 2
                        }).format(data);

                        // Tambahkan badge warna hijau
                        return `<div class="badge bg-success p-3 text-white">${formattedPrice}</div>`;
                    }
                },
                {
                    data: 'transaction_status',
                    name: 'transaction_status',
                    render: function(data, type, row) {

                        // Tambahkan badge warna hijau
                        return `<div class="badge p-3 text-white ${data == 'SUCCESS' ? 'bg-success' : data == 'PENDING' ? 'bg-warning' : 'bg-danger'}">${data}</div>`;
                    }
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searcable: false,
                    width: '15%'
                }
            ]
        })
    </script>
@endpush
