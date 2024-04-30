@extends('layout')

@section('content')    

  <div class="content">
    <div class="formWrapper">
      <div class="d-flex flex-row gap-5 mt-2 ">
          <h3>Edit Profile</h3>
      </div>
      <form action="{{ route('customer.store') }}" method="POST" class="formFlex" enctype="multipart/form-data">
      @csrf
          <!-- DATA CUSTOMER/OUTLET -->
          <div class="leftFormProfile">
              <div class="form-group">
                  <label for="profile" class="col-sm-4 control-label mb-1 ">Profile photo</label>
                  <div class="col-sm-12 d-flex flex-row justify-content-center align-items-center gap-5">
                    <img src="{{asset('images/avatar/09.png')}}" alt="Avatar" class="editAvaImage">
                    <input type="file" accept="image/*" name="profile" class="form-control form-control-sm" placeholder="Select photo">
                  </div>
              </div>

              <div class="form-group">
                  <label for="name" class="col-sm-4 control-label mb-1">Full name</label>
                  <div class="col-sm-12">
                      <input type="text" class="form-control form-control-sm" name="name" placeholder="Nama lengkap" value="" required>
                  </div>
              </div>

              <div class="form-group">
                  <label for="name" class="col-sm-4 control-label mb-1">Email</label>
                  <div class="col-sm-12">
                      <input type="email" class="form-control form-control-sm" name="email" placeholder="Email" value="">
                  </div>
              </div>

              <div class="form-group">
                  <label for="name" class="col-sm-4 control-label mb-1">Password</label>
                  <div class="col-sm-12">
                      <input type="password" class="form-control form-control-sm" name="password" placeholder="Password" value="">
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
