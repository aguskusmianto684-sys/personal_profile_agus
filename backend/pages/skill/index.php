<?php
include '../../../config/connection.php';
include '../../partials/header.php';
?>
<body>
  <div class="container-scroller">
    <?php include '../../partials/navbar.php'; ?>

    <div class="container-fluid page-body-wrapper">
      <?php include '../../partials/sidebar.php'; ?>

      <div class="main-panel">
        <div class="content-wrapper" style="padding-left: 20px; padding-right: 20px;">
          <?php
          $qSkills = "SELECT * FROM skills";
          $result = mysqli_query($connect, $qSkills) or die(mysqli_error($connect));
          ?>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between" style="background: linear-gradient(135deg, #023e8a, #0077b6, #90e0ef); border: none;">
                  <h5>Daftar Skill</h5>
                  <a href="./create.php" class="btn btn-primary">Tambah</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr class="text-uppercase">
                          <th>No</th>
                          <th>Skill</th>
                          <th>Persen</th>
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
                            <td class="text-uppercase"><?= $no++ ?></td>
                            <td class="text-uppercase"><?= htmlspecialchars($item->skill) ?></td>
                            <td class="text-uppercase"><?= htmlspecialchars($item->percent) ?>%</td>
                            <td class="text-capitalize">
                              <a href="./edit.php?id=<?= $item->id ?>" class="btn btn-warning btn-sm">Edit</a>
                              <a href="../../actions/skill/destroy.php?id=<?= $item->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</a>
                            </td>
                          </tr>
                        <?php endwhile; else: ?>
                          <tr>
                            <td colspan="4" class="text-center">Data skill belum tersedia.</td>
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
</body>
<?php include '../../partials/script.php'; ?>
