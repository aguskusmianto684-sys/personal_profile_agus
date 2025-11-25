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
          <!-- content -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header" style="background: linear-gradient(135deg, #023e8a, #0077b6, #90e0ef); border: none;">
                  <h5>Ubah Data About</h5>
                </div>
                <div class="card-body">
                  <form action="../../actions/about/update.php?id=<?= $about->id ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="nameInput" class="form-label">Nama</label>
                      <input type="text" class="form-control" name="name" id="nameInput" placeholder="Masukan Nama...." required value="<?= $about->name ?>">
                    </div>

                    <div class="mb-3">
                      <label for="bornInput" class="form-label">Tanggal Lahir</label>
                      <input type="date" name="born" class="form-control" id="bornInput" required value="<?= $about->born ?>">
                    </div>

                    <div class="mb-3">
                      <label for="zip_codeInput" class="form-label">Kode Pos</label>
                      <input type="number" name="zip_code" class="form-control" id="zip_codeInput" placeholder="Masukan Kode Pos...." required value="<?= $about->zip_code ?>">
                    </div>

                    <div class="mb-3">
                      <label for="emailInput" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="emailInput" placeholder="Masukan Email...." required value="<?= $about->email ?>">
                    </div>

                    <div class="mb-3">
                      <label for="phoneInput" class="form-label">No.telpon</label>
                      <input type="text" name="phone" class="form-control" id="phoneInput" placeholder="Masukan No.telpon...." required value="<?= $about->phone ?>">
                    </div>

                    <div class="mb-3">
                      <label for="total_projectInput" class="form-label">Total Project</label>
                      <input type="number" name="total_project" class="form-control" id="total_projectInput" placeholder="Masukan Total Project...." required value="<?= $about->total_project ?>">
                    </div>
                    <div class="mb-3">
                      <label for="workInput" class="form-label">Pekerjaan Sekarang</label>
                      <input type="text" name="work" class="form-control" id="workInput" placeholder="Masukan Pekerjaan Sekarang...." required value="<?= $about->work ?>">
                    </div>
                    <div class="mb-3">
                      <label for="addressInput" class="form-label">Alamat</label>
                      <textarea name="address" id="address" class="form-control" placeholder="Masukan alamat" rows="5"><?= $about->address ?></textarea>
                    </div>

                    <div class="mb-3">
                      <label for="descriptionInput" class="form-label">Deskripsi</label>
                      <textarea name="description" id="descriptionInput" class="form-control" rows="4" placeholder="Masukkan deskripsi..." required><?= $about->description ?></textarea>
                    </div>

                    <div class="mb-3">
                      <img style="width:100px;height:100px;object-fit:cover;border-radius:0;" src="../../../storages/about/<?= $about->image ?>" alt="">
                      <input type="file" name="image" class="form-control" id="imageInput">
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
</body>

</html>