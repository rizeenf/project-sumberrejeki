<!DOCTYPE html>
<html>
<head>
    <title>Staff</title>
    {{-- OLD VIEWPORT --}}
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}">  --}}

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
    @if(isset($staffs))
    <div class="formWrapper">
        <div class="d-flex flex-row gap-5 ">
            <h3>Edit Staff</h3>
            <img src="{{asset('images/logo/Sedap-Mantap-Logo.png')}}" alt="Logo" class="logoImage">
        </div>
        <form action="{{ route('staff.update', $customers->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Kode Customer</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control form-control-sm" name="code" placeholder="Kode Customer" value="{{ $customers->code }}" maxlength="10" disabled>
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Nama Customer/Outlet</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control form-control-sm" name="name" placeholder="Nama Customer/Outlet" value="{{ $customers->name }}" maxlength="100">
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Nama Pemilik</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control form-control-sm" name="owner" placeholder="Nama Pemilik" value="{{ $customers->owner }}" maxlength="100">
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">No. Telepon</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control form-control-sm" name="phone" placeholder="No. Telepon" value="{{ $customers->phone }}" maxlength="100">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label mb-1">Alamat</label>
                <div class="col-sm-12">
                    <textarea name="address" required="" placeholder="Alamat" class="form-control form-control-sm">{{ $customers->address }}</textarea>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between align-items-center gap-2 m-3 mt-4">
                <button type="submit" class="btn btn-primary flex-grow-1" value="create">Simpan Data</button>
                <!-- <a href="{{ route('customer.edit', $customers->sysId) }}" class="btn btn-primary">Ubah Data
                </a> -->
                <a href="{{ route('staff.index') }}" class="btn btn-danger flex-grow-1">Kembali</a>
            </div>                    
        </form>
    </div>
    @else
    <div class="formWrapper">
        <div class="d-flex flex-row gap-5 ">
            <h3>Add Staff</h3>
            <img src="{{asset('images/logo/Sedap-Mantap-Logo.png')}}" alt="Logo" class="logoImage">
        </div>
        <form action="{{ route('staff.store') }}" method="POST" class="" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1 ">Kode Staff</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control form-control-sm" name="code" placeholder="Kode Staff" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Nama Staff</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control form-control-sm" name="name" placeholder="Nama Staff" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Jenis Kelamin</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="L">
                <label class="form-check-label" >
                    Pria
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="P">
                <label class="form-check-label">
                    Wanita
                </label>
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">No. Telepon</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control form-control-sm" name="phone" placeholder="No. Telepon" value="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label mb-1">Jabatan</label>
                <div class="col-sm-12">
                    <!-- <textarea name="jabatan" required="" placeholder="Alamat" class="form-control form-control-sm"></textarea> -->
                    <select name="jabatan" id="jabatan" class="form-control">
                        <option value="">-- Pilih Jabatan --</option>
                        @foreach($jabatans as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label mb-1">Email</label>
                <div class="col-sm-12">
                <input type="email" class="form-control form-control-sm" name="email" placeholder="Email">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label mb-1">Username</label>
                <div class="col-sm-12">
                <input type="text" class="form-control form-control-sm" name="username" placeholder="Username">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label mb-1">Password</label>
                <div class="col-sm-12">
                <input type="password" class="form-control form-control-sm" name="password" placeholder="Password" value="" required="">
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-4 control-label mb-1">Konfirmasi Password</label>
                <div class="col-sm-12">
                <input type="password" class="form-control form-control-sm" name="confirm" placeholder="Konfirmasi Password" value="" required="">
                </div>
            </div>

            <div class="d-flex flex-row justify-content-between align-items-center gap-2 m-3 mt-4">
                <button type="submit" class="btn btn-primary flex-grow-1" value="create">Simpan Data</button>
                <a href="{{ route('staff.index') }}" class="btn btn-danger flex-grow-1">Kembali</a>    
            </div>                    
        </form>
    </div>

    @endif

</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>