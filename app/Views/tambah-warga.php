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
                  <form class="form form-horizontal" method="POST" action="/Warga/saveWarga" enctype="multipart/form-data">
                    <div class="form-body">
                      <div class="row">
                        <div class="col-md-4">
                          <label>NIK</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="text" id="nik" class="form-control" name="nik" placeholder="NIK">
                        </div>
                        <div class="col-md-4">
                          <label>Nama Lengkap</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Lengkap">
                        </div>
                        <div class="col-md-4">
                          <label>Usia</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="number" id="usia" class="form-control" name="usia" placeholder="Usia">
                        </div>
                        <div class="col-md-4">
                          <label>Jenis Kelamin</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <select class="form-select" id="jenisKelamin" name="jenis_kelamin">
                            <option value="" selected>-- Pilih Jenis kelamin --</option>
                            <option value="l">Laki-Laki</option>
                            <option value="p">Perempuan</option>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <label>Alamat</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <textarea id="alamat" class="form-control" name="alamat" placeholder="Alamat" rows="4"></textarea>
                        </div>
                        <div class="col-md-4">
                          <label>RT / RW</label>
                        </div>
                        <div class="col-md-3 form-group">
                          <input type="number" id="rt" class="form-control" name="rt" placeholder="RT">
                        </div>
                        <div class="col-md-3 form-group">
                          <input type="number" id="rw" class="form-control" name="rw" placeholder="RW">
                        </div>
                        <div class="col-md-4">
                          <label>Desa</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="text" id="desa" class="form-control" name="desa" placeholder="Desa">
                        </div>
                        <div class="col-md-4">
                          <label>Kecamatan</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="text" id="kecamatan" class="form-control" name="kecamatan" placeholder="Kecamatan">
                        </div>
                        <div class="col-md-4">
                          <label>Kabupaten</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="text" id="kabupaten" class="form-control" name="kabupaten" placeholder="Kabupaten">
                        </div>
                        <div class="col-md-4">
                          <label>Provinsi</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="text" id="provinsi" class="form-control" name="provinsi" placeholder="Provinsi">
                        </div>
                        <div class="col-md-4">
                          <label>Status Vaksinasi</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="radio" id="sudahVaksin" name="status" value="1">
                            <label class="form-check-label" for="sudahVaksin">Sudah divkasin</label>
                          </div>
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="radio" id="belumVaksin" name="status" value="0">
                            <label class="form-check-label" for="belumVaksin">Belum divkasin</label>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label>Tempat Vaksinasi</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <select class="form-select" id="tempatVaksin" name="id_tempat_vaksin">
                            <option value="" selected>-- Pilih Tempat Vaksinasi --</option>
                            <?php foreach ($tempatVaksin as $tv) : ?>
                              <option value="<?= $tv["id"] ?>"><?= $tv["nama_tempat"] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <label>Ambil Foto</label>
                        </div>
                        <div class="col-md-4 form-group">
                          <div id="imageCanvas" class="d-flex align-items-center justify-content-center d-none"></div>
                          <div id="initCamera" class="d-flex align-items-center justify-content-center" style="border-radius: 10px; height: 200px; border: solid black 1px;">
                            <button class="btn btn-sm btn-success">Open Camera</button>
                          </div>
                          <video id="captureGambar" class="d-flex align-items-center justify-content-center d-none" style="border-radius: 10px; border: solid black 1px;" muted>
                          </video>
                        </div>
                        <div class="col-md-4">
                          <button id="capture" class="btn btn-sm btn-secondary">Capture</button>
                          <div class="row mt-2">
                            <div class="col">
                              <input type="text" id="label_photo" class="form-control" placeholder="Foto Belum Ada" readonly>
                              <input type="file" id="photo_warga" class="form-control" name="photo_warga" hidden>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-end">
                          <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                          <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                          <a href="/Warga" class="btn btn-secondary me-1 mb-1">Kembali</a>
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

  <script>
    let isReset = false;

    const camera = document.getElementById('captureGambar');
    const initCamera = document.getElementById('initCamera');
    const capture = document.getElementById('capture');
    const inputPhoto = document.getElementById('photo_warga');
    const labelPhoto = document.getElementById('label_photo');

    const imageCanvas = document.getElementById('imageCanvas');
    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext("2d");
    let settings = {
      width: 300,
      height: 0
    };

    // init canvas 
    canvas.style = "border-radius: 10px; border: solid black 1px;"

    if (window.stream) {
      window.stream.getTracks().forEach(t => t.stop());
    }

    function handleSuccess(stream) {
      window.stream = stream;
      camera.srcObject = stream;
      camera.play();
    };

    function handleError(err) {
      alert(err);
    }

    function startCamera() {
      navigator.mediaDevices.getUserMedia({
        video: true
      }).then(handleSuccess).catch(handleError);
    }

    function openCamera(e) {
      e.preventDefault();
      toogleCamera();
      startCamera();
    }

    function captureImage(e) {
      e.preventDefault();
      canvas.width = settings.width;
      canvas.height = settings.height;
      ctx.drawImage(camera, 0, 0, settings.width, settings.height);
      imageCanvas.classList.toggle('d-none');
      camera.classList.toggle('d-none')
      imageCanvas.appendChild(canvas);
      isReset = true;
      capture.innerText = "reset";
      canvas.toBlob(setFilePhotoCanvas, "image/jpg", 0.5);
      stopedCamera();
    }

    function resetCapture(e) {
      e.preventDefault();
      capture.innerText = "Capture";
      camera.classList.toggle("d-none");
      imageCanvas.classList.toggle('d-none');
      ctx.clearRect(0, 0, 0, 0);
      startCamera();
      isReset = false;
    }

    function toogleCamera() {
      camera.classList.toggle("d-none");
      initCamera.classList.toggle("d-none");
    }

    function stopedCamera() {
      if (window.stream) {
        window.stream.getTracks().forEach(t => t.stop());
      }
      window.stream = null;
      camera.srcObject = null;
    }

    function setFilePhotoCanvas(blob) {
      let list = new DataTransfer();
      const filename = "photo_warga_" + generateRandomString() + ".jpg";
      const file = new File([blob], filename, {
        lastModified: Date.now(),
        type: 'image/jpg'
      });
      list.items.add(file);
      labelPhoto.placeholder = file.name;
      inputPhoto.files = list.files;
      console.log(inputPhoto.files[0]);
      list.items.clear();
    }

    function generateRandomString() {
      return Math.random().toString(36).substring(2);
    }

    initCamera.addEventListener('click', openCamera);
    capture.addEventListener('click', function(e) {
      if (isReset) resetCapture(e);
      else captureImage(e);
    });

    camera.addEventListener('canplay', function(ev) {
      settings.height = camera.videoHeight / (camera.videoWidth / settings.width);

      camera.setAttribute('width', settings.width);
      camera.setAttribute('height', settings.height);

      canvas.setAttribute('width', settings.width);
      canvas.setAttribute('height', settings.height);
    }, false);
  </script>
</body>

</html>