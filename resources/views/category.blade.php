@extends('layout')

@section('content')    
    <div class="content">
        <h1>Kategori Produk</h1>
        <a class="btn btn-success" href="javascript:void(0)" id="createNewCategory"> <i class="fa fa-plus"></i>  Category</a>
        <br><br>
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th width="50px">No</th>
                    <th>Jenis</th>
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
                        <form id="categoryForm" name="categoryForm" class="form-horizontal">
                        <input type="hidden" name="category_id" id="category_id">
                        <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Categori Produk</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Categori Produk" value="" maxlength="50" required="">
                                </div>
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
        ajax: "{{ route('category.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('#createNewCategory').click(function () {
        $('#saveBtn').val("create-Category");
        $('#category_id').val('');
        $('#name').val('');
        $('#CategoryForm').trigger("reset");
        $('#modelHeading').html("Tambah Category");
        $('#ajaxModel').modal('show');
    });
    $('body').on('click', '.editCategory', function () {
      var Category_id = $(this).data('id');
      $.get("{{ route('category.index') }}" +'/' + Category_id +'/edit', function (data) {
          $('#modelHeading').html("Edit Category");
          $('#saveBtn').val("edit-Category");
          $('#ajaxModel').modal('show');
          $('#category_id').val(data.id);
          $('#name').val(data.name);
      })
   });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');
    
        $.ajax({
          data: $('#categoryForm').serialize(),
          url: "{{ route('category.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#categoryForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });
    
    $('body').on('click', '.deleteCategory', function () {
     
        var category_id = $(this).data("id");
        confirm("Apakah Anda Yakin Ingin Menghapus Data Ini ?");
      
        $.ajax({
            type: "DELETE",
            url: "{{ route('category.store') }}"+'/'+category_id,
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