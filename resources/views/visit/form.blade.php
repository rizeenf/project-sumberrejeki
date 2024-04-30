<!DOCTYPE html>
<html>
<head>
    <title>Customer</title>
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
<div id="formContainer">
    <div id="formWrapper">
        <div class="d-flex flex-row justify-content-between gap-5 ">
            <h4>Kunjungan Customer {{ $customers->name }}</h4>
            {{-- <img src="{{asset('images/logo/Sedap-Mantap-Logo.png')}}" alt="Logo" class="logoImage"> --}}
        </div>
        @if($customers->type == 0)
        <form action="{{ route('visit.storeMd') }}" method="POST" class="formVisit" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ $idVisit->id }}" name="id">
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1 ">Kode Customer</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control form-control-sm" name="code" placeholder="Kode Customer" disabled value="{{ $customers->code }}">
                    <input type="hidden" name="customerId" value="{{ $customers->id }}">
                    <input type="hidden" name="lat" id="lat">
                    <input type="hidden" name="lon" id="lon">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Nama Customer/Outlet</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control form-control-sm" name="name" placeholder="Nama Customer/Outlet" readonly value="{{ $customers->name }}">
                </div>
            </div>

            @if($customers->foto == NULL)
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Foto Tampak Depan Customer</label>
                <div class="col-sm-12">
                    <input type="file" class="form-control form-control-sm" name="mFoto" accept="image/*" capture="camera">
                    <!-- <input type="file" class="form-control form-control-sm" name="actPhoto2" accept="image/*" capture="camera">
                    <input type="file" class="form-control form-control-sm" name="actPhoto3" accept="image/*" capture="camera"> -->
                </div>
            </div>
            @endif

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Foto Visit *</label>
                <div class="col-sm-12">
                    <input type="file" class="form-control form-control-sm" name="actPhoto" accept="image/*" capture="camera" required>
                    <!-- <input type="file" class="form-control form-control-sm" name="actPhoto2" accept="image/*" capture="camera">
                    <input type="file" class="form-control form-control-sm" name="actPhoto3" accept="image/*" capture="camera"> -->
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Spanduk *</label>
                <div class="col-sm-12">
                    <div class="form-check-inline">
                        <label class="form-check-label " id="collapse1">
                            <input type="radio" class="form-check-input" name="banner" value="1" id="collapse1" required>Terpasang
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" id="collapse0">
                            <input type="radio" class="form-check-input" name="banner" value="0" required>Tidak ada
                        </label>
                    </div>
                </div>
            </div>

            @if($customers->banner == NULL)
            <div class="form-group collapse" id="collapseForm">
                <label for="name" class="col-sm-4 control-label mb-1">Foto Spanduk</label>
                <div class="col-sm-12">
                    <input type="file" class="form-control form-control-sm" name="bannerPhoto" accept="image/*" capture="camera">
                </div>
            </div>
            @endif

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Aktivitas</label>
                <div class="col-sm-12">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="activity" value="visit">Kunjungan
                        </label>
                    </div><br>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="activity" value="maintenance">Maintenance Display
                        </label>
                    </div><br>
                </div>
            </div>

            <div class="card cardFormDisplay">
                <div class="card-header">
                    Display Produk
                </div>
                <div class="card-body ">
                    <div class="form-group" id="TextBoxesGroup">
                        <div class="col-sm-12" id="TextBoxDiv1">
                            <label for="name" class="col-sm-4 control-label mb-1">Kategori Produk</label>
                            <select id="searchCat1" class="form-control form-control-sm" name="searchCat[]" multiple></select>
                            <br>

                            <label for="name" class="col-sm-4 control-label mb-1">Display Produk</label>
                            <select class="form-control form-control-sm" name="searchDis[]" id="searchDis1" multiple></select>
                            <br>

                            <label for="name" class="col-sm-4 control-label mb-1">Foto Display</label>
                            <input type="file" class="form-control form-control-sm" name="photo" id="photo1" accept="image/*" capture="camera">
                            <br>

                            <label for="name" class="col-sm-4 control-label mb-1">Stok Produk</label>
                            <select class="form-control form-control-sm" name="searchBrand[]" id="searchBrand1" multiple></select>
                            <br>
                            
                            <label for="name" class="col-sm-4 control-label mb-1">Alasan</label>
                            <textarea class="form-control" name="reason" id="reason1" placeholder="Alasan"></textarea>
                            <hr>
                        </div>
                    </div>
                    <!-- <input type="button" class="btn btn-primary" id="addButton" value="Tambah Kategori">
                    <input type="button" class="btn btn-danger" id="removeButton" value="Hapus Kategori"> -->
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label mb-1">Catatan Kunjungan</label>
                <div class="col-sm-12">
                    <textarea name="notes" placeholder="Catatan" class="form-control form-control-sm"></textarea>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between align-items-center gap-2 m-3 mt-4">
                <button type="submit" class="btn btn-primary flex-grow-1" value="create">Simpan Data</button>
                <a href="{{ route('visit.listCustomer') }}" class="btn btn-danger flex-grow-1">Kembali</a>    
            </div>                    
        </form>
        @else
        <form action="{{ route('visit.storeMd') }}" method="POST" class="formVisit" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ $idVisit->id }}" name="id">
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1 ">Kode Customer</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control form-control-sm" name="code" placeholder="Kode Customer" disabled value="{{ $customers->code }}">
                    <input type="hidden" name="customerId" value="{{ $customers->id }}">
                    <input type="hidden" name="lat" id="lat">
                    <input type="hidden" name="lon" id="lon">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Nama Customer/Outlet</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control form-control-sm" name="name" placeholder="Nama Customer/Outlet" readonly value="{{ $customers->name }}">
                </div>
            </div>

            @if($customers->foto == NULL)
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Foto Tampak Depan Customer</label>
                <div class="col-sm-12">
                    <input type="file" class="form-control form-control-sm" name="mFoto" accept="image/*" capture="camera">
                    <!-- <input type="file" class="form-control form-control-sm" name="actPhoto2" accept="image/*" capture="camera">
                    <input type="file" class="form-control form-control-sm" name="actPhoto3" accept="image/*" capture="camera"> -->
                </div>
            </div>
            @endif

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Foto Visit</label>
                <div class="col-sm-12">
                    <input type="file" class="form-control form-control-sm" name="actPhoto" accept="image/*" capture="camera">
                    <!-- <input type="file" class="form-control form-control-sm" name="actPhoto2" accept="image/*" capture="camera">
                    <input type="file" class="form-control form-control-sm" name="actPhoto3" accept="image/*" capture="camera"> -->
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Sudah Memakai Produk Hansel?</label>
                <div class="col-sm-12">
                    <div class="form-check-inline">
                        <label class="form-check-label " id="collapse1">
                            <input type="radio" class="form-check-input" name="register" value="Y">Sudah, Hanya Pakai Produk Hansel Grup
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label " id="collapse1">
                            <input type="radio" class="form-check-input" name="register" value="M">Sudah, Tetapi Pakai Produk Lain Juga
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" id="collapse0">
                            <input type="radio" class="form-check-input" name="register" value="N">Belum Sama Sekali
                        </label>
                    </div>
                </div>
            </div>

            <div class="card-body ">
                <div class="form-group" id="TextBoxesGroup2">
                    <div class="col-sm-12" id="TextBoxDiv21">
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label mb-1">Produk yang Dipakai</label>
                            <div class="col-sm-12">
                                <select class="form-control form-control-sm" name="usedProduct[]" id="searchProduk1" multiple></select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label mb-1">Harga Beli Dus</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control form-control-sm" name="pricebuy[]" id="pricebuy1">
                            </div>
                        </div><hr>
                    </div>
                </div>
                <input type="button" class="btn btn-primary" id="addButton2" value="Tambah Produk">
                <input type="button" class="btn btn-danger" id="removeButton2" value="Hapus Produk">
            </div><br>

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Keterangan/Alasan Pakai Produk</label>
                <div class="col-sm-12">
                    <div class="form-check-inline">
                        <label class="form-check-label " id="collapse1">
                            <input type="checkbox" class="form-check-input" name="reason[]" value="Sudah Berlangganan">Sudah Berlangganan
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" id="collapse0">
                            <input type="checkbox" class="form-check-input" name="reason[]" value="Ikut Arahan Bos">Ikut Arahan Bos
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" id="collapse0">
                            <input type="checkbox" class="form-check-input" name="reason[]" value="Harga Terlalu Mahal">Harga Terlalu Mahal
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" id="collapse0">
                            <input type="checkbox" class="form-check-input" name="reason[]" value="Stok Di Toko Tidak Ada">Stok Di Toko Tidak Ada
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" id="collapse0">
                            <input type="checkbox" class="form-check-input" name="reason[]" value="" id="someCheckbox">Lainnya, Isi Sendiri
                        </label>
                    </div>
                </div>
            </div>

            <div class="collapse form-group" id="collapseContainer">
                <label for="name" class="col-sm-4 control-label mb-1">Alasan Lainnya</label>
                    <div class="col-sm-12">
                        <!-- <select class="form-control form-control-sm" name="store" id="store"></select> -->
                        <textarea name="reason[]" id="" cols="5" rows="3" class="form-control" placeholder="Alasan Lainnya"></textarea>
                    </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Toko Beli</label>
                    <div class="col-sm-12">
                        <select class="form-control form-control-sm" name="store" id="store"></select>
                    </div>
            </div>

            <div class="form-group">
                    <div class="form-check-inline">
                        <label class="form-check-label" id="collapse0">
                            <input type="checkbox" class="form-check-input" name="forgotCustomer" value="" id="someCheckbox2">User Tidak Mengetahui/Tidak Mengingat Nama Toko
                        </label>
            </div>

            <div class="collapse form-group" id="collapseContainer2">
                <label for="name" class="col-sm-4 control-label mb-1">Nama Pasar</label>
                    <div class="col-sm-12">
                        <!-- <select class="form-control form-control-sm" name="store" id="store"></select> -->
                        <input type="text" name="pasar" class="form-control" placeholder="Nama Pasar">
                    </div><br>

                <label for="name" class="col-sm-4 control-label mb-1">Patokan Toko</label>
                    <div class="col-sm-12">
                        <!-- <select class="form-control form-control-sm" name="store" id="store"></select> -->
                        <textarea name="patokan" id="" cols="5" rows="3" class="form-control" placeholder="Patokan Toko"></textarea>
                    </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Produk Sampel yang Diberikan</label>
                    <div class="col-sm-12">
                        <select class="form-control form-control-sm" name="sample" id="sample" multiple></select>
                    </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Jumlah Sample yang Diberikan</label>
                    <div class="col-sm-12">
                    <input type="number" class="form-control form-control-sm" name="qtysample" placeholder="Jumlah Sample yang Diberikan">
                    </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label mb-1">Jumlah Penjualan Perhari</label>
                    <div class="col-sm-12">
                    <input type="number" class="form-control form-control-sm" name="qtysell" placeholder="Jumlah Penjualan Perhari">
                    </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label mb-1">Catatan Kunjungan</label>
                <div class="col-sm-12">
                    <textarea name="notes" placeholder="Catatan" class="form-control form-control-sm"></textarea>
                </div>
            </div>

            <div class="d-flex flex-row justify-content-between align-items-center gap-2 m-3 mt-4">
                <button type="submit" class="btn btn-primary flex-grow-1" value="create">Simpan Data</button>
                <a href="{{ route('visit.listOutlet') }}" class="btn btn-danger flex-grow-1">Kembali</a>    
            </div>

            </form>
        @endif
    </div>

</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            var pathCat = "{{ route('category.autocomplete') }}";
            var pathDis = "{{ route('display.autocomplete') }}";
            var pathBrand = "{{ route('brand.autocomplete') }}";
            var pathProduct = "{{ route('product.autocomplete') }}";
            var pathCustomer = "{{ route('customer.autocomplete') }}";
            var counter = 2;

            $('#store').select2({
                placeholder: 'Pilih Nama Toko',
                ajax: {
                url: pathCustomer,
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                    results:  $.map(data, function (cust) {
                            return {
                                text: cust.code+" - "+cust.name,
                                id: cust.id
                            }
                        })
                    };
                },
                cache: true
                }
            });

            $('#sample').select2({
                placeholder: 'Pilih Produk',
                ajax: {
                url: pathProduct,
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                    results:  $.map(data, function (cat) {
                            return {
                                text: cat.name,
                                id: cat.id
                            }
                        })
                    };
                },
                cache: true
                }
            });

            $('#searchProduk1').select2({
                placeholder: 'Pilih Produk',
                ajax: {
                url: pathProduct,
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                    results:  $.map(data, function (cat) {
                            return {
                                text: cat.name,
                                id: cat.id
                            }
                        })
                    };
                },
                cache: true
                }
            });

            $('#searchCat1').select2({
                placeholder: 'Pilih Kategori Produk',
                ajax: {
                url: pathCat,
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                    results:  $.map(data, function (cat) {
                            return {
                                text: cat.name,
                                id: cat.id
                            }
                        })
                    };
                },
                cache: true
                }
            });
            

            $('#searchDis1').select2({
                placeholder: 'Pilih Display Produk',
                ajax: {
                url: pathDis,
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                    results:  $.map(data, function (dis) {
                            return {
                                text: dis.name,
                                id: dis.id
                            }
                        })
                    };
                },
                cache: true
                }
            });

            $('#searchBrand1').select2({
                placeholder: 'Pilih Brand Produk',
                ajax: {
                url: pathBrand,
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                    results:  
                    $.map(data, function (brand) {
                            return {
                                text: brand.name,
                                id: brand.id
                                
                            }
                        })
                    };
                },
                cache: true
                }
            });

            // $("#addButton").click(function () {
				
                // if(counter>5){
                //         alert("Hanya ada 5 kategori produk yang tersedia");
                //         return false;
                // }
                
                
                    
                // var newTextBoxDiv = $(document.createElement('div'))
                //      .attr("id", 'TextBoxDiv' + counter);
                            
                // newTextBoxDiv.after().html(
                //         '<div class="col-sm-12" id="TextBoxDiv' + counter + '">'+ //Div Group
                //         '<label for="name" class="col-sm-4 control-label mb-1">Kategori Produk #'+ counter + ' : </label>'+ //Label Category
                //         '<select id="searchCat'+ counter +'" class="form-control form-control-sm" name="searchCat[]"></select>'+//Autocomplete Category
                //         '<br>' +

                //         '<label for="name" class="col-sm-4 control-label mb-1">Display Produk#'+ counter +'</label>' +
                //         '<select class="form-control form-control-sm" name="searchDis[]" id="searchDis'+ counter +'"></select>' +//Autocomplete Display
                //         '<br>' +

                //         '<label for="name" class="col-sm-4 control-label mb-1">Foto Display#'+ counter +'</label>' +
                //         '<input type="file" class="form-control form-control-sm" name="photo[]" id="photo'+ counter +'" accept="image/*" capture="camera">' +
                //         '<br>' +

                //         '<label for="name" class="col-sm-4 control-label mb-1">Stok Produk#'+ counter +'</label>' +
                //         '<select class="form-control form-control-sm" name="searchBrand[]" id="searchBrand'+counter+'" multiple></select>'+//Autocomplete Brand
                //         '<br>' +
                        
                //         '<label for="name" class="col-sm-4 control-label mb-1">Alasan#'+ counter +'</label>' +
                //         '<textarea class="form-control" name="reason[]" id="reason'+ counter +'" placeholder="Alasan"></textarea>' +
                //         '<hr>'
                //        )//End Html
                        
                // newTextBoxDiv.appendTo("#TextBoxesGroup");

                // $('#searchCat'+counter).typeahead({
                //     source:  function (search, process) {
                //     return $.get(pathCat, { search: search }, function (data) {
                //             return process(data);
                //         });
                //     }
                // });

                // $('#searchCat'+counter).select2({
                //     placeholder: 'Select an category',
                //     ajax: {
                //     url: pathCat,
                //     dataType: 'json',
                //     delay: 250,
                //     processResults: function (data) {
                //         return {
                //         results:  $.map(data, function (cat) {
                //                 return {
                //                     text: cat.name,
                //                     id: cat.id
                //                 }
                //             })
                //         };
                //     },
                //     cache: true
                //     }
                // });

                // $('#searchDis'+counter).select2({
                //     placeholder: 'Pilih Display Produk',
                //     ajax: {
                //     url: pathDis,
                //     dataType: 'json',
                //     delay: 250,
                //     processResults: function (data) {
                //         return {
                //         results:  $.map(data, function (dis) {
                //                 return {
                //                     text: dis.name,
                //                     id: dis.id
                //                 }
                //             })
                //         };
                //     },
                //     cache: true
                //     }
                // });
                
                // $('#searchBrand'+counter).select2({
                //     placeholder: 'Pilih Brand Produk',
                //     ajax: {
                //     url: pathBrand,
                //     dataType: 'json',
                //     delay: 250,
                //     processResults: function (data) {
                //         return {
                //         results:  $.map(data, function (brand) {
                //                 return {
                //                     text: brand.name,
                //                     id: brand.id
                //                 }
                //             })
                //         };
                //     },
                //     cache: true
                //     }
                // }); 
            
                            
                // counter++;
            // });

            $("#addButton2").click(function () {
				
                if(counter>5){
                        alert("Hanya bisa menginput max 5 produk");
                        return false;
                }
                
                
                    
                var newTextBoxDiv2 = $(document.createElement('div'))
                     .attr("id", 'TextBoxDiv2' + counter);
                            
                newTextBoxDiv2.after().html(
                        '<div class="col-sm-12" id="TextBoxDiv2' + counter + '">'+ //Div Group
                        '<div class="form-group">'+
                            '<label for="name" class="col-sm-4 control-label mb-1">Produk yang Dipakai</label>'+
                            '<div class="col-sm-12">'+
                                '<select class="form-control form-control-sm" name="usedProduct[]" id="searchProduk'+counter+'" multiple></select>'+
                            '</div>'+
                        '</div><br>'+

                        '<div class="form-group">'+
                            '<label for="name" class="col-sm-4 control-label mb-1">Harga Beli Dus</label>'+
                            '<div class="col-sm-12">'+
                                '<input type="number" class="form-control form-control-sm" name="pricebuy[]" id="pricebuy'+counter+'">'+
                            '</div>'+
                        '</div><hr>'
                        )//End Html
                        
                newTextBoxDiv2.appendTo("#TextBoxesGroup2");

                // $('#searchCat'+counter).typeahead({
                //     source:  function (search, process) {
                //     return $.get(pathCat, { search: search }, function (data) {
                //             return process(data);
                //         });
                //     }
                // });

                $('#searchProduk'+counter).select2({
                    placeholder: 'Pilih Produk',
                    ajax: {
                    url: pathProduct,
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                        results:  $.map(data, function (cat) {
                                return {
                                    text: cat.name,
                                    id: cat.id
                                }
                            })
                        };
                    },
                    cache: true
                    }
                });    

                counter++;
            });

            $("#removeButton").click(function () {
                if(counter==1){
                    alert("No more textbox to remove");
                    return false;
                }   
                    
                counter--;
                        
                    $("#TextBoxDiv" + counter).remove();
                        
                });
                    
                $("#getButtonValue").click(function () {
                    
                var msg = '';
                for(i=1; i<counter; i++){
                msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
                }
                    alert(msg);
            });

            $("#removeButton2").click(function () {
                if(counter==1){
                    alert("No more textbox to remove");
                    return false;
                }   
                    
                counter--;
                        
                    $("#TextBoxDiv2" + counter).remove();
                        
                });
                    
                $("#getButtonValue").click(function () {
                    
                var msg = '';
                for(i=1; i<counter; i++){
                msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
                }
                    alert(msg);
            });


            // COLLAPSE
            $('#collapse1').click(function () {
                $('#collapseForm').addClass('show')
            });
            $('#collapse0').click(function () {
                $('#collapseForm').removeClass('show')
            });
        });

        function getLocation() {
            if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
            } else { 
            console.log("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            document.getElementById("lat").value = position.coords.latitude;
            document.getElementById("lon").value = position.coords.longitude;
        }
        
        var $collapseContainer = $('#collapseContainer');
        var $collapseContainer2 = $('#collapseContainer2');
        var $checkbox = $('#someCheckbox');
        var $checkbox2 = $('#someCheckbox2');

        var $checkbox = $('#someCheckbox');
            $checkbox.change(function() { 
            $collapseContainer.collapse('toggle');
            }); 

            $(document).ready(function() {
            $collapseContainer.collapse($checkbox.prop('checked') ? "show" : "hide");
        });
        var $checkbox2 = $('#someCheckbox2');
            $checkbox2.change(function() { 
            $collapseContainer2.collapse('toggle');
            }); 

            $(document).ready(function() {
            $collapseContainer2.collapse($checkbox2.prop('checked') ? "show" : "hide");
        });

        getLocation();
    </script>
</body>
</html>