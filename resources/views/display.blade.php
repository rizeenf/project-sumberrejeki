@extends('layout')

@section('content')    
    <div class="content">
        <h1>Display</h1>
        <a class="btn btn-success" href="javascript:void(0)" id="createNewDisplay"> <i class="fa fa-plus"></i>  Display</a>
        <br><br>
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th width="50px">No</th>
                    <th>Jenis</th>
                    <th>Ketahanan</th>
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
                        <form id="displayForm" name="displayForm" class="form-horizontal">
                        <input type="hidden" name="display_id" id="display_id">
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">Jenis Display</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Jenis Display" value="" maxlength="50" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">Ketahanan Display(Hari)</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" id="durability" name="durability" placeholder="Ketahanan Display" value="" required="">
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
        ajax: "{{ route('displays.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'durability', name: 'durability'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('#createNewDisplay').click(function () {
        $('#saveBtn').val("create-display");
        $('#display_id').val('');
        $('#displayForm').trigger("reset");
        $('#modelHeading').html("Tambah Display");
        $('#ajaxModel').modal('show');
    });
    $('body').on('click', '.editDisplay', function () {
      var display_id = $(this).data('id');
      $.get("{{ route('displays.index') }}" +'/' + display_id +'/edit', function (data) {
          $('#modelHeading').html("Edit Display");
          $('#saveBtn').val("edit-display");
          $('#ajaxModel').modal('show');
          $('#display_id').val(data.id);
          $('#name').val(data.name);
          $('#durability').val(data.durability);
      })
   });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');
    
        $.ajax({
          data: $('#displayForm').serialize(),
          url: "{{ route('displays.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#displayForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });
    
    $('body').on('click', '.deleteDisplay', function () {
     
        var display_id = $(this).data("id");
        confirm("Apakah Anda Yakin Ingin Menghapus Data Ini ?");
      
        $.ajax({
            type: "DELETE",
            url: "{{ route('displays.store') }}"+'/'+display_id,
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
