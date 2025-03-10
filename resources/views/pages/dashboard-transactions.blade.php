@extends('layouts.dashboard')

@section('title')
    Store Dashboard Transaction Page
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Transactions</h2>
                <p class="dashboard-subtitle">
                    Big result start from the small one
                </p>
            </div>
            <div class="dashbaord-content">
                <div class="row">
                    <div class="col-12 mt-2">
                        <ul class="nav nav-pills mb-3" id="pills-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="pills-sell-tab" data-toggle="pill" href="#pills-sell"
                                    role="tabs" aria-controls="pill-sell" aria-selected="true">Sell Product</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-buy-tab" data-toggle="pill" href="#pills-buy" role="tabs"
                                    aria-controls="pill-buy" aria-selected="true">Buy Product</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-sell" role="tabpanel"
                                aria-labelledby="pills-sell-tab">
                                @foreach ($sellTransactions as $item)
                                    <a href="{{ route('dashboard-transaction-details', $item->id) }}"
                                        class="card card-list d-block">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <img src="{{ Storage::url($item->product->galleries->first()->photos ?? '') }}"
                                                        class="w-75" alt="" />
                                                </div>
                                                <div class="col-md-4">{{ $item->product->name }}</div>
                                                <div class="col-md-3">{{ $item->product->user->store_name }}</div>
                                                <div class="col-md-3">
                                                    {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y H:i:s') }}
                                                </div>
                                                <div class="col-md-1 d-none d-md-block">
                                                    <img src="/images/dashboard-arrow-right.svg" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="pills-buy" role="tabpanel" aria-labelledby="pills-buy-tab">
                                @foreach ($buyTransactions as $item)
                                    <a href="{{ route('dashboard-transaction-details', $item->id) }}"
                                        class="card card-list d-block">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <img src="{{ Storage::url($item->product->galleries->first()->photos ?? '') }}"
                                                        class="w-75" alt="" />
                                                </div>
                                                <div class="col-md-4">{{ $item->product->name }}</div>
                                                <div class="col-md-3">{{ $item->product->user->store_name }}</div>
                                                <div class="col-md-3">
                                                    {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y H:i:s') }}
                                                </div>
                                                <div class="col-md-1 d-none d-md-block">
                                                    <img src="/images/dashboard-arrow-right.svg" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
