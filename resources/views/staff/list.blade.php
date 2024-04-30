@extends('layout')

@section('content')
    <div class="content">

        <h1>Staff</h1>
        <!-- <a class="btn btn-success" href="javascript:void(0)" id="createNewCustomer"> Create New Customer</a> -->
        <div class="button  d-flex flex-row justify-content-between">
            <a class="btn btn-success" href="{{ route('staff.create') }}"> <i class="fa fa-plus"></i> Staff</a>
        </div>
        <br>
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <!-- <th>Kode</th> -->
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>No. Telephone</th>
                    <th>Jabatan</th>
                    <th>Email</th>
                    <th width="300px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

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
        ajax: "{{ route('staff.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            // {data: 'code', name: 'code'},
            {data: 'name', name: 'name'},
            {data: 'gender', name: 'gender'},
            {data: 'phone', name: 'phone'},
            {data: 'jabatan', name: 'jabatan'},
            {data: 'email', name: 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
    $('body').on('click', '.deleteStaff', function () {
     
        var staff_id = $(this).data("id");
        confirm("Apakah Anda Yakin Ingin Menghapus Data Ini ?");
      
        $.ajax({
            type: "DELETE",
            url: "{{ route('staff.store') }}"+'/'+staff_id,
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
