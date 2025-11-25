<?php
include '../../../config/connection.php';
session_start();

// Check admin session
if (!isset($_SESSION['admin_logged_in'])) {
  $_SESSION['error'] = 'Anda harus login terlebih dahulu';
  header('Location: ../../user/login.php');
  exit();
}

// Get all contacts
$qContact = "SELECT * FROM contacts ORDER BY id DESC";
$result = mysqli_query($connect, $qContact);

// Display success/error messages
$success = $_SESSION['success'] ?? null;
$error = $_SESSION['error'] ?? null;
unset($_SESSION['success'], $_SESSION['error']);
?>

<!DOCTYPE html>
<html lang="en">
<?php include '../../partials/header.php'; ?>

<head>
  <style>
    .action-buttons {
      white-space: nowrap;
    }

    .action-buttons .btn {
      margin-right: 5px;
    }

    .action-buttons .btn:last-child {
      margin-right: 0;
    }

    .table-message {
      max-width: 300px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <?php include '../../partials/navbar.php'; ?>
    <div class="container-fluid page-body-wrapper">
      <?php include '../../partials/sidebar.php'; ?>
      <div class="main-panel">
        <div class="content-wrapper" style="padding-left: 20px; padding-right: 20px;">
          <!-- Flash Messages -->
          <?php if ($success): ?>
            <div class="alert alert-success alert-dismissible fade show">
              <?= $success ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>

          <?php if ($error): ?>
            <div class="alert alert-danger alert-dismissible fade show">
              <?= $error ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between" style="background: linear-gradient(135deg, #023e8a, #0077b6, #90e0ef); border: none;">
                  <h5>Daftar Kontak</h5>
                  <!-- <a href="./create.php" class="btn btn-primary">
                    <i class=""></i> Tambah
                  </a> -->
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr class="text-uppercase">
                          <th width="5%">No</th>
                          <th width="15%">Nama</th>
                          <th width="20%">Email</th>
                          <th width="15%">Subjek</th>
                          <th width="15%">Nomer telepon</th>
                          <th width="35%">Pesan</th>
                          <th width="10%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if ($result && $result->num_rows > 0): ?>
                          <?php $no = 1;
                          while ($item = $result->fetch_object()): ?>
                            <tr>
                              <td><?= $no ?></td>
                              <td class="text-uppercase"><?= htmlspecialchars($item->name) ?></td>
                              <td><?= htmlspecialchars($item->email) ?></td>
                              <td class="text-capitalize"><?= htmlspecialchars($item->subject) ?></td>
                              <td><?= htmlspecialchars($item->phone) ?></td>
                              <td class="table-message text-capitalize" title="<?= htmlspecialchars($item->massage) ?>">
                                <?= htmlspecialchars($item->massage) ?>
                              </td>
                              <td class="action-buttons">
                                <form method="POST" action="../../actions/contact/destroy.php" style="display:inline;">
                                  <input type="hidden" name="id" value="<?= $item->id ?>">
                                  <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus kontak ini?')">
                                    <i class="mdi mdi-delete"></i> Hapus
                                  </button>
                                </form>
                              </td>
                            </tr>
                          <?php $no++;
                          endwhile; ?>
                        <?php else: ?>
                          <tr>
                            <td colspan="6" class="text-center py-4">Tidak ada data kontak</td>
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