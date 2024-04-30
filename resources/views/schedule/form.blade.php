<!DOCTYPE html>
<html>
<head>
    <title>Jadwal Kunjungan</title>

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
    @if(isset($products))
    <div class="formWrapper">
        <div class="d-flex flex-row gap-5 ">
            <h3>Edit Product</h3>
            <img src="{{asset('images/logo/Sedap-Mantap-Logo.png')}}" alt="Logo" class="logoImage">
        </div>
        <form action="{{ route('product.update', ['product' => $products->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <input type="hidden" value="{{ $products->id }}" name="product_id">
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1 ">Kode Produk</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control form-control-sm" name="code" placeholder="Kode Produk" value="{{ $products->code }}" disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Nama Produk</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control form-control-sm" name="name" placeholder="Nama Produk" value="{{ $products->name }}">
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Deskripsi Produk</label>
                <div class="col-sm-12">
                    <textarea name="desc" cols="10" rows="3" placeholder="Deskripsi Produk" class="form-control form-control-sm">{{ $products->description }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Foto Produk</label>
                <div class="col-sm-12">
                    <input type="file" class="form-control form-control-sm" name="photo" placeholder="Pilih Foto Produk" accept="image/*" value="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label mb-1">Competitor</label>
                <div class="col-sm-12">
                    @if($products->competitor == 1)
                    <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="competitor" value="1" checked>Ya
                    </label>
                    </div>
                    <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="competitor" value="0">Tidak
                    </label>
                    </div>
                    @else
                    <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="competitor" value="1">Ya
                    </label>
                    </div>
                    <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="competitor" value="0" checked>Tidak
                    </label>
                    </div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label mb-1">Kategori Produk</label>
                <div class="col-sm-12">
                    <select class="form-control form-control-sm" name='category'>
                        @if($products->category_id == NULL)
                            <option value="">--- Pilih Kategori Produk ---</option>
                            @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        @else
                            <option value="{{ $products->category_id }}">{{ $products->category }}</option>
                            @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        @endif
                        
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label mb-1">Brand Produk</label>
                <div class="col-sm-12">
                    <select class="form-control form-control-sm" name='brand'>
                        @if($products->brand_id == NULL)
                            <option value="">--- Pilih Brand Produk ---</option>
                            @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        @else
                            <option value="{{ $products->brand_id }}">{{ $products->brand }}</option>
                            @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        @endif
                        
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label mb-1">Sub Brand Produk</label>
                <div class="col-sm-12">
                    <select class="form-control form-control-sm" name='subbrand'>
                        @if($products->subbrand_id == NULL)
                            <option value="">--- Pilih Sub Brand Produk ---</option>
                            @foreach ($subbrands as $subbrand)
                            <option value="{{ $subbrand->id }}">{{ $subbrand->name }}</option>
                            @endforeach
                        @else
                            <option value="{{ $products->subbrand_id }}">{{ $products->subbrand }}</option>
                            @foreach ($subbrands as $subbrand)
                            <option value="{{ $subbrand->id }}">{{ $subbrand->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between align-items-center gap-2 m-3 mt-4">
                <button type="submit" class="btn btn-primary flex-grow-1" value="create">Simpan Data</button>
                <a href="{{ route('product.index') }}" class="btn btn-danger flex-grow-1">Kembali</a>
            </div>
        </form>
    </div>
    @else
    <div class="formWrapper">
        <div class="d-flex flex-row gap-5 ">
            <h3>Tambah Product</h3>
            <img src="{{asset('images/logo/Sedap-Mantap-Logo.png')}}" alt="Logo" class="logoImage">
        </div>
        <form action="{{ route('schedule.store') }}" method="POST" class="" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Nama Jadwal Kunjungan</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control form-control-sm" name="name" placeholder="Nama Jadwal Kunjungan" value="" required="">
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Tanggal Berlaku</label>
                <div class="col-sm-12">
                <input type="date" class="form-control form-control-sm" name="start" placeholder="Tanggal Berlaku" value="" required="">
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Tanggal Berakhir</label>
                <div class="col-sm-12">
                <input type="date" class="form-control form-control-sm" name="end" placeholder="Tanggal Berakhir" value="" required="">
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Pola Kunjungan</label>
                <div class="col-sm-12">
                        <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="pattern" value="D">Harian
                        </label>
                        </div>
                        <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="pattern" value="W">Mingguan
                        </label>
                        </div>
                        <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="pattern" value="M">Bulanan
                        </label>
                        </div>
                        <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="pattern" value="Y">Tahunan
                        </label>
                        </div>
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Pengulangan Pola Kunjungan</label>
                <div class="col-sm-12">
                <input type="number" class="form-control form-control-sm" name="value" placeholder="Pengulangan Pola Kunjungan">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label mb-1">Karyawan Yang Ditugaskan</label>
                <div class="col-sm-12">
                    <select class="form-control form-control-sm" name='staff' required>
                    <option value="">--- Pilih Karyawan ---</option>
                        @foreach ($liststaff as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div> 
            <div class="d-flex flex-row justify-content-between align-items-center gap-2 m-3 mt-4">
                <button type="submit" class="btn btn-primary flex-grow-1" value="create">Simpan Data</button>
                <a href="{{ route('schedule.index') }}" class="btn btn-danger flex-grow-1">Kembali</a>    
            </div> 
                 
        </form>
    </div>

    @endif
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>