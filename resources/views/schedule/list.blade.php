@extends('layout')

@section('content')
    <div class="content">

        <h1>Jadwal Kunjungan</h1>
        <!-- <a class="btn btn-success" href="javascript:void(0)" id="createNewCustomer"> Create New Customer</a> -->
        <div class="button  d-flex flex-row justify-content-between">
            <a class="btn btn-success" href="{{ route('schedule.create') }}"> <i class="fa fa-plus"></i> Jadwal Kunjungan</a>
            <div class="importExport">
                <a class="btn btn-primary" href="javascript:void(0)" id="CustomerImport"> <i class="fa fa-upload"></i><span>  Excel</span></a>
                <a class="btn btn-success" href="#"> <i class="fa fa-download"></i> <span>  Excel</span></a>
            </div>
        </div>
        <br>
        <br><br>
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Target Visit</th>
                    <th>Person</th>
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
                        <form action="#" name="ImportCustomer" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                                @csrf
                                <label for="name" class="col-sm-4 control-label">File Import</label>
                                <div class="col-sm-12">
                                    <input type="file" name="file" class="form-control">
                                </div>
                                <label for="name" class="col-sm-4 control-label">Tipe Import</label>
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="type" value="create">Baru
                                </label>
                                </div>
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="type" value="update">Update
                                </label>
                                </div>
                            </div>
                            <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" value="Import">Import
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
        ajax: {
            url : "{{ route('schedule.index') }}",
            // data : function (data) {
            //     data.area = $('#area').val()
            // }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'scheduleName', name: 'scheduleName'},
            {data: 'start_date', name: 'start_date'},
            {data: 'end_date', name: 'end_date'},
            {data: 'target', name: 'target'},
            {data: 'staff_name', name: 'staff_name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    // $('#area').on('change', function(){
    //    table.draw();   
    // });

    $('#CustomerImport').click(function () {
        $('#modelHeading').html("Import Customer");
        $('#ajaxModel').modal('show');
    });
    
    $('body').on('click', '.deleteCustomer', function () {
     
        var customer_id = $(this).data("id");
        confirm("Apakah Anda Yakin Ingin Menghapus Data Ini ?");
      
        $.ajax({
            type: "DELETE",
            url: "{{ route('schedule.store') }}"+'/'+customer_id,
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

