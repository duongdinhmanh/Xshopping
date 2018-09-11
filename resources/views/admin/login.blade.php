<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xshopping| </title>
    <!-- Bootstrap -->
    <base href="{{asset('')}}">
    <link href="assets/vendors_style/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/vendors_style/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/vendors_style/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="assets/vendors_style/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="assets/build/css/custom.min.css" rel="stylesheet">
</head>
<body class="login">
    <div>
         @if (Session::has('danger'))
            <div class="alert alert-danger" style="text-align: center">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Title!</strong> {{Session::get('danger')}}
            </div>
        @endif
        <div class="clearfix"> </div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{ route('LoginAdmin') }}" method="POST">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" name="email" placeholder="email" required="" />
                @if($errors->has('email'))
                    <p style="color:red">
                      {{$errors->first('email')}}
                    </p>
                  @endif
            </div>
            <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
                @if($errors->has('password'))
                    <p style="color:red">
                      {{$errors->first('password')}}
                    </p>
                 @endif
            </div>
            <div>
                <button class="btn btn-default submit" type="submit">
                  Log in
              </button>
              <a class="reset_pass" href="#">Lost your password?</a>
          </div>
          <div class="clearfix"></div>
          <div class="separator">
            <p class="change_link">New to site?
              <a href="{{ route('Login') }}#signup" class="to_register"> Create Account </a>
          </p>
          <div class="clearfix"></div>
          <br />
          <div>
              <img style="margin-bottom: 50px" src="assets/upload/config/xstore-logo.png" alt="xstore-logo.png">
              <br>
              <p>©2018 All Rights Reserved. Xshopping! </p>
          </div>
      </div>
  </form>
</section>
</div>
<div id="register" class="animate form registration_form">
  <section class="login_content">
    <form>
      <h1>Create Account</h1>
      <div>
        <input type="text" class="form-control" placeholder="Username" required="" />
    </div>
    <div>
        <input type="email" class="form-control" placeholder="Email" required="" />
    </div>
    <div>
        <input type="password" class="form-control" placeholder="Password" required="" />
    </div>
    <div>
        <input type="text" class="form-control" placeholder="address" required="" />
    </div>
    <div>
        <input type="text" class="form-control" placeholder="phone" required="" />
    </div>
    <div>
        <a class="btn btn-default submit" href="index.html">Submit</a>
    </div>
    <div class="clearfix"></div>
    <div class="separator">
        <p class="change_link">Already a member ?
          <a href="{{ route('Login') }}#signin" class="to_register"> Log in </a>
      </p>
      <div class="clearfix"></div>
      <br />
      <div>
          <img src="assets/upload/config/xstore-logo.png" alt="xstore-logo.png">
          <p>©2018 All Rights Reserved. Xshopping! </p>
      </div>
  </div>
</form>
</section>
</div>
</div>
</div>
</body>
</html>
