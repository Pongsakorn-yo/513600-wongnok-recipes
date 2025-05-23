<!DOCTYPE html>
<html lang="th" dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>เมนูอาหาร - เข้าสู่ระบบ</title>

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="/backend/images/logo.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="/backend/images/logo.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="/backend/images/logo.png" />
  <link rel="shortcut icon" type="image/x-icon" href="/backend/images/logo.png" />

  <!-- Google Fonts: Kanit -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Vendor CSS -->
  <link href="/backend/vendors/simplebar/simplebar.min.css" rel="stylesheet" />
  <link href="/backend/assets/css/theme.min.css" rel="stylesheet" />
  <link href="/backend/assets/css/user.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

  <!-- Custom CSS -->
  <style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    a,
    div,
    p,
    span,
    button,
    input,
    textarea {
      font-family: 'Kanit', sans-serif !important;
    }

    body {
      background: linear-gradient(to right, #74ebd5, #9face6);
    }

    .card {
      border-radius: 1rem;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .form-control:focus {
      box-shadow: 0 0 0 0.2rem rgba(115, 103, 240, 0.25);
    }

    .input-group-text {
      background-color: #f0f0f0;
    }

    .logo {
      border-radius: 50%;
    }
  </style>
</head>

<body>
  <main class="main" id="top">
    <div class="container">
      <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
          <div class="text-center mb-4">
            <img src="/backend/images/logo.png" alt="Logo" width="20%" class="logo mb-2" />
            <h4 class="text-white">ระบบเมนูสูตรอาหาร</h4>
          </div>
          <div class="card border-0">
            <div class="card-body p-4 p-sm-5">
              <h5 class="text-center mb-4">เข้าสู่ระบบ</h5>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input class="form-control" name="email" type="email" placeholder="Email address" required />
                  </div>
                </div>
                <div class="mb-3">
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input class="form-control" name="password" type="password" placeholder="Password" required />
                  </div>
                </div>
                <div class="d-grid mt-3">
                  <button class="btn btn-primary" type="submit">เข้าสู่ระบบ</button>
                </div>
              </form>
              <div class="text-center mt-3">
                <a href="#" class="small">ลืมรหัสผ่าน?</a> | <a href="/register" class="small">สมัครสมาชิก</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Scripts -->
  <script src="/backend/vendors/popper/popper.min.js"></script>
  <script src="/backend/vendors/bootstrap/bootstrap.min.js"></script>
  <script src="/backend/vendors/anchorjs/anchor.min.js"></script>
  <script src="/backend/vendors/is/is.min.js"></script>
  <script src="/backend/vendors/fontawesome/all.min.js"></script>
  <script src="/backend/vendors/lodash/lodash.min.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
  <script src="/backend/vendors/list.js/list.min.js"></script>
  <script src="/backend/assets/js/theme.js"></script>
</body>

</html>
