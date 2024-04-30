@extends('layout')

@section('content')
    <div class="content">

        <h1>Produk Yang Digunakan Gerai</h1>
        <!-- <a class="btn btn-success" href="javascript:void(0)" id="createNewCustomer"> Create New Customer</a> -->
        <!-- <div class="button  d-flex flex-row justify-content-between">
            <a class="btn btn-success" href="{{ route('customer.create') }}"> <i class="fa fa-plus"></i> Informasi Kunjungan</a>
            <div class="importExport">
                <a class="btn btn-primary" href="javascript:void(0)" id="CustomerImport"> <i class="fa fa-upload"></i><span>  Excel</span></a>
                <a class="btn btn-success" href="{{ route('customer.export') }}"> <i class="fa fa-download"></i> <span>  Excel</span></a>
            </div>
        </div> -->
        <div style="margin: 20px 0px;" class="d-flex flex-row gap-3 align-items-center ">
            <strong>Periode Kunjungan:</strong>
            <div class="d-flex flex-row gap-2 align-items-center">
                <div class="form-control form-control-sm d-flex flex-row gap-3 align-items-center">
                    <i class="fa fa-calendar"></i>
                    <input type="text" name="daterange" value=""  class=" border-0"/>
                </div>
                <button class="btn btn-success btn-sm filter">Filter <i class="fa fa-filter"></i> </button>
            </div>
        </div>
        <br>
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th width="200px">Tanggal Kunjungan</th>
                    <th>Person</th>
                    <th>Kode Customer</th>
                    <th>Nama Customer</th>
                    <th>Produk yang Dipakai</th>
                    <th>Harga Beli</th>
                    <th>Toko Beli</th>
                    <th>Pasar</th>
                    <th>Patokan</th>
                    <!-- <th width="300px">Action</th> -->
                </tr>
            </thead>
            <tbody>
            </tbody>
            <div id="myModal" class="modall">
                <span class="close">&times;</span>
                <img class="modall-content" id="img01">
            </div>
        </table>

    </div>
</div>


    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>   -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>   -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
    
<script type="text/javascript">
  $(function () {
        $('input[name="daterange"]').daterangepicker({
            locale: {
                format: 'DD/MM/YYYY',
            },
            startDate: moment().subtract(1, 'M'),
            endDate: moment(),
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        });
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    
    // Date Now
    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();

    var output = (day<10 ? '0' : '') + day + '-' +
    (month<10 ? '0' : '') + month + '-' +
    d.getFullYear();

    // Draw datatable
    var table = $('.data-table').DataTable({
        dom: 'lBfrtip',
        buttons: [
            // {
            //     extend: 'colvis',
            //     text: 'Custom Column',
            //     className: 'form-select-sm'
            // },
            {
                extend : 'excel',
                text : 'Download To Excel',
                className : 'btn btn-sm btn-success',
                title : 'Summary Display Customer'
            },
            {
                extend : 'csv',
                text : 'Download To CSV',
                className : 'btn btn-sm btn-info',
            },
            {
                extend : 'pdf',
                text : 'Download To PDF',
                className : 'btn btn-sm btn-danger',
            },
            {
                extend : 'print',
                text : 'Print',
                className : 'btn btn-sm btn-primary',
            }
        ],
        processing: true,
        serverSide: true,
        ajax: {
            url : "{{ route('report.usedProduct') }}",
            data: function (d) {
                d.from_date = $('input[name="daterange"]').data('daterangepicker').startDate.format('YYYY-MM-DD');
                d.to_date = $('input[name="daterange"]').data('daterangepicker').endDate.format('YYYY-MM-DD');
                d.staff = $('input[name="staff"]').val();
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'dateVisit', name: 'dateVisit'},
            {data: 'nameStaff', name: 'nameStaff'},
            {data: 'geraiCode', name: 'geraiCode'},
            {data: 'geraiName', name: 'geraiName'},
            {data: 'prodName', name: 'prodName'},
            {data: 'priceBuy', name: 'priceBuy'},
            {data: 'toko', name: 'toko'},
            {data: 'pasar', name: 'pasar'},
            {data: 'patokan', name: 'patokan'},
            // {data: 'image', name: 'image', "render": 
            //   function (data, type, full, meta) {
            //     return "<img id=\"myImg\" class=\"myImg\" src=\""+data+"\" height=\"50\">";
            //   },
            // orderable: false, searchable: false},
            // {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $(".filter").click(function(){
        table.draw();
    });
     
  });
</script>
<script type="text/javascript">
    $(document).on('click', '.myImg', function() {
        var modal = document.getElementById("myModal");
        var modalImg = document.getElementById("img01");
        modal.style.display = "block";
        modalImg.src = this.src;

        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        };
    });
    


</script>
@endsection

