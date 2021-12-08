<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Twitter -->
  <meta name="twitter:site" content="@themepixels">
  <meta name="twitter:creator" content="@themepixels">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="MoriPhar">
  <meta name="twitter:description" content="Phần mềm quản lý nhà thuốc">
  <meta name="twitter:image" content="{{ asset('image/logo.jpg') }}">

  <!-- Facebook -->
  <meta property="og:url" content="https://moriphar.com/">
  <meta property="og:title" content="MoriPhar">
  <meta property="og:description" content="Phần mềm quản lý nhà thuốc">

  <meta property="og:image" content="{{ asset('image/logo.jpg') }}">
  <meta property="og:image:secure_url" content="{{ asset('image/logo.jpg') }}">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="600">
  <meta property="og:image:height" content="200">

  <!-- Meta -->
  <meta name="description" content="Phần mềm quản lý nhà thuốc">
  <meta name="author" content="MoriPhar">

  <title>Đăng nhập - MoriPhar</title>

  <!-- vendor css -->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="../lib/Ionicons/css/ionicons.css" rel="stylesheet">

  <!-- Bracket CSS -->
  <link rel="stylesheet" href="../css/bracket.css">
</head>

<body>

  <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
      <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> ĐĂNG NHẬP<span class="tx-normal">]</span></div>
      <div class="tx-center mg-b-60">Quản lý nhà thuốc</div>

      <form method="POST" action="{{ route('login') }}" class="hoanganhdzai">
        @csrf
        <div class="form-group">
          <label>Tên đăng nhập</label>
          <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

          @error('username')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div><!-- form-group -->
        <div class="form-group">
          <label>Mật khẩu</label>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror

          <a href="" class="tx-info tx-12 d-block mg-t-10">Quên mật khẩu?</a>
        </div class="pd-t-20"><!-- form-group -->
        <button type="submit" class="btn btn-info btn-block">Đăng nhập</button>
      </form>
    </div><!-- login-wrapper -->
  </div><!-- d-flex -->
  <style>
    .btn{
      box-shadow: 0 1px 3px rgb(0 0 0 / 10%), 0 1px 2px rgb(0 0 0 / 18%);
      cursor: pointer;
    }
  </style>
  <script src="../lib/jquery/jquery.js"></script>
  <script src="../lib/popper.js/popper.js"></script>
  <script src="../lib/bootstrap/bootstrap.js"></script>

</body>
</html>