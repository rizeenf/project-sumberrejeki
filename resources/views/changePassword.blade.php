@extends('layout')

@section('content')    

  <div class="content">
    <div class="formWrapper">
      <div class="d-flex flex-row gap-5 mt-2 ">
          <h3>Change password</h3>
      </div>
      <form action="{{ route('customer.store') }}" method="POST" class="formFlex" enctype="multipart/form-data">
      @csrf
          <!-- DATA CUSTOMER/OUTLET -->
          <div class="leftFormProfile">
              
              <div class="form-group">
                  <label for="oldPassword" class="col-sm-4 control-label mb-1">Password Lama</label>
                  <div class="col-sm-12">
                      <input type="password" class="form-control form-control-sm" name="oldPassword" placeholder="Password " value="">
                  </div>
              </div>
              <div class="form-group">
                  <label for="newPassword" class="col-sm-4 control-label mb-1">Password Baru</label>
                  <div class="col-sm-12">
                      <input type="password" class="form-control form-control-sm" name="newPassword" placeholder="Password " value="">
                  </div>
              </div>
              <div class="form-group">
                  <label for="newPassword" class="col-sm-4 control-label mb-1">Ulangi password baru</label>
                  <div class="col-sm-12">
                      <input type="password" class="form-control form-control-sm" name="newPassword" placeholder="Password" value="">
                  </div>
              </div>
                          
          </div>
          <hr/>
          <div class="rightForm">
              <div class="d-flex flex-row justify-content-between align-items-center gap-2 m-3 mt-4">
                <button type="submit" class="btn btn-primary flex-grow-1" value="create">Simpan</button>
                <a href="{{ route('home') }}" class="btn btn-danger flex-grow-1">Batal</a>    
              </div>
          </div>  

      </form>
  </div>


    

  </div>
</div>




@endsection
