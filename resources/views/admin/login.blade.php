<!doctype html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Online Assesment CDC Polije">
      <meta name="author" content="Career Development Counseling Politeknik Negeri Jember">
    <meta name="generator" content="Politeknik Negeri Jember">
    <title>Login | CDC Polije</title>
    
    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <style>
      @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
      body {
        font-family: 'Inter', Helvetica, sans-serif
        
      }

      .bg {
        position: relative;
        background: url('https://jooinn.com/images/city-landscape-39.jpg');
        /* background-size: cover */

      }

      .overlay {
        background-color:  rgba(0, 0, 0, 0.732);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
      }
      .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
      }
      /* html,
      body {
        height: 100%;
        width: 100%
      }

      body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      } */
/* 
      .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
      }
      .form-signin .checkbox {
        font-weight: 400;
      }
      .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
      }
      .form-signin .form-control:focus {
        z-index: 2;
      }
      .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }
      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      } */

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body class="text-start ">
    {{-- <div class="bg"><div class="overlay"></div></div> --}}
    {{-- <div class="overlay"></div> --}}
    <br><br><br>
    <div class="row justify-content-center">
      @if (session()->has('success'))
                  <div class="alert alert-success alert-dismissable fade show justify-content-between" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close" style="text-align: end"></button>
                  </div>
              @endif
              @if (session()->has('login-error'))
                  <div class="alert alert-danger alert-dismissable fade show justify-content-between" role="alert">
                    {{session('login-error')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="text-align: end; display:inline-flex; "></button>
                  </div>
              @endif
      <div class="col-lg-4 col-xl-4 col-md-6 col-sm-10">
        <form class="form-signin" method="post" action="/admin/login">
          {{-- <img class="mb-4 mt-6 text-center" src="../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> --}}
          @csrf
          <h1 class="h3 mb-3 font-weight-semibold text-center">Sign In</h1>
          <div class="mb-3">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="text" id="inputEmail" class="form-control  @error('email') is-invalid @enderror" placeholder="Email address"
             required autofocus name="email" value="{{ old('email')}}">
            @error('email')
                        <div class="invalid-feedback text-start" >{{$message}}</div>
                    @enderror
          </div>
          <div class="mb-4">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
          </div>
          {{-- <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div> --}}
          <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
          {{-- <p class="mt-5 mb-3 text-muted">&copy; 2017-2022</p> --}}
        </form>

      </div>
    </div>


    
  </body>
</html>
