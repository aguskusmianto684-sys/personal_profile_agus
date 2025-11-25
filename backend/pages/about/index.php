<?php
include '../../../config/connection.php';

$qProfil = "SELECT * FROM abouts ORDER BY id DESC LIMIT 1";
$resProfil = mysqli_query($connect, $qProfil);
$dataProfil = mysqli_fetch_object($resProfil);

// Query untuk menampilkan semua data about
$qAbout = "SELECT * FROM abouts ORDER BY id DESC";
$result = mysqli_query($connect, $qAbout);
?>

<!DOCTYPE html>
<html lang="en">
<?php include '../../partials/header.php'; ?>

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
                <div class="card-header d-flex align-items-center justify-content-between" style="background: linear-gradient(135deg, #023e8a, #0077b6, #90e0ef); border: none;">
                  <h5>Daftar About</h5>
                  <a href="./create.php" class="btn btn-primary">Tambah</a>
                </div>
                <div class="card-body ">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr class="text-uppercase">
                          <th>No</th>
                          <th>Gambar</th>
                          <th>Nama</th>
                          <th>Tanggal Lahir</th>
                          <th>Email</th>
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
                              <td class="text-uppercase"><?= $no ?></td>
                              <td class="text-uppercase">
                                <?php if (!empty($item->image) && file_exists(__DIR__ . '/../../../storages/about/' . $item->image)): ?>
                                  <img src="../../../storages/about/<?= htmlspecialchars($item->image) ?>" alt="Gambar" class="rounded-circle" width="100" height="100" style="object-fit: cover;">
                                <?php else: ?>
                                  <div class="text-muted">Gambar tidak ada</div>
                                <?php endif; ?>
                              </td>
                              <td class="text-uppercase"><?= htmlspecialchars($item->name) ?></td>
                              <td class="text-uppercase"><?= htmlspecialchars($item->born) ?></td>
                              <td class="text-transform"><?= htmlspecialchars($item->email) ?></td>
                              <td class="text-capitalize">
                                <a href="./detail.php?id=<?= $item->id ?>" class="btn btn-success btn-sm">Detail</a>
                                <a href="./edit.php?id=<?= $item->id ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="../../actions/about/destroy.php?id=<?= $item->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
                              </td>
                            </tr>
                          <?php
                            $no++;
                          endwhile;
                        else:
                          ?>
                          <tr>
                            <td colspan="6" class="text-center">Data about belum tersedia.</td>
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
        <?php include '../../partials/footer.php'; ?>
      </div>
    </div>
  </div>
  <?php include '../../partials/script.php'; ?>
</body>

</html>