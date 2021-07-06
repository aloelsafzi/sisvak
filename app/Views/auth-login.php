<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.css") ?>">
  <link rel="stylesheet" href=" <?= base_url("assets/vendors/bootstrap-icons/bootstrap-icons.css") ?> ">
  <link rel="stylesheet" href="<?= base_url("assets/css/app.css") ?>">
  <link rel="stylesheet" href="<?= base_url("assets/css/pages/auth.css") ?>">
  <link rel="shortcut icon" href="<?= base_url("assets/favicon.svg") ?>" type="image/x-icon">
</head>

<body>
  <div id="auth">
    <div class="row h-100">
      <div class="col-lg-5 col-12">
        <div id="auth-left">
          <div class="auth-logo">
            <h3>Sistem Informasi Vaksinasi</h3>
            <h3>(SISVAK)</h3>
          </div>
          <?php if ($flashData) {
            echo $flashData;
          } ?>
          <h1 class="auth-title"><?= $title ?></h1>
          <form action="/Login/auth" method="POST">
            <div class="form-group position-relative has-icon-left mb-4">
              <input type="text" name="username" class="form-control form-control-xl" placeholder="Username">
              <div class="form-control-icon">
                <i class="bi bi-person"></i>
              </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
              <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
              <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
              </div>
            </div>
            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Log in</button>
          </form>
        </div>
      </div>
      <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">
        </div>
      </div>
    </div>

  </div>
</body>

</html>