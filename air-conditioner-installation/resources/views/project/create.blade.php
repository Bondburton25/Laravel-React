<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>สร้าง Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    
  </head>
  <body class="py-5">
    <!-- Start Container -->
    <div class="container">
      <!-- Start Header Content -->
      <div class="row">
        <div class="col s12 center-align">
          <h5>สร้าง Project</h5>
        </div>
      </div>
      @if (\Session::has('success'))
        <div class="alert alert-success">
          {!! \Session::get('success') !!}
        </div>
    @endif
      <div class="row">
        <form enctype="multipart/form-data" action="{{ route('projects.store') }}" method="POST" class="form">
        {{ csrf_field() }}

        <div class="form-group mb-4">
            <label for="name" class="form-label">ชื่อโครงการ <span class="text-danger">*</span></label>
            <input class="form-control" placeholder="ชื่อโครงการ" id="name" name="name" required></textarea>
        </div>

        <div class="form-group mb-4">
            <label for="customer" class="form-label">ลูกค้า</label>
            <input class="form-control" placeholder="ระบุชื่อลูกค้า" name="customer" id="customer"></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="address" class="form-label">ที่ตั้งโครงการ</label>
            <textarea class="form-control" placeholder="address" id="address" name="address" style="height: 100px"></textarea>
        </div>
        
        <div class="form-group mb-3">
            <span class="btn btn-outline-primary" onclick="getLocation()"><i class="fa-solid fa-location-crosshairs"></i> {{ __('ค้นหาตำแหน่งปัจจุปัน') }}</span>
        </div>

        <input type="hidden" id="longitude" name="longitude">
        <input type="hidden" id="latitude" name="latitude">
        <input type="hidden" id="lineUserid" name="lineUserid">

        <div id="map-content"></div>
          <button id="btn" class="btn btn-primary" type="submit">ส่งข้อมูล</button>
        </form>
      </div>
    </div>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <!-- Integrating the LIFF SDK -->
    <script src="https://static.line-scdn.net/liff/edge/versions/2.15.0/sdk.js"></script>

    <script type="text/javascript">
        function runApp() {
            liff.getProfile().then(profile => {
                document.getElementById("lineUserid").value = profile.userId;            
            }).catch(err => console.error(err));
        }
        // JS Team 1660808375-1oORkKr8
        // JS service 1657806485-ZVqlPEzx
        liff.init({ liffId: "1660808375-1oORkKr8" }, () => {
            if (liff.isLoggedIn()) {
                runApp();
            } else {
                liff.login();
            }
        }, err => console.error(err.code, error.message));
      // Initialize LIFF
    //   liff
    //     .init({ liffId: "<LIFF ID>" })
        // .then(() => {
        //   runApp();
        // })
        // .catch((err) => {
        //   console.error(err.code, error.message);
        // });

        var mapContent = document.getElementById("map-content");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else { 
                mapContent.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            console.log(position.coords.latitude);
            console.log(position.coords.longitude);
            var latitude = document.getElementById("latitude");
            var longitude = document.getElementById("longitude");
            
            latitude.setAttribute("value", position.coords.latitude);
            longitude.setAttribute("value", position.coords.longitude);

            mapContent.innerHTML = "Latitude: " + position.coords.latitude + 
            "<br>Longitude: " + position.coords.longitude;
            mapContent.innerHTML = "<iframe class='border-0 mb-5' height='500px' width='100%' src='https://maps.google.com/maps?q="+position.coords.latitude+","+position.coords.longitude+"&hl=th;z=14&amp;output=embed'></iframe>";
        }

        function showError(error) {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                x.innerHTML = "User denied the request for Geolocation."
                break;
                case error.POSITION_UNAVAILABLE:
                x.innerHTML = "Location information is unavailable."
                break;
                case error.TIMEOUT:
                x.innerHTML = "The request to get user location timed out."
                break;
                case error.UNKNOWN_ERROR:
                x.innerHTML = "An unknown error occurred."
                break;
            }
        }
    </script>
  </body>
</html>
