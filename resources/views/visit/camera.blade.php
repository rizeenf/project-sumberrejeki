<!DOCTYPE html>
<html>
<head>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/images/logo/logo-SEDAP-MANTAP.png') }}">
    <title>laravel webcam capture image and save from camera - ItSolutionStuff.com</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        #results { padding:20px; border:1px solid; background:#ccc; }
    </style>
</head>
<body>
    
<div class="container">
    <!-- <h1 class="text-center">Laravel webcam capture image and save from camera - ItSolutionStuff.com</h1> -->
     
    <form method="POST" action="">
        @csrf
        <!-- <div class="row"> -->
            <input type="file" accept="image/*" capture="camera">
            <!-- <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div class="col-md-6">
                <div id="results">Your captured image will appear here...</div>
            </div>
            <div class="col-md-12 text-center">
                <br/>
                <button class="btn btn-success">Submit</button>
                <a href="{{ route('visit.list') }}" class="btn btn-danger">Kembali</a>
            </div>
        </div> -->
    </form>
</div>
   
</body>
</html>