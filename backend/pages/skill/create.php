<?php
include '../../partials/header.php';
?>

<div class="container-scroller">
  <?php include '../../partials/navbar.php'; ?>

  <div class="container-fluid page-body-wrapper">
    <?php include '../../partials/sidebar.php'; ?>

    <div class="main-panel">
      <div class="content-wrapper" style="padding-left: 20px; padding-right: 20px;">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header" style="background: linear-gradient(135deg, #023e8a, #0077b6, #90e0ef); border: none;">
                <h5>Tambah Skill</h5>
              </div>
              <div class="card-body">
                <form action="../../actions/skill/store.php" method="POST">
                  <div class="mb-3">
                    <label for="skillInput" class="form-label">Skill</label>
                    <input type="text" name="skill" id="skillInput" class="form-control" placeholder="Masukkan skill..." required>
                  </div>
                  <div class="mb-3">
                      <label for="descriptionInput" class="form-label">Deskripsi</label>
                      <textarea name="description" id="descriptionInput" class="form-control" rows="4" placeholder="Masukkan deskripsi..." required></textarea>
                    </div>
                  <div class="mb-3">
                    <label for="percentInput" class="form-label">Percent</label>
                    <input type="number" name="percent" id="percentInput" class="form-control" placeholder="Masukkan persentase..." min="0" max="100" required>
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
