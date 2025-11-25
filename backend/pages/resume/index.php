<?php
include '../../../config/connection.php';
include '../../partials/header.php';
?>
<body >
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
                  <h5>Daftar Resume</h5>
                  <a href="./create.php" class="btn btn-primary">Tambah</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr class="text-uppercase">
                          <th>No</th>
                          <th>Periode</th>
                          <th>Pekerjaan</th>
                          <th>Tempat</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $qResumes = "SELECT * FROM resumes";
                        $result = mysqli_query($connect, $qResumes) or die(mysqli_error($connect));
                        $no = 1;
                        if ($result && $result->num_rows > 0):
                          while ($item = $result->fetch_object()):
                        ?>
                        <tr>
                          <td class="text-uppercase"><?= $no++ ?></td>
                          <td class="text-uppercase"><?= htmlspecialchars($item->date) ?></td>
                          <td class="text-uppercase"><?= htmlspecialchars($item->job) ?></td>
                          <td class="text-uppercase"><?= htmlspecialchars($item->place) ?></td>
                          <td class="text-capitalize">
                            <a href="./detail.php?id=<?= $item->id ?>" class="btn btn-sm btn-success btn-sm">Detail</a>
                            <a href="./edit.php?id=<?= $item->id ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="../../actions/resume/destroy.php?id=<?= $item->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                          </td>
                        </tr>
                        <?php endwhile; else: ?>
                        <tr>
                          <td colspan="6" class="text-center">Data resume belum tersedia.</td>
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
