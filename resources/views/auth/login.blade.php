<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/images/logo/logo-SEDAP-MANTAP.png') }}">
    
    <title>Sign in</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/signin.css') }}">
        <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/images/logo/logo-SEDAP-MANTAP.png') }}">
    <!-- <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <!-- <link href="signin.css" rel="stylesheet"> -->
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form action="{{ route('cek_login') }}" method="POST">
    @csrf
    <img class="mb-4" src="{{asset('images/logo/Sedap-Mantap-Logo.png')}}" alt="" width="100" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="Email" name="email">
      <label for="floatingInput">Email atau Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="1" name="remember"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary mb-1" type="submit">Sign in</button>
    <a href="javascript:void(0)" class="text-secondary text-decoration-none" id="forgetPassword">Forgot password?</a>
  </form>

  {{-- Forget Password --}}
  <div class="modal fade" id="ajaxModel" aria-hidden="true">
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
  </div>
</main>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  
<script>
      $('#forgetPassword').click(function () {
        $('#ajaxModel').modal('show');
      });
</script>
</body>
</html>
