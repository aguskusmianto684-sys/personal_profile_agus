<?php
include '../../../config/connection.php';
session_start();

// Cek session admin
if (!isset($_SESSION['admin_logged_in'])) {
  echo "<script>
            alert('Anda harus login terlebih dahulu');
            window.location.href='../user/login.php';
        </script>";
  exit();
}

// Ambil data profil terakhir
$qProfil = "SELECT * FROM abouts ORDER BY id DESC LIMIT 1";
$resProfil = mysqli_query($connect, $qProfil);
$dataProfil = ($resProfil && $resProfil->num_rows > 0) ? mysqli_fetch_object($resProfil) : null;

// Data default
$nama = is_object($dataProfil) ? $dataProfil->name : 'Admin';
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
        <div class="content-wrapper p-0" style="padding-left: 20px; padding-right: 20px;">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <!-- Card Welcome -->
                    <div class="col-md-12 mb-4">
                      <div class="card text-white" style="background: linear-gradient(135deg, #011936, #023e8a); border: none;">
                        <div class="card-body text-center py-5">
                          <h1 class="fw-bold">SELAMAT DATANG</h1>
                          <p class="mb-0 text-uppercase">Master <?= htmlspecialchars($nama) ?></p>
                        </div>
                      </div>
                    </div>

                    <!-- Statistik Cepat -->
                    <div class="col-md-4 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex align-items-center justify-content-between">

                            <!-- Icon -->
                            <div class="mx-3">
                              <div class="bg-primary bg-opacity-10 p-3 rounded text-white">
                                <i class="mdi mdi-chart-bar" style="font-size: 3rem;"></i>
                              </div>
                            </div>

                            <!-- Label dan link -->
                            <div class="flex-grow-1 text-start">
                              <h2 class="text-muted mb-1">Total Skill</h2>
                              <a href="../skill/index.php" class="text-decoration-none link-primary">Lihat Detail</a>
                            </div>

                            <!-- Angka -->
                            <div class="ms-3 text-end">
                              <?php
                              $qCountSkill = "SELECT COUNT(*) as total FROM skills";
                              $resCountSkill = mysqli_query($connect, $qCountSkill);
                              $totalSkill = mysqli_fetch_object($resCountSkill)->total;
                              ?>
                              <h1 class="fw-bold text-dark mb-0"><?= $totalSkill ?></h1>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="col-md-4 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex align-items-center justify-content-between">

                            <!-- Icon -->
                            <div class="mx-3">
                              <div class="bg-success bg-opacity-10 p-3 rounded text-white">
                                <i class="mdi mdi-book-open" style="font-size: 3rem;"></i>
                              </div>
                            </div>

                            <!-- Label dan link -->
                            <div class="flex-grow-1 text-start">
                              <h2 class="text-muted mb-1">Total Blog</h2>
                              <a href="../blog/index.php" class="text-decoration-none link-primary">Lihat Detail</a>
                            </div>

                            <!-- Angka -->
                            <div class="ms-3 text-end">
                              <?php
                              $qCountBlog = "SELECT COUNT(*) as total FROM blogs";
                              $resCountBlog = mysqli_query($connect, $qCountBlog);
                              $totalBlog = mysqli_fetch_object($resCountBlog)->total;
                              ?>
                              <h1 class="fw-bold text-dark mb-0"><?= $totalBlog ?></h1>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="col-md-4 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex align-items-center justify-content-between">

                            <!-- Icon -->
                            <div class="mx-3">
                              <div class="bg-warning bg-opacity-10 p-3 rounded text-white">
                                <i class="mdi mdi-briefcase" style="font-size: 3rem;"></i>
                              </div>
                            </div>

                            <!-- Label dan link -->
                            <div class="flex-grow-1 text-start">
                              <h2 class="text-muted mb-1">Total Project</h2>
                              <a href="../project/index.php" class="text-decoration-none link-primary">Lihat Detail</a>
                            </div>

                            <!-- Angka -->
                            <div class="ms-3 text-end">
                              <?php
                              $qCountProject = "SELECT COUNT(*) as total FROM projects";
                              $resCountProject = mysqli_query($connect, $qCountProject);
                              $totalProject = mysqli_fetch_object($resCountProject)->total;
                              ?>
                              <h1 class="fw-bold text-dark mb-0"><?= $totalProject ?></h1>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>


                    <!-- Recent Activities -->
                    <div class="col-md-12 mb-4">
                      <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center text-white"
                          style="background: linear-gradient(135deg, #023e8a, #0077b6, #90e0ef); border: none;">
                          <h5 class="mb-0">Kontak Terbaru</h5>
                          <a href="../contact/index.php" class="btn btn-sm btn-primary" style="padding: 0.25rem 0.5rem;">Lihat Semua</a>
                        </div>

                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-striped">
                              <thead>
                                <tr class="text-capitalize">
                                  <th>No</th>
                                  <th>Nama</th>
                                  <th>Email</th>
                                  <th>Subjek</th>
                                  <th>Pesan</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $qContacts = "SELECT * FROM contacts ORDER BY id DESC LIMIT 5";
                                $resContacts = mysqli_query($connect, $qContacts);

                                if ($resContacts && $resContacts->num_rows > 0) {
                                  $no = 1;
                                  while ($contact = $resContacts->fetch_object()) {
                                    // Pastikan properti yang diakses ada
                                    $name = isset($contact->name) ? htmlspecialchars($contact->name) : '-';
                                    $email = isset($contact->email) ? htmlspecialchars($contact->email) : '-';
                                    $subject = isset($contact->subject) ? htmlspecialchars($contact->subject) : '-';

                                    // Handle kolom pesan (disebut 'massage' di tabel)
                                    $message = isset($contact->massage) ? htmlspecialchars($contact->massage) : '-';
                                    $shortMessage = strlen($message) > 50
                                      ? substr($message, 0, 50) . '...'
                                      : $message;

                                    echo "<tr>
                                    <td>$no</td>
                                    <td class='text-capitalize'>$name</td>
                                    <td>$email</td>
                                    <td class='text-capitalize'>$subject</td>
                                    <td class='text-capitalize'>$shortMessage</td>
                                </tr>";
                                    $no++;
                                  }
                                } else {
                                  echo "<tr><td colspan='6' class='text-center'>Tidak ada data kontak</td></tr>";
                                }
                                ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
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