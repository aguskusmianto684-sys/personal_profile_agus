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
                <h5>Edit Service</h5>
              </div>
              <div class="card-body">
                <?php
                include '../../actions/service/show.php';
                if (!isset($service) || !$service) {
                  echo "<script>alert('Data tidak ditemukan');window.location.href='index.php';</script>";
                  exit;
                }
                ?>
                <form action="../../actions/service/update.php?id=<?= $service->id ?>" method="POST">
                  <div class="mb-3">
                    <label for="iconInput" class="form-label">Icon</label>
                    <input type="text" name="icon" id="iconInput" class="form-control" placeholder="Masukkan icon service..." required value="<?= htmlspecialchars($service->icon) ?>">
                  </div>
                  <div class="mb-3">
                    <label for="jobInput" class="form-label">Job</label>
                    <input type="text" name="job" id="jobInput" class="form-control" placeholder="Masukkan nama service..." required value="<?= htmlspecialchars($service->job) ?>">
                  </div>
                  <button type="submit" class="btn btn-success" name="tombol">Edit</button>
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
