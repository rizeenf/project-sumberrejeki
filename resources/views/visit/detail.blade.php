@extends('layout')

@section('content')    

  <div class="contentInfovisit">
    <div class="containerInfoVisit">
      <div class="boxContainer">
        <span>DETAIL KUNJUNGAN</span>
        <div class="boxWrapper">
          <div class="box box1">
            <p>NAMA</p>
            <span class="nama">{{ $sumVisit->staffName }}</span>
          </div>
          <div class="box box2">
            <p>TANGGAL</p>
            <span>{{ $sumVisit->dateVisit }}</span>
          </div>
          <div class="box box3">
            <p>MAPS</p>
            <span></span>
          </div>
          <div class="box box4">
            <div class="d-flex flex-row mb-3">
              <div class=" flex-grow-1">
                <p>WAKTU MULAI</p>
                <span>{{ $sumVisit->firstIn }}</span>
              </div>
              <div class=" flex-grow-1">
                <p>WAKTU SELESAI</p>
                <span>{{ $sumVisit->lastOut }}</span>
              </div>
            </div>
            <!-- <p>DESKRIPSI</p>
            <span>-</span> -->
          </div>
          <div class="box box5">
            <p>KUNJUNGAN CUSTOMER</p>
            <span>{{ $sumVisit->custVisited }}</span>
          </div>
          <div class="box box5">
            <p>KUNJUNGAN GERAI</p>
            <span>{{ $sumVisit->outletVisited }}</span>
          </div>
          <div class="box box5">
            <p>KUNJUNGAN TERDAPAT FOTO</p>
            <span>{{ $sumVisit->photoVisited }}</span>
          </div>
          <div class="box box5">
            <p>TOTAL KUNJUNGAN</p>
            <span>{{ $sumVisit->visited }}</span>
          </div>
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
      <div class="tableContainer">
        <span>DAILY VISIT ITEMS</span>
        <table class="mainTable table-bordered data-table">
        <!-- <table class="table table-bordered data-table"> -->
          <thead class="thead">
            <tr class="theadTr">
              <th class="theadTrTh">No</th>
              <th class="theadTrTh"> Customer Code </th>
              <th class="theadTrTh"> Customer Name </th>
              <th class="theadTrTh"> Customer Address </th>
              <th class="theadTrTh"> Check In Time </th>
              <th class="theadTrTh"> Check Out Time </th>
              <th class="theadTrTh"> Description </th>
              <th class="theadTrTh"> Jenis Customer </th>
              <th class="theadTrTh"> Foto Visit </th>
            </tr>
          </thead>
          
          <tbody class="tbody">
          </tbody>
        </table>
      </div>



    </div>

    <div id="myModal" class="modall">
      <span class="close">&times;</span>
      <img class="modall-content" id="img01">
    </div>
    
    {{-- <div class="modal fade" id="ajaxModel" aria-hidden="false">
      <div class="modal-dialog modal-dialog-centered modal-sm">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Forgot password</h4>
              </div>
              <div class="modal-body">
                  <form class="form-horizontal">
                    <div class="form-group d-flex flex-column gap-3 ">
                        <label for="email" class="col-sm-4 text-decoration-none text-nowrap">Send an email confirmation</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control form-control-sm" id="code" name="code" placeholder="Email ..." value="" maxlength="5" required="">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm mt-3" >Send email</button>
                  </form>
              </div>
          </div>
      </div>
    </div> --}}


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
        ajax: "{{ route('call.show', ['date'=>$sumVisit->dateVisit, 'staff'=>$sumVisit->staffId]) }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'custCode', name: 'custCode'},
            {data: 'custName', name: 'custName'},
            {data: 'custAddress', name: 'custAddress'},
            {data: 'timeIn', name: 'timeIn'},
            {data: 'timeOut', name: 'timeOut'},
            {data: 'notes', name: 'notes'},
            {data: 'tipe', name: 'tipe'},
            {data: 'image', name: 'image', "render": 
              function (data, type, full, meta) {
                return "<img id=\"myImg\" class=\"myImg\" src=\""+data+"\" height=\"50\">";
              },
            orderable: false, searchable: false},
            //{data: 'action', name: 'action', orderable: false, searchable: false}
        ]
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
