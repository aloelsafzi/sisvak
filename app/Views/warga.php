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
  <link rel="shortcut icon" href="<?= base_url("assets/favicon.svg") ?>" type="image/x-icon">
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
          <a href="/Warga/tambahWarga" class="btn btn-primary mb-3">Tambah Warga</a>
          <section class="section">
            <div class="card">
              <div class="card-body">
                <table class="table table-hover" id="table1">
                  <thead>
                    <tr>
                      <th>Foto</th>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Usia</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($warga as $w) : ?>
                      <tr>
                        <td>
                          <img style="border-radius:10%; height: 50px;" src="
                          <?php
                          $imgSrc = "image_warga/" . $w['photo_url'];
                          echo base_url($imgSrc);
                          ?>
                          " alt="Foto warga">
                        </td>
                        <td><?= $w["nik"]; ?></td>
                        <td><?= $w["nama"]; ?></td>
                        <td><?= $w["usia"]; ?></td>
                        <td><?php if ($w["jenis_kelamin"] == 'l') {
                              echo "Laki - Laki";
                            } else {
                              echo "Perempuan";
                            } ?></td>
                        <td><?= $w["alamat"]; ?></td>
                        <td>
                          <a href="/Warga/editWarga?id=<?= $w["id"]; ?>" class="btn btn-sm btn-primary">Edit</a>
                          <a href="/Warga/deleteWarga?id=<?= $w["id"]; ?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>

          </section>
        </div>
        <?= $this->include('layout/footer') ?>
      </div>
    </div>
  </div>
  <script src="<?= base_url("assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js") ?>"></script>
  <script src="<?= base_url("assets/js/bootstrap.bundle.min.js") ?>"></script>

  <script src="<?= base_url("assets/vendors/simple-datatables/simple-datatables.js") ?>"></script>

  <script src="<?= base_url("assets/js/main.js") ?>"></script>

  <script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
  </script>
</body>

</html>