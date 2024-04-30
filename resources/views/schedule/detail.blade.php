@extends('layout')

@section('content')    

  <div class="contentInfovisit">
    <div class="containerInfoVisit">
      <div class="boxContainer">
        <span>JADWAL KUNJUNGAN {{ strtoupper($dataschedule->name) }}</span>
        <div class="boxWrapper">
          <!-- <div class="box box1">
            <p>NAMA</p>
            <span class="nama"></span>
          </div> -->
          <!-- <div class="box box2">
            <p>TANGGAL</p>
            <span></span>
          </div> -->

          <!-- <div class="box box3">
            <p>MAPS</p>
            <span></span>
          </div> -->

          <div class="box box6">
            <div class="d-flex flex-row mb-3">
              <div class=" flex-grow-1">
                <p>TANGGAL BERLAKU</p>
                <span>{{ date('d F Y', strtotime($dataschedule->start_date)) }}</span>
              </div>
              <div class=" flex-grow-1">
                <p>TANGGAL BREAKHIR</p>
                <span>{{ date('d F Y', strtotime($dataschedule->end_date)) }}</span>
              </div>
            </div>
            <!-- <p>DESKRIPSI</p>
            <span>-</span> -->
          </div>
          <div class="box box5">
            <p>POLA PENGULANGAN</p>
            @if($dataschedule->pattern == "D")
              <span>HARIAN</span>
            @elseif($dataschedule->pattern == "W")
              <span>MINGGUAN</span>
            @elseif($dataschedule->pattern == "M")
              <span>BULANAN</span>
            @elseif($dataschedule->pattern == "Y")
              <span>TAHUNAN</span>
            @else
              <span>TIDAK DIKETAHUI</span>
            @endif
          </div>
          <div class="box box5">
            <p>NILAI PENGULANGAN</p>
            <span>{{ $dataschedule->value }}</span>
          </div>
          <div class="box box5">
            <p>TARGET KUNJUNGAN</p>
            <span>{{ $dataschedule->target }}</span>
          </div>
          <!-- <div class="box box5">
            <p>TOTAL KUNJUNGAN</p>
            <span></span>
          </div> -->
          <!-- <div class="box box5">
            <p>UNPLANNED</p>
            <span>-</span>
          </div>
          <div class="box box5">
            <p>KETERANGAN</p>
            <span>-</span>
          </div> -->
        </div>
      </div>

      <hr>
      <div class="card-body">
        <h6 class="card-title my-3">TAMBAH CUSTOMER</h6>
        <form action="{{ route('schedule.storeDetail') }}" class="form-group" id="Form" name="Form" method="POST">
          @csrf
          <input type="hidden" name="id_schedule" value="{{ $dataschedule->id }}">

          <div class="form-group">
            <label for="name" class="control-label mb-1">Nama Customer/Outlet</label>
              <div class="">
                <select type="text" class="form-control form-control-sm" name="customer" readonly value="" id="searchCust"></select>
              </div>
          </div>

          <!-- <div class="d-flex flex-row justify-content-between align-items-center gap-2 m-3 mt-4"> -->
              <button type="submit" class="btn btn-primary btn-sm flex-grow-1" value="create" name="saveBtn" id="saveBtn">Simpan Data</button>
              <a href="{{ route('schedule.index') }}" class="btn btn-sm btn-danger flex-grow-1">Kembali</a>
          <!-- </div> -->
        
        </form>
      </div>
      <hr>

      <div class="tableContainer">
        <span>LIST CUSTOMER</span>
        <table class="mainTable table-bordered data-table">
        <!-- <table class="table table-bordered data-table"> -->
          <thead class="thead">
            <tr class="theadTr">
              <th class="theadTrTh">No</th>
              <th class="theadTrTh"> Customer Code </th>
              <th class="theadTrTh"> Customer Name </th>
              <th class="theadTrTh"> Customer Address </th>
              <th class="theadTrTh"> Customer Area </th>
              <th class="theadTrTh"> Jenis Customer </th>
              <th class="theadTrTh"> Action </th>
            </tr>
          </thead>
          
          <tbody class="tbody">
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
  $(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

            $('#searchCust').select2({
                placeholder: 'Cari Customer',
                ajax: {
                url: "{{ route('customer.autocomplete') }}",
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

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('schedule.show', [ 'schedule'=>$dataschedule->id ]) }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'custCode', name: 'custCode'},
            {data: 'custName', name: 'custName'},
            {data: 'custAddress', name: 'custAddress'},
            {data: 'custArea', name: 'custArea'},
            {data: 'tipe', name: 'tipe'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });

    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');
    
        $.ajax({
          data: $('#Form').serialize(),
          url: "{{ route('schedule.storeDetail') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#Form').trigger("reset");
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });

    $('body').on('click', '.deleteDetail', function () {
     
     var detail_id = $(this).data("id");
     var url = "{{ route('schedule.destroyDetail', ":detail_id") }}";
     url = url.replace(':detail_id', detail_id);

     confirm("Apakah Anda Yakin Ingin Menghapus Data Ini ?");
   
     $.ajax({
         type: "DELETE",
         url: url,
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
