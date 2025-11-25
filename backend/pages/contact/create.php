<?php include '../../partials/header.php'; ?>

<body>
  <div class="container-scroller">

    <!-- Navbar -->
    <?php include '../../partials/navbar.php'; ?>

    <div class="container-fluid page-body-wrapper">

      <!-- Sidebar -->
      <?php include '../../partials/sidebar.php'; ?>

      <div class="main-panel">
        <div class="content-wrapper" style="padding-left: 20px; padding-right: 20px;">

          <!-- FORM TAMBAH CONTACT -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header" style="background: linear-gradient(135deg, #023e8a, #0077b6, #90e0ef); border: none;">
                  <h5>Tambah Data Contact</h5>
                </div>
                <div class="card-body">
                  <form action="../../actions/contact/store.php" method="POST">
                    <div class="mb-3">
                      <label for="nameInput" class="form-label">Nama</label>
                      <input type="text" class="form-control" name="name" id="nameInput" placeholder="Masukkan nama..." required>
                    </div>
                    <div class="mb-3">
                      <label for="emailInput" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="emailInput" placeholder="Masukkan email..." required>
                    </div>
                    <div class="mb-3">
                      <label for="phoneInput" class="form-label">Subjek</label>
                      <input type="text" name="subject" class="form-control" id="subjectInput" placeholder="Masukkan subjek..." required>
                    </div>
                    <div class="mb-3">
                      <label for="phoneInput" class="form-label">Nomor Telepon</label>
                      <input type="text" name="phone" class="form-control" id="phoneInput" placeholder="Masukkan nomer telepon..." required>
                    </div>
                    <div class="mb-3">
                      <label for="massageInput" class="form-label">Pesan</label>
                      <textarea name="massage" id="massageInput" class="form-control" placeholder="Masukkan pesan..." rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary me-3" name="tombol">Tambah</button>
                    <a href="./index.php" class="btn btn-success">Kembali</a>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- Footer -->
        <?php include '../../partials/footer.php'; ?>
      </div>

    </div>
  </div>

  <?php include '../../partials/script.php'; ?>
</body>
</html>
