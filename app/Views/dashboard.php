<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.css") ?>">

  <link rel="stylesheet" href="<?= base_url("assets/vendors/iconly/bold.css") ?>">
  <link rel="stylesheet" href="<?= base_url("assets/vendors/simple-datatables/style.css") ?>">

  <link rel="stylesheet" href="<?= base_url("assets/vendors/perfect-scrollbar/perfect-scrollbar.css") ?>">
  <link rel="stylesheet" href="<?= base_url("assets/vendors/bootstrap-icons/bootstrap-icons.css") ?>">
  <link rel="stylesheet" href="<?= base_url("assets/vendors/fontawesome/all.min.css") ?>">
  <link rel="stylesheet" href="<?= base_url("assets/css/app.css") ?>">
  <link rel="shortcut icon" href="<?= base_url("assets/images/favicon.svg") ?>" type="image/x-icon">
</head>

<body>
  <div id="app">
    <?= $this->include('layout/sidebar') ?>
    <div id="main" class='layout-navbar'>
      <?= $this->include('layout/navbar') ?>
      <div id="main-content">
        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $title ?></h3>
              </div>
            </div>
          </div>
        </div>
        <div class="page-content">
          <section class="row">
            <div class="col-12 col-lg-9">
              <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                  <div class="card">
                    <div class="card-body px-3 py-4-5">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="stats-icon purple">
                            <i class="fas fa-user text-white h3"></i>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <h6 class="text-muted font-semibold">Warga / Penduduk</h6>
                          <h6 class="font-extrabold mb-0"><?= $countWarga ?></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                  <div class="card">
                    <div class="card-body px-3 py-4-5">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="stats-icon blue">
                            <i class="fas fa-hospital text-white h3"></i>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <h6 class="text-muted font-semibold">Tempat Vaksinasi</h6>
                          <h6 class="font-extrabold mb-0"><?= $countTempat ?></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                  <div class="card">
                    <div class="card-body px-3 py-4-5">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="stats-icon green">
                            <i class="fas fa-syringe text-white h3"></i>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <h6 class="text-muted font-semibold">Sudah divaksin</h6>
                          <h6 class="font-extrabold mb-0"><?= $countSudahVaksin ?></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                  <div class="card">
                    <div class="card-body px-3 py-4-5">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="stats-icon red">
                            <i class="fas fa-viruses text-white h3"></i>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <h6 class="text-muted font-semibold">Belum divaksin</h6>
                          <h6 class="font-extrabold mb-0"><?= $countBelumVaksin ?></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <?= $this->include('layout/footer') ?>
      </div>
    </div>
  </div>
  <script src="<?= base_url("assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js") ?>"></script>
  <script src="<?= base_url("assets/vendors/fontawesome/all.min.js") ?>"></script>
  <script src="<?= base_url("assets/js/bootstrap.bundle.min.js") ?>"></script>

  <script src="<?= base_url("assets/js/main.js") ?>"></script>

</body>

</html>