@extends('layouts.dashboard')

@section('title')
    Store Account Page
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">My Account</h2>
                <p class="dashboard-subtitle">Update your current profile</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <form action="">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Your Name</label>
                                                <input type="text" class="form-control" value="Fajri" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Your Email</label>
                                                <input type="email" class="form-control" value="fajri@gmail.com" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="addressOne">Address 1</label>
                                                <input type="text" class="form-control" name="addressOne" id="addressOne"
                                                    value="Setra Duta Cemara" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="addressTwo">Address 2</label>
                                                <input type="text" class="form-control" name="addressTwo" id="addressTwo"
                                                    value="Blok B2 No. 34" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="province">Province</label>
                                                <select name="province" id="province" class="form-control">
                                                    <option value="DKI Jakarta">
                                                        DKI Jakarta
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <select name="city" id="city" class="form-control">
                                                    <option value="Jakarta Pusat">
                                                        Jakarta Pusat
                                                    </option>
                                                    <option value="Jakarta Barat">
                                                        Jakarta Barat
                                                    </option>
                                                    <option value="Jakarta Timur">
                                                        Jakarta Timur
                                                    </option>
                                                    <option value="Jakarta Utara">
                                                        Jakarta Utara
                                                    </option>
                                                    <option value="Jakarta Selatan">
                                                        Jakarta Selatan
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="postalCode">Postal Code</label>
                                                <input type="text" class="form-control" name="postalCode" id="postalCode"
                                                    value="123999" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="country">Country</label>
                                                <input type="text" class="form-control" name="country" id="country"
                                                    value="Indonesia" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="mobile">Mobile</label>
                                                <input type="text" class="form-control" name="mobile" id="mobile"
                                                    value="+628 2020 11111" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success px-5">
                                                Save Now
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
