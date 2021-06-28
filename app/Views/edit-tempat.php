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
  <link rel="stylesheet" href="<?= base_url("assets/css/app.css") ?>">
  <link rel="shortcut icon" href="<?= base_url("assets/images/favicon.svg") ?>" type="image/x-icon">
</head>

<body>
  <div id="app">
    <?= $this->include("layout/sidebar") ?>
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
          <section class="section">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <form class="form form-horizontal" method="POST" action="/TempatVaksinasi/updateTempat?id=<?= $tempatVaksin["id"]; ?>">
                    <div class="form-body">
                      <div class="row">
                        <div class="col-md-4">
                          <label>Tempat Vaksinasi</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="text" id="tempatVaksinasi" class="form-control" name="tempatVaksinasi" placeholder="Tempat Vaksinasi" value="<?= $tempatVaksin["nama_tempat"]; ?>">
                        </div>
                        <div class="col-md-4">
                          <label>Alamat</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <textarea id="alamat" class="form-control" name="alamat" placeholder="Alamat" rows="4">
                            <?= $tempatVaksin["alamat"]; ?>
                          </textarea>
                        </div>
                        <div class="col-md-4">
                          <label>RT / RW</label>
                        </div>
                        <div class="col-md-3 form-group">
                          <input type="number" id="rt" class="form-control" name="rt" placeholder="RT" value="<?= $tempatVaksin["rt"]; ?>">
                        </div>
                        <div class="col-md-3 form-group">
                          <input type="number" id="rw" class="form-control" name="rw" placeholder="RW" value="<?= $tempatVaksin["rw"]; ?>">
                        </div>
                        <div class="col-md-4">
                          <label>Desa</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="text" id="desa" class="form-control" name="desa" placeholder="Desa" value="<?= $tempatVaksin["desa"]; ?>">
                        </div>
                        <div class="col-md-4">
                          <label>Kecamatan</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="text" id="kecamatan" class="form-control" name="kecamatan" placeholder="Kecamatan" value="<?= $tempatVaksin["kecamatan"]; ?>">
                        </div>
                        <div class="col-md-4">
                          <label>Kabupaten</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="text" id="kabupaten" class="form-control" name="kabupaten" placeholder="Kabupaten" value="<?= $tempatVaksin["kabupaten"]; ?>">
                        </div>
                        <div class="col-md-4">
                          <label>Provinsi</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="text" id="provinsi" class="form-control" name="provinsi" placeholder="Provinsi" value="<?= $tempatVaksin["provinsi"]; ?>">
                        </div>
                        <div class="col-sm-12 d-flex justify-content-end">
                          <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                          <a href="/TempatVaksinasi" class="btn btn-secondary me-1 mb-1">Kembali</a>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </section>
        </div>
        <?= $this->include("layout/footer") ?>
      </div>
    </div>
  </div>
  <script src="<?= base_url("assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js") ?>"></script>
  <script src="<?= base_url("assets/js/bootstrap.bundle.min.js") ?>"></script>

  <script src="<?= base_url("assets/vendors/simple-datatables/simple-datatables.js") ?>"></script>

  <script src="<?= base_url("assets/js/main.js") ?>"></script>
</body>

</html>