<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <link rel="icon" href="{{ asset('image/santri.png') }}" type="images/x-icon" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
  <body>
    <div class="login-box">
      <div class="container main">
        <div class="row">
          <div class="col-md-6 side-image">
              <img src="{{ asset('image/santri.png') }}" class="d-flex justify-content-center align-items-center" width="100%" alt="Santri">
          </div>
          <div class="right col-md-6">
            <div class="input-box">
              <header>LOGIN</header>
              <div class="input-field">
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    <label for="email">Email</label>
                  </div>
                  <div class="form-floating">
                    <input type="password" class="form-control d-flex align-items-center" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    <img src="{{ asset('image/eye-close.png') }}" id="eyeicon" class="eye-close ms-auto">
                  </div>
                  <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary mt-3">
                      Login
                    </button>
                  </div>
                </form>
              <div class="signin mt-3">
                <span style="text-decoration: none;">Belum punya akun? <a href="{{ route('register') }}" style="text-decoration: none;">Daftar di sini</a></span>
                <br>
                <br>
                <span><a href="{{ url('/') }}" style="text-decoration: none;">Kembali</a></span>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ asset('/js/login.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
