@extends('layout')

@section('content')    
    <div class="content">
        <h1>Sub Brand Produk</h1>
        <a class="btn btn-success" href="javascript:void(0)" id="createNewSubBrand"> <i class="fa fa-plus"></i>  Sub Brand</a>
        <br><br>
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th width="50px">No</th>
                    <th>Kategori</th>
                    <th>Brand</th>
                    <th>Nama</th>
                    <th width="300px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    
        <div class="modal fade" id="ajaxModel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeading"></h4>
                    </div>
                    <div class="modal-body">
                        <form id="subbrandForm" name="subbrandForm" class="form-horizontal">
                        <input type="hidden" name="sub_brand_id" id="sub_brand_id">
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">Sub Brand Produk</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Sub Brand Produk" value="" maxlength="50" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">Kategori Produk</label>
                            <select name="category" id="category" class="form-control">
                                <option value="">-- Pilih Kategori Produk --</option>
                                @foreach($categories as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">Brand Produk</label>
                            <select name="brand" id="brand" class="form-control">
                                <option value="">-- Pilih Brand Produk --</option>
                                @foreach($brands as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
            
                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                        </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  
<script type="text/javascript">
  $(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('subbrand.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'category_produk', name: 'category_produk'},
            {data: 'brand_produk', name: 'brand_produk'},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('#createNewSubBrand').click(function () {
        $('#saveBtn').val("create-SubBrand");
        $('#sub_brand_id').val('');
        $('#name').val('');
        $('#category').val('-- Pilih Kategori Produk --');
        $('#brand').val('-- Pilih Brand Produk --');
        $('#subbrandForm').trigger("reset");
        $('#modelHeading').html("Tambah Sub Brand");
        $('#ajaxModel').modal('show');
    });
    $('body').on('click', '.editSubBrand', function () {
      var sub_brand_id = $(this).data('id');
      $.get("{{ route('subbrand.index') }}" +'/' + sub_brand_id +'/edit', function (data) {
          $('#modelHeading').html("Edit Sub Brand");
          $('#saveBtn').val("edit-Sub Brand");
          $('#ajaxModel').modal('show');
          $('#sub_brand_id').val(data.id);
          $('#name').val(data.name);
          $('#category').val(data.category_produk);
          $('#brand').val(data.brand_produk);
      })
   });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');
    
        $.ajax({
          data: $('#subbrandForm').serialize(),
          url: "{{ route('subbrand.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#subbrandForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });
    
    $('body').on('click', '.deleteSubBrand', function () {
     
        var sub_brand_id = $(this).data("id");
        confirm("Apakah Anda Yakin Ingin Menghapus Data Ini ?");
      
        $.ajax({
            type: "DELETE",
            url: "{{ route('subbrand.store') }}"+'/'+sub_brand_id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
     
  });
</script>
@endsection