<?php
include '../../partials/header.php';
include '../../partials/navbar.php';


$qProjects = "SELECT * FROM projects";
$result = mysqli_query($connect, $qProjects) or die(mysqli_error($connect));
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
                <div class="card-header d-flex align-items-center justify-content-between" style="background: linear-gradient(135deg, #023e8a, #0077b6, #90e0ef); border: none;">
                    <h5 class="mb-0">Daftar Project</h5>
                    <a href="./create.php" class="btn btn-primary btn-sm">Tambah</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-uppercase">
                                    <th width="5%">No</th>
                                    <th width="15%">Gambar</th>
                                    <th width="15%">Judul</th>
                                    <th width="15%">Pekerjaan</th>
                                    <th width="15%">Kategori</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($item = $result->fetch_object()):
                                ?>
                                    <tr class="text-capitalize">
                                        <td ><?= $no ?></td>
                                        <td class="text-center">
                                            <?php
                                            $imagePath = __DIR__ . '/../../../storages/projects/' . $item->image;
                                            if (!empty($item->image) && file_exists($imagePath)):
                                            ?>
                                                <img src="../../../storages/projects/<?= htmlspecialchars($item->image) ?>"
                                                    alt="<?= htmlspecialchars($item->title) ?>"
                                                    style="width: 100px; height: 100px; object-fit: cover;">
                                            <?php else: ?>
                                                <span class="text-muted">No Image</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= htmlspecialchars($item->title ?? '(tidak ada)') ?></td>
                                        <td><?= htmlspecialchars($item->job ?? '(tidak ada)') ?></td>
                                        <td><?= htmlspecialchars($item->category ?? '(tidak ada)') ?></td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="./detail.php?id=<?= $item->id ?>" class="btn btn-sm btn-success">Detail</a>
                                                <a href="./edit.php?id=<?= $item->id ?>" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="../../actions/project/destroy.php?id=<?= $item->id ?>" 
                                                   class="btn btn-sm btn-danger" 
                                                   onclick="return confirm('Apakah anda yakin?')">Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                endwhile;
                                ?>
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




