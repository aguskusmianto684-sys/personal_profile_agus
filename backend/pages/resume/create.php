<?php include '../../partials/header.php'; ?>

<div class="container-scroller">
  <?php include '../../partials/navbar.php'; ?>

  <div class="container-fluid page-body-wrapper">
    <?php include '../../partials/sidebar.php'; ?>

    <div class="main-panel">
      <div class="content-wrapper" style="padding-left: 20px; padding-right: 20px;">
        <!-- Mulai konten -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="card-header" style="background: linear-gradient(135deg, #023e8a, #0077b6, #90e0ef); border: none;">
                  <h5>Ubah Data Resume</h5>
                </div>
                <form action="../../actions/resume/store.php" method="POST">
                  <div class="mb-3">
                    <label for="dateInput" class="form-label">Periode</label>
                    <input type="text" name="date" id="dateInput" class="form-control" placeholder="Masukkan tanggal..." required>
                  </div>
                  <div class="mb-3">
                    <label for="jobInput" class="form-label">Pekerjaan</label>
                    <input type="text" name="job" id="jobInput" class="form-control" placeholder="Masukkan pekerjaan..." required>
                  </div>
                  <div class="mb-3">
                    <label for="placeInput" class="form-label">Tempat</label>
                    <input type="text" name="place" id="placeInput" class="form-control" placeholder="Masukkan tempat..." required>
                  </div>
                  <div class="mb-3">
                    <label for="sumaryInput" class="form-label">Ringkasan</label>
                    <textarea type="text" name="sumary" id="sumaryInput" class="form-control" rows="4" placeholder="Masukkan sumary..." required></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="descriptionInput" class="form-label">Deskripsi</label>
                    <textarea name="description" id="descriptionInput" class="form-control" rows="4" placeholder="Masukkan deskripsi..." required></textarea>
                  </div>
                  <button type="submit" name="tombol" class="btn btn-success">Simpan</button>
                  <a href="./index.php" class="btn btn-primary">Kembali</a>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Selesai konten -->
      </div>
      <?php include '../../partials/footer.php'; ?>
    </div>
  </div>
</div>

<?php include '../../partials/script.php'; ?>