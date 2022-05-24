<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- CSRF Token -->
  <meta name="_token" content="{!! csrf_token() !!}">
 
  <link rel="stylesheet" type="text/css" href="{{ asset(mix('css/app.css')) }}">
  <title>@yield('title')</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Welcome</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item me-3">
            <a class="nav-link active" aria-current="page" href="{{ url('articles') }}">articles [31]-[33]</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link" aria-current="page" href="{{ url('conversations') }}">授權 [50]-[54]</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link" aria-current="page" href="{{ url('login') }}">登入註冊 [34]-[35]</a>
          </li>
          <li class="nav-item dropdown me-3">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- 參考官方文件說明 https://github.com/mewebstudio/captcha -->
  {{-- <div class="my-5">{!! captcha_img() !!}</div> <!-- Return Image : 使用這個 -->
  <div class="my-5">{!! captcha_src() !!}</div> <!-- Return URL -->
  <div class="my-5">{!! captcha_img('flat') !!}</div>    <!-- 背景灰: BigImage -->
  <div class="my-5">{!! Captcha::img('inverse') !!}</div> <!-- 背景黑 Image --> --}}


  <div class="container mt-10">
    @yield('content')
  </div>

  <p style="height:500px"></p>

  <!-- 以下為 JS Code =========================================== -->
  <script src="{{ asset(mix('js/app.js')) }}"></script> {{-- 引入 jquery --}}
  <script src="{{ asset(mix('js/jquery.datetimepicker.full.min.js')) }}"></script>
  <script src="{{ asset(mix('js/moment.min.js')) }}"></script>
  <script src="{{ asset(mix('js/sweetalert2.js')) }}"></script>

  @yield('scripts')

  <script>
    function getCurrentUrl(){ // 設定抓取 CurrentUrl (Domain name)
      // console.log(window.location.origin);
      
      /*
      // 測試環境 open
      let thisLocalname = window.location.origin;
      let thisCurrentUrl = thisLocalname.substr(0, 4)=='http' ? thisLocalname : `http://${thisLocalname}`;
      */
      
      // 正式環境 open : 補上路徑 /report
      let thisLocalUrl = thisLocalname.substr(0, 4)=='http' ? thisLocalname : `https://${thisLocalname}`;
      let thisCurrentUrl = `${thisLocalUrl}/report`;
      

      return thisCurrentUrl;
    }

    function alert(icon, title){
      Swal.fire({
        toast: true,
        position: 'top-end',
        icon: icon,   // 'error',
        title: title, //'此筆沒有資料...',
        showConfirmButton: false,
        timer: 1500
      })
    }
  </script>

</body>
</html>