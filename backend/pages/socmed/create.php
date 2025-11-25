<?php
include '../../partials/header.php';
?>

<div class="container-scroller">
  <?php include '../../partials/navbar.php'; ?>
  <div class="container-fluid page-body-wrapper">

    <?php include '../../partials/sidebar.php'; ?>

    <div class="main-panel">
      <div class="content-wrapper" style="padding-left: 20px; padding-right: 20px;">

        <!-- Konten Tambah Social Media -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header" style="background: linear-gradient(135deg, #023e8a, #0077b6, #90e0ef); border: none;">
                <h5>Tambah Social Media</h5>
              </div>
              <div class="card-body">
                <form action="../../actions/socmed/store.php" method="POST">
                  <div class="mb-3">
                    <label for="iconInput" class="form-label">Icon</label>
                    <input type="text" name="icon" id="iconInput" class="form-control" placeholder="Masukkan icon social media..." required>
                  </div>
                  <div class="mb-3">
                    <label for="linkInput" class="form-label">Link</label>
                    <input type="text" name="link" id="linkInput" class="form-control" placeholder="Masukkan link social media..." required>
                  </div>
                  <button type="submit" class="btn btn-success" name="tombol">Simpan</button>
                  <a href="./index.php" class="btn btn-primary">Kembali</a>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
      <?php include '../../partials/footer.php'; ?>
    </div>
  </div>
</div>

<?php include '../../partials/script.php'; ?>
