<!DOCTYPE html>
<html>
<head>
    <title>Customer</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- NEW VIEWPORT --}}
    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/images/logo/logo-SEDAP-MANTAP.png') }}">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />  
</head>
<body>
<div class="formContainer">
<div class="formWrapper">
        <div class="d-flex flex-row gap-5 ">
            <h3>Ubah Data Gerai {{ $outlets->name }}</h3>
            <img src="{{asset('images/logo/Sedap-Mantap-Logo.png')}}" alt="Logo" class="logoImage">
        </div>
        <form action="{{ route('customer.store') }}" method="POST" class="formFlex" enctype="multipart/form-data">
        @csrf
            <!-- DATA CUSTOMER/OUTLET -->
            <div class="leftForm">
                <h4>Data Customer</h4><br>
                <div class="form-group">
                    <label for="name" class="col-sm-4 control-label mb-1 ">Kode Customer</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control form-control-sm" name="code" value="{{ $outlets->code }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-4 control-label mb-1">Nama Customer</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control form-control-sm" name="name" value="{{ $outlets->name }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-4 control-label mb-1">No. Telepon</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control form-control-sm" name="phone_cust" value="{{ $outlets->phone }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label mb-1">Alamat</label>
                    <div class="col-sm-12">
                        <textarea name="address_cust" placeholder="Alamat" class="form-control form-control-sm">{{ $outlets->address }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-4 control-label mb-1">Latitude</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control form-control-sm" name="LA" placeholder="Latidude" value="{{ $outlets->LA }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-4 control-label mb-1">Longitude</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control form-control-sm" name="LO" placeholder="Longitude" value="{{ $outlets->LO }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-4 control-label mb-1">Area</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control form-control-sm" name="area" placeholder="Area" value="{{ $outlets->area }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label mb-1">Sudah Teregistrasi</label>
                    <div class="col-sm-12">
                        @if ($outlets->regist = 1)
                            <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="regist" value="1" checked>Ya
                            </label>
                            </div>
                            <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="regist" value="0">Tidak
                            </label>
                            </div>
                        @else
                            <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="regist" value="1">Ya
                            </label>
                            </div>
                            <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="regist" value="0" checked>Tidak
                            </label>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- <div class="form-group">
                    <label class="col-sm-4 control-label mb-1">Jenis Customer</label>
                    <div class="col-sm-12">
                        <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="type" value="0">Toko
                        </label>
                        </div>
                        <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="type" value="1">Gerai
                        </label>
                        </div>
                    </div>
                </div> -->

                <div class="form-group">
                    <label class="col-sm-4 control-label mb-1">Cabang</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" placeholder="Cabang" value="{{ $outlets->branch_name }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label mb-1">Karyawan Yang Bertugas</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" placeholder="Staff" value="{{ $outlets->staff_name }}">
                    </div>
                </div>
            </div>
            <hr/>
            <div class="rightForm">
                <!-- DATA OWNER -->
                <h4>Data Kepemilikan/Owner</h4><br>
                <div class="form-group">
                    <label for="name" class="col-sm-4 control-label mb-1">Nama Pemilik</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control form-control-sm" name="owner" placeholder="Nama Pemilik" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-4 control-label mb-1">NIK</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control form-control-sm" name="nik" placeholder="Nama Pemilik" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-4 control-label mb-1">No. Telepon</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control form-control-sm" name="phone_owner" placeholder="Nama Pemilik" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label mb-1">Alamat</label>
                    <div class="col-sm-12">
                        <textarea name="address_owner" placeholder="Alamat" class="form-control form-control-sm"></textarea>
                    </div>
                </div>

                <div class="d-flex flex-row justify-content-between align-items-center gap-2 m-3 mt-4">
                    <!-- <button type="submit" class="btn btn-primary flex-grow-1" value="create">Simpan Data</button> -->
                    <a href="{{ route('outlet.edit', ['outlet'=>$outlets->id]) }}" class="btn btn-primary flex-grow-1">Ubah Data</a>
                    <a href="{{ route('outlet.index') }}" class="btn btn-danger flex-grow-1">Kembali</a>    
                </div>
            </div>  
        </form>
    </div>

<!-- </div> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>