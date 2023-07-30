<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name') }} | Forgot Password </title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="{{ asset('admin/assets/plugins/fontawesome-free/css/all.min.css') }}">

  <link rel="stylesheet" href="{{ asset('admin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('admin/assets/dist/css/adminlte.min.css?v=3.2.0') }}">
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
        <img src="{{asset('admin/assets/dist/img/nepal-logo.png')}}" alt="HDRS Logo" class="brand-image img-circle elevation-3" style="opacity: .8; height:20%; width:20%;">
          <div class="login-logo">
            <a href="{{ route('admin.login') }}" class="login-box-msg" style="font-size:50%;"><b>{{ config('app.name') }} </b></a>
          </div>
        </div>
        <h1 class="text-center"> Forgot Password </h1>

        <form action="{{route('user.forgot_password_mail')}}" method="POST">
          @csrf
          @include('admin.flash-message')
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" id="emailadress" required="required">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 text-center mb-3">
              <button type="submit" class="btn btn-primary btn-block">Send Confirmation Email</button>
            </div>
          </div>
        </form>

      </div>

    </div>
  </div>


  <script src="{{ asset('admin/assets/plugins/jquery/jquery.min.js') }}"></script>

  <script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <script src="{{ asset('admin/assets/dist/js/adminlte.min.js?v=3.2.0') }}"></script>
</body>

</html>