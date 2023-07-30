<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name') }} | Admin Log in</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="{{ asset('admin/assets/plugins/fontawesome-free/css/all.min.css') }}">

  <link rel="stylesheet" href="{{ asset('admin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('admin/assets/dist/css/adminlte.min.css?v=3.2.0') }}">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <style>
    body.login-page {
      background-size: cover;
      background-position: center;
      background-image: url('admin/assets/dist/img/bg-logo.jpg') !important;
      overflow-y: hidden;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="card">
      <div class="card-body login-card-body">
        <div class="mb-2 text-center">
          <img src="{{asset('admin/assets/dist/img/nepal-logo.png')}}" alt="Palika Logo" class="brand-image img-circle elevation-3" style="opacity: .8; height:20%; width:20%;">
          <div class="login-logo">
            <a href="{{ route('admin.login') }}" class="login-box-msg" style="font-size:50%;"><b>{{ config('app.name') }}</b></a>
          </div>
        </div>

        <form action="{{ route('admin.login') }}" method="POST" id="loginForm">
          @csrf
          @include('admin.flash-message')
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" required name="email" id="email" value="{{ old('email') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            <span class="text-danger invalid-feedback" id="email-error" role="alert"> {{ $errors->first('email') }}</span>
          </div>

          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" required name="password" id="password" value="{{ old('password') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <span class="text-danger invalid-feedback" id="password-error"> {{ $errors->first('password') }}</span>
          </div>

          <div class="row">
            <div class="col-12 text-center mb-3">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
          </div>
        </form>

        <p class="mb-1">
          <a href="{{ route('user.forgot_password') }}">I forgot my password</a>
        </p>
      </div>

    </div>
  </div>
  <!-- Custom Utils js -->

  <script src="{{asset('js/palikaUtils.js')}}"></script>
</body>

</html>