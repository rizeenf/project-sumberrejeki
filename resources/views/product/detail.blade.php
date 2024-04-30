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
            <h3>Detail {{ $products->name }}</h3>
        </div>
        <form action="#" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name" class="col-sm-4 control-label mb-1">Kode Produk</label>
            <div class="col-sm-12">
                <input type="text" class="form-control form-control-sm" name="code" placeholder="Kode Produk" value="{{ $products->code }}" maxlength="10" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="name" class="col-sm-4 control-label mb-1">Nama Produk</label>
            <div class="col-sm-12">
                <input type="text" class="form-control form-control-sm" name="name" placeholder="Nama Produk" value="{{ $products->name }}" maxlength="100" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="name" class="col-sm-4 control-label mb-1">Deskripsi Produk</label>
            <div class="col-sm-12">
                <textarea name="desc" class="form-control" cols="10" rows="3">{{ $products->description }}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="name" class="col-sm-4 control-label mb-1">Foto Produk</label>
            <div class="col-sm-12">
                <input type="file" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 control-label mb-1">Kompetitor</label>
            <div class="col-sm-12">
            @if ($products->competitor == 1)
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

        <div class="form-group">
            <label class="col-sm-4 control-label mb-1">Kategori Produk</label>
            <div class="col-sm-12">
                <!-- <select class="form-control form-control-sm" name='branch' disabled>
                    @if($products->category_id == NULL)
                        <option value="" >Category Tidak Diketahui</option>
                    @else
                        <option value="{{ $products->category_id }}">{{ $products->category_name  }}</option>
                    @endif
                </select> -->
                @if($products->category_id == NULL)
                    <input type="text" class="form-control" value="Tidak Diketahui" disabled>
                @else
                    <input type="text" class="form-control" value="{{ $products->category }}" disabled>
                @endif
                
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-4 control-label mb-1">Brand Produk</label>
            <div class="col-sm-12">
                <!-- <select class="form-control form-control-sm" name='branch' disabled>
                    @if($products->category_id == NULL)
                        <option value="" >Category Tidak Diketahui</option>
                    @else
                        <option value="{{ $products->category_id }}">{{ $products->category_name  }}</option>
                    @endif
                </select> -->
                @if($products->brand_id == NULL)
                    <input type="text" class="form-control" value="Tidak Diketahui" disabled>
                @else
                    <input type="text" class="form-control" value="{{ $products->brand }}" disabled>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 control-label mb-1">Sub Brand Produk</label>
            <div class="col-sm-12">
                <!-- <select class="form-control form-control-sm" name='branch' disabled>
                    @if($products->category_id == NULL)
                        <option value="" >Category Tidak Diketahui</option>
                    @else
                        <option value="{{ $products->category_id }}">{{ $products->category_name  }}</option>
                    @endif
                </select> -->
                @if($products->subbrand_id == NULL)
                    <input type="text" class="form-control" value="Tidak Diketahui" disabled>
                @else
                    <input type="text" class="form-control" value="{{ $products->subbrand }}" disabled>
                @endif
            </div>
        </div>

        <div class="d-flex flex-row justify-content-end align-content-end gap-2 m-3 mt-4">

        <a href="{{ route('product.edit', ['product'=>$products->id]) }}" class="btn btn-primary flex-grow-1">Ubah Data</a>
        <a href="{{ route('product.index') }}" class="btn btn-danger flex-grow-1">Kembali</a>
        </div>
    </form>  
    </div>  
</div>  

<!-- </div> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>