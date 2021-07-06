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
          <section class="section">
            <div class="card">
              <div class="card-body">
                <table class="table table-hover" id="table1">
                  <thead>
                    <tr>
                      <th>Foto</th>
                      <th>Nama</th>
                      <th>NIK</th>
                      <th>Usia</th>
                      <th>Alamat Vaksinasi</th>
                      <th>Tempat Vaksinasi</th>
                      <th>Status Vaksinasi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($dataKetVaksin as $d) :  ?>
                      <tr>
                        <td>
                          <img style="border-radius:10%; height: 50px;" src="
                          <?php
                          $imgSrc = "image_warga/" . $d['photo_url'];
                          echo base_url($imgSrc);
                          ?>
                          " alt="Foto warga">
                        </td>
                        <td><?= $d['nama'] ?></td>
                        <td><?= $d['nik'] ?></td>
                        <td><?= $d['usia'] ?></td>
                        <td><?= $d['alamat'] ?></td>
                        <td><?= $d['nama_tempat'] ?></td>
                        <td>
                          <form action="/KeteranganVaksinasi/updateStatus?id=<?= $d['id_ket_vaksinasi'] ?>" method="post" id="<?= $d['id_ket_vaksinasi'] ?>">
                            <div class="form-check form-switch">
                              <input onchange="updateStatus(<?= $d['id_ket_vaksinasi'] ?>)" class="form-check-input" type="checkbox" id="sudahVaksin_<?= $d['id_ket_vaksinasi'] ?>" name="status" value="" <?php if ($d['status_vaksinasi'] == '1') : ?> checked <?php endif; ?>>
                              <label class="form-check-label" for="sudahVaksin_<?= $d['id_ket_vaksinasi'] ?>">sudah divkasin</label>
                            </div>
                          </form>
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
    let dataTable = new simpleDatatables.DataTable(table1, {
      "ordering": false
    });

    function updateStatus(id) {
      const form = document.getElementById(id);
      const chckBox = document.getElementById('sudahVaksin_' + id);
      if (chckBox.checked) {
        chckBox.value = '1'
      } else {
        chckBox.value = '0'
      }
      form.submit();
    }
  </script>

</body>

</html>