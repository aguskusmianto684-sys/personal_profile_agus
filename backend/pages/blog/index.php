<?php
include '../../../config/connection.php';

// Query ambil semua data dari tabel blogs
$query = "SELECT * FROM blogs ORDER BY id DESC";
$result = mysqli_query($connect, $query);
?>


<!DOCTYPE html>
<html lang="en">
<?php
include '../../partials/header.php';
?>
<style>
  /* khusus kolom JUDUL */
  table td:nth-child(3),
  table th:nth-child(3) {
    max-width: 250px;   /* batas lebar kolom */
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
</style>


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
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between" style="background: linear-gradient(135deg, #023e8a, #0077b6, #90e0ef); border: none;">
                  <h5>Daftar Blog</h5>
                  <a href="./create.php" class="btn btn-primary">Tambah</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr class="text-uppercase">
                          <th>No</th>
                          <th>Gambar</th>
                          <th>Judul</th>
                          <th>Tanggal</th>
                          <th>Penulis</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        if ($result && $result->num_rows > 0):
                          while ($item = $result->fetch_object()):
                        ?>
                            <tr>
                              <td class="text-capitalize"><?= $no ?></td>
                              <td class="text-capitalize">
                                <?php if (!empty($item->image) && file_exists(__DIR__ . '/../../../storages/blog/' . $item->image)): ?>
                                  <img src="../../../storages/blog/<?= htmlspecialchars($item->image) ?>" alt="gambar" width="100" height="100">
                                <?php else: ?>
                                  <div class="text-muted">Gambar tidak ada</div>
                                <?php endif; ?>
                              </td>
                              <td class="text-uppercase"><?= htmlspecialchars($item->title) ?></td>
                              <td class="text-uppercase"><?= htmlspecialchars($item->date) ?></td>
                              <td class="text-capitalize"><?= htmlspecialchars($item->author) ?></td>
                              <td class="text-capitalize">
                                <a href="./detail.php?id=<?= $item->id ?>" class="btn btn-success btn-sm ">Detail</a>
                                <a href="./edit.php?id=<?= $item->id ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="../../actions/blog/destroy.php?id=<?= $item->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
                              </td>
                            </tr>
                          <?php
                            $no++;
                          endwhile;
                        else:
                          ?>
                          <tr>
                            <td colspan="7" class="text-center">Data blog belum tersedia.</td>
                          </tr>
                        <?php endif; ?>
                      </tbody>
                    </table>
                  </div>
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