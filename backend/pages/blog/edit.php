<?php
include '../../../config/connection.php';
include '../../actions/blog/show.php';
?>

<!DOCTYPE html>
<html lang="en">
  <?php
  include '../../partials/header.php';
  ?>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <?php include '../../partials/navbar.php'; ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include '../../partials/sidebar.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper" style="padding-left: 20px; padding-right: 20px;">
            <!-- content -->
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header" style="background: linear-gradient(135deg, #023e8a, #0077b6, #90e0ef); border: none;">
                    <h5>Edit Blog</h5>
                  </div>
                  <div class="card-body">
                    <form action="../../actions/blog/update.php?id=<?= $blog->id ?>" method="POST" enctype="multipart/form-data">
                      <div class="mb-3">
                        <label for="titleInput" class="form-label">Judul</label>
                        <input type="text" class="form-control" name="title" id="titleInput" placeholder="Masukkan Judul..." required value="<?= $blog->title ?>">
                      </div>
                      <div class="mb-3">
                        <label for="dateInput" class="form-label">Tanggal</label>
                        <input type="date" name="date" class="form-control" id="dateInput" required value="<?= $blog->date ?>">
                      </div>
                      <div class="mb-3">
                        <label for="authorInput" class="form-label">Penulis</label>
                        <input type="text" name="author" class="form-control" id="authorInput" placeholder="Masukkan Nama Penulis..." required value="<?= $blog->author ?>">
                      </div>
                      <div class="mb-3">
                        <label for="descriptionInput" class="form-label">Deskripsi</label>
                        <textarea name="description" id="descriptionInput" class="form-control" rows="4" placeholder="Masukkan deskripsi..." required><?= $blog->description ?></textarea>
                      </div>
                    <div class="mb-3">
                      <?php if (!empty($blog->image) && file_exists(__DIR__ . '/../../../storages/blog/' . $blog->image)): ?>
                        <img style="width:100px;height:100px;object-fit:cover;" class="mb-2" src="../../../storages/blog/<?= htmlspecialchars($blog->image) ?>" alt="Gambar Blog">
                      <?php else: ?>
                        <div class="text-muted mb-2">Gambar tidak tersedia</div>
                      <?php endif; ?>
                      <input type="file" name="image" class="form-control" id="imageInput">
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
          <!-- partial:partials/_footer.html -->
          <?php include '../../partials/footer.php'; ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php include '../../partials/script.php'; ?>
  </body>
</html>
