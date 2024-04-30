@extends('layout')

@section('content')
    <div class="content">
        <h1>Branch</h1>
            <div class=" d-flex justify-content-between">
                <a class="btn btn-success" href="javascript:void(0)" id="createNewBranch">
                <i class="fa fa-plus"></i>  Branch</a>
                <div class="dropdown position-relative ">
                <button class="btn btn-light" role="button" data-bs-toggle="dropdown" aria-expanded="false">Filter <i class="fa fa-filter"></i></button>

                {{-- FILTER --}}
                <form class="dropdown-menu dropdown-menu-end p-3" >
                    <div class="d-flex align-items-center justify-content-between py-2">
                        <span class=" text-secondary">FILTER</span>
                        <button class="btn btn-sm btn-danger">Clear</button>
                    </div>
                    <div class="items py-2">
                        <span>Status</span>
                        <select id="statusFilter" class="form-select form-select-sm">
                            <option selected>Pilih status</option>
                            <option value="active">Active</option>
                            <option value="notActive">Not Active</option>
                        </select>
                    </div>
                    <button class="btn btn-success btn-sm mt-4">Simpan filter</button>
                </form>
                {{-- END FILTER --}}
            </div>

        </div>
        {{-- BUTTON FOR ERROR TOAST --}}
        {{-- <button type="button" class="btn btn-primary" id="liveToastBtn">Error toast</button> --}}


        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="liveToast" class="toast text-bg-danger text-white" role="alert" aria-live="assertive" aria-atomic="true" >
                <div class="d-flex">
                    <div class="toast-body d-flex gap-2 align-items-center">
                    <i class="fa fa-exclamation"></i>
                      This is an Error message.
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
            </div>
        </div>
        <br><br>
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>Status</th>
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
                        <form id="branchForm" name="branchForm" class="form-horizontal">
                        <input type="hidden" name="branch_id" id="branch_id">
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">Kode Branch</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="code" name="code" placeholder="Kode Branch" value="" maxlength="5" required="">
                            </div>
                        </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Nama Branch</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Branch" value="" maxlength="100" required="">
                                </div>
                            </div>
            
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Keterangan</label>
                                <div class="col-sm-12">
                                    <textarea id="notes" name="notes" required="" placeholder="Keterangan" class="form-control"></textarea>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>

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
        ajax: "{{ route('branch.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'code', name: 'code'},
            {data: 'name', name: 'name'},
            {data: 'notes', name: 'notes'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('#createNewBranch').click(function () {
        $('#saveBtn').val("create-branch");
        $('#branch_id').val('');
        $('#branchForm').trigger("reset");
        $('#modelHeading').html("Tambah Branch");
        $('#ajaxModel').modal('show');
    });
    $('body').on('click', '.editBranch', function () {
      var branch_id = $(this).data('id');
      $.get("{{ route('branch.index') }}" +'/' + branch_id +'/edit', function (data) {
          $('#modelHeading').html("Edit Branch");
          $('#saveBtn').val("edit-branch");
          $('#ajaxModel').modal('show');
          $('#branch_id').val(data.id);
          $('#code').val(data.code);
          $('#code').readOnly = true;
          $('#name').val(data.name);
          $('#notes').val(data.notes);
      })
   });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');
    
        $.ajax({
          data: $('#branchForm').serialize(),
          url: "{{ route('branch.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#branchForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });
    
    $('body').on('click', '.deleteBranch', function () {
     
        var branch_id = $(this).data("id");
        confirm("Apakah Anda Yakin Ingin Menghapus Data Ini ?");
      
        $.ajax({
            type: "DELETE",
            url: "{{ route('branch.store') }}"+'/'+branch_id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    // DELETE COMMENT IF USING AN ERROR TRIGGER 
    // const toastTrigger = document.getElementById('liveToastBtn')
    const toastLiveExample = document.getElementById('liveToast')

    // if (toastTrigger) {
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
        // toastTrigger.addEventListener('click', () => {
    toastBootstrap.show();
    //     })
    // }

     
  });
</script>
@endsection
