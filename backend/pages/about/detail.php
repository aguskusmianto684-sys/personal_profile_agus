<?php
include '../../../config/connection.php';
include '../../actions/about/show.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php
include '../../partials/header.php';
?>

<body>
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
                  <h5>Detail Data About</h5>
                </div>
                <div class="card-body">
                  <form>
                    <div class="mb-3">
                      <label for="nameInput" class="form-label">Nama</label>
                      <input type="text" class="form-control" value="<?= $about->name ?>" disabled>
                    </div>

                    <div class="mb-3">
                      <label for="bornInput" class="form-label">Tanggal Lahir</label>
                      <input type="date" class="form-control" value="<?= $about->born ?>" disabled>
                    </div>

                    <div class="mb-3">
                      <label for="zip_codeInput" class="form-label">Kode Pos</label>
                      <input type="number" class="form-control" value="<?= $about->zip_code ?>" disabled>
                    </div>

                    <div class="mb-3">
                      <label for="emailInput" class="form-label">Email</label>
                      <input type="email" class="form-control" value="<?= $about->email ?>" disabled>
                    </div>

                    <div class="mb-3">
                      <label for="phoneInput" class="form-label">No.telpon</label>
                      <input type="text" class="form-control" value="<?= $about->phone ?>" disabled>
                    </div>

                    <div class="mb-3">
                      <label for="total_projectInput" class="form-label">Total Project</label>
                      <input type="number" class="form-control" value="<?= $about->total_project ?>" disabled>
                    </div>
                    <div class="mb-3">
                      <label for="workInput" class="form-label">Pekerjaan Sekarang</label>
                      <input type="text" class="form-control" value="<?= $about->work ?>" disabled>
                    </div>
                    <div class="mb-3">
                      <label for="addressInput" class="form-label">Alamat</label>
                      <textarea class="form-control" rows="5" disabled><?= $about->address ?></textarea>
                    </div>
                    <div class="mb-3">
                      <h6>Gambar</h6>
                      <img style="width:100px;height:100px;object-fit:cover;border-radius:0;" src="../../../storages/about/<?= $about->image ?>" alt="">
                    </div>

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
</body>

</html>

