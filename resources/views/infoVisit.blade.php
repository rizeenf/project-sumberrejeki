@extends('layout')

@section('content')    

  <div class="contentInfovisit">
    <div class="containerInfoVisit">
      <div class="boxContainer">
        <span>DETAIL KUNJUNGAN</span>
        <div class="boxWrapper">
          <div class="box box1">
            <p>NAMA</p>
            <span class="nama">AGUS PRATIWI</span>
          </div>
          <div class="box box2">
            <p>TANGGAL</p>
            <span>15-10-2023 25:00</span>
          </div>
          <div class="box box3">
            <p>MAPS</p>
            <span></span>
          </div>
          <div class="box box4">
            <div class="d-flex flex-row mb-3">
              <div class=" flex-grow-1">
                <p>WAKTU MULAI</p>
                <span>15-10-2023 25:00</span>
              </div>
              <div class=" flex-grow-1">
                <p>WAKTU SELESAI</p>
                <span>15-10-2023 25:00</span>
              </div>
            </div>
            <p>DESKRIPSI</p>
            <span>-</span>
          </div>
          <div class="box box5">
            <p>DIKUNJUNGI</p>
            <span>-</span>
          </div>
          <div class="box box5">
            <p>GEOMISMATCH</p>
            <span>-</span>
          </div>
          <div class="box box5">
            <p>PLANNED</p>
            <span>-</span>
          </div>
          <div class="box box5">
            <p>NO SALE</p>
            <span>-</span>
          </div>
          <div class="box box5">
            <p>UNPLANNED</p>
            <span>-</span>
          </div>
          <div class="box box5">
            <p>KETERANGAN</p>
            <span>-</span>
          </div>
        </div>
      </div>
      <div class="tableContainer">
        <span>DAILY VISIT ITEMS</span>
        <table class="mainTable">
          <thead class="thead">
            <tr class="theadTr">
              <th class="theadTrTh">No</th>
              <th class="theadTrTh"> Customer Code </th>
              <th class="theadTrTh"> Customer Name </th>
              <th class="theadTrTh"> Customer Address </th>
              <th class="theadTrTh"> Check In Time </th>
              <th class="theadTrTh"> Check Out Time </th>
              <th class="theadTrTh"> Description </th>
              <th class="theadTrTh"> Pseq </th>
              <th class="theadTrTh"> Aseq </th>
              <th class="theadTrTh"> Sale </th>
              <th class="theadTrTh"> Mismatch </th>
            </tr>
          </thead>
          <tbody class="tbody">
            <tr>
              <td> 1 </td>
              <td>
                <div> CPTE0015 </div>
              </td>
              <td>
                <div> ENIYAH 67 </div>
              </td>
              <td>
                <div>
                  JL. BARU PASAR MINGGU KEC.PALIMANAN (BELAKANG PASAR PALIMANAN)
                </div>
              </td>
              <td>
                <div> 14:52 </div>
              </td>
              <td>
                <div> 15:00 </div>
              </td>
              <td>
                <div>
                  Back up nota aging &gt;35; Pemilik tidak di toko; Reminding
                  via call
                </div>
              </td>
              <td>
                <div> 1 </div>
              </td>
              <td>
                <div> 1 </div>
              </td>
              <td>
                <div> 0 </div>
              </td>
              <td>
                <div>
                  <input type="checkbox" disabled="true" />
                  <label></label>
                </div>
              </td>
            </tr>
            <tr>
              <td> 2 </td>
              <td>
                <div> CPTE0015 </div>
              </td>
              <td>
                <div> ENIYAH 67 </div>
              </td>
              <td>
                <div>
                  JL. BARU PASAR MINGGU KEC.PALIMANAN (BELAKANG PASAR PALIMANAN)
                </div>
              </td>
              <td>
                <div> 14:52 </div>
              </td>
              <td>
                <div> 15:00 </div>
              </td>
              <td>
                <div>
                  Back up nota aging &gt;35; Pemilik tidak di toko; Reminding
                  via call
                </div>
              </td>
              <td>
                <div> 1 </div>
              </td>
              <td>
                <div> 1 </div>
              </td>
              <td>
                <div> 0 </div>
              </td>
              <td>
                <div>
                  <input type="checkbox"  />
                  <label></label>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>


@endsection
