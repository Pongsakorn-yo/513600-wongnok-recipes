<!DOCTYPE html>
<html lang="th" dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>สมัครสมาชิก - เมนูอาหาร</title>

  <!-- Favicon -->
  <link rel="icon" href="/backend/images/logo.png" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  <!-- CSS -->
  <link href="/backend/assets/css/theme.min.css" rel="stylesheet" />
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
    textarea,
    select,
    label {
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
              <h5 class="text-center mb-4">สมัครสมาชิก</h5>
              <form method="POST" action="/user/store" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="name">ชื่อ</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" name="name" id="name" class="form-control" placeholder="ชื่อ" required>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="email">Email</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="password">Password</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" minlength="4" maxlength="20" required>
                  </div>
                </div>

                <div class="mb-3 d-none">
                  <label>สถานะ</label>
                  <select name="status" class="form-control">
                    <option value="1">ใช้งาน</option>
                  </select>
                </div>

                <div class="d-grid mt-3">
                  <button class="btn btn-success" type="submit">สมัครสมาชิก</button>
                </div>
              </form>
              <div class="text-center mt-3">
                <a href="{{ route('login') }}" class="small">เข้าสู่ระบบ</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Scripts -->
  <script src="/backend/vendors/bootstrap/bootstrap.min.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
</body>

</html>
