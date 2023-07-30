<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name') }} | Expired Password </title>

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
          <img src="{{asset('admin/assets/dist/img/nepal-logo.png')}}" alt="HDRS Logo" class="brand-image img-circle elevation-3" style="opacity: .8; height:20%; width:20%;">
          <div class="login-logo">
            <a href="{{ route('admin.login') }}" class="login-box-msg" style="font-size:50%;"><b>{{ config('app.name') }} </b></a>
          </div>
        </div>
        <h1 class="text-center"> Update Expired Password </h1>

        <form action="{{route('user.password_expired')}}" method="POST" id="change-password-form">
          @csrf
          @include('admin.flash-message')
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Old Password" name="old_password" id="old_password" required="required" value="{{ old('old_password') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-eye toggle_pwd" data-id="old_password"></span>
              </div>
            </div>
          </div>
          <span class="text-danger password-error"> {{ $errors->first('old_password') }}</span>
          
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="New Password" name="password" id="new_password" required="required" value="{{ old('password') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-eye toggle_pwd" data-id="new_password"></span>
              </div>
            </div>
          </div>
          <span class="text-danger password-error"> {{ $errors->first('password') }}</span>

          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" id="confirm_password" required="required" value="{{ old('password_confirmation') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-eye toggle_pwd" data-id="confirm_password"></span>
              </div>
            </div>
          </div>
          <span class="text-danger password-confirmation-error"> {{ $errors->first('password_confirmation') }}</span>

          <div class="row">
            <div class="col-12 text-center mb-3">
              <button type="submit" class="btn btn-primary btn-block">Update Password</button>
            </div>
          </div>
        </form>

      </div>

    </div>
  </div>

  <script>
    $('#change-password-form').on('submit', function(event) {
      $('.password-error,.password-confirmation-error').text('');
      var password = $('#new_password').val();
      var reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/
      if (password.length < 8) {
        $('.password-error').text('Password should be of 8 characters');
        return false;
      } else {
        if (password.match(reg)) {
          if (password != ($('#confirm_password').val())) {
            $('.password-confirmation-error').text('Confirm Password did not match');
            return false;
          }
          return true;
        } else {
          $('.password-error').text('Password must contain at least One Capital, One small letter ,A Number and One Symbol');
          return false;
        }
      }
    });

    $(".toggle_pwd").on('click', function(event) {
      $(this).toggleClass("fa-eye fa-eye-slash");
      var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
      var input_id = '#' + $(this).attr('data-id');
      $(input_id).attr("type", type);
    });
  </script>
</body>

</html>