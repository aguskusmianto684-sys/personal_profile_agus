<?php
include '../../../config/connection.php';
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
                <h5>Ubah Data Resume</h5>
              </div>
              <div class="card-body">
                <?php
                // Ambil data berdasarkan ID
                $id = $_GET['id'] ?? null;
                if (!$id) {
                  echo "<script>alert('ID tidak ditemukan');window.location.href='index.php';</script>";
                  exit;
                }

                $q = "SELECT * FROM resumes WHERE id = $id LIMIT 1";
                $res = mysqli_query($connect, $q);
                $resume = mysqli_fetch_object($res);

                if (!$resume) {
                  echo "<script>alert('Data tidak ditemukan');window.location.href='index.php';</script>";
                  exit;
                }
                ?>
                <form action="../../actions/resume/update.php?id=<?= $resume->id ?>" method="POST">
                  <div class="mb-3">
                    <label for="dateInput" class="form-label">Periode</label>
                    <input type="text" name="date" id="dateInput" class="form-control" placeholder="Masukkan tanggal..." required value="<?= $resume->date ?>">
                  </div>
                  <div class="mb-3">
                    <label for="jobInput" class="form-label">Pekerjaan</label>
                    <input type="text" name="job" id="jobInput" class="form-control" placeholder="Masukkan nama pekerjaan..." required value="<?= $resume->job ?>">
                  </div>
                  <div class="mb-3">
                    <label for="placeInput" class="form-label">Tempat</label>
                    <input type="text" name="place" id="placeInput" class="form-control" placeholder="Masukkan tempat..." required value="<?= $resume->place ?>">
                  </div>
                  <div class="mb-3">
                    <label for="sumaryInput" class="form-label">Ringkasan</label>
                    <input type="text" name="sumary" id="sumaryInput" class="form-control" rows="4" placeholder="Masukkan ringkasan..." required value="<?= $resume->sumary ?>">
                  </div>
                  <div class="mb-3">
                    <label for="descriptionInput" class="form-label">Deskripsi</label>
                    <textarea name="description" id="descriptionInput" class="form-control" rows="4" placeholder="Masukkan deskripsi..." required><?= $resume->description ?></textarea>
                  </div>
                  <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success" name="tombol">Edit</button>
                    <a href="./index.php" class="btn btn-primary">Kembali</a>
                  </div>
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
