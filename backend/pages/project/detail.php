<?php
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// Get project ID from URL
$id = $_GET['id'] ?? 0;

// Fetch project data
$qProject = "SELECT * FROM projects WHERE id = $id";
$result = mysqli_query($connect, $qProject) or die(mysqli_error($connect));
$project = $result->fetch_object();

if (!$project) {
  die("Project not found");
}
?>


<body>
  <div class="container-scroller">
    <?php include '../../partials/navbar.php'; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <?php include '../../partials/sidebar.php'; ?>
      <div class="main-panel">
        <div class="content-wrapper" style="padding-left: 20px; padding-right: 20px;">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header" style="background: linear-gradient(135deg, #023e8a, #0077b6, #90e0ef); border: none;">
                  <h5>Detail Project</h5>
                </div>
                <div class="card-body">
                  <form>
                    <div class="mb-3">
                      <label class="form-label">Judul Project</label>
                      <input type="text" class="form-control" value="<?= htmlspecialchars($project->title) ?>" disabled>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Pekerjaan</label>
                      <input type="text" class="form-control" value="<?= htmlspecialchars($project->job) ?>" disabled>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Kategori</label>
                      <input type="text" class="form-control" value="<?= htmlspecialchars($project->category) ?>" disabled>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Deskripsi</label>
                      <textarea class="form-control" rows="5" disabled><?= htmlspecialchars($project->description) ?></textarea>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Gambar Project</label>
                      <div>
                        <?php
                        $imagePath = __DIR__ . '/../../../storages/projects/' . $project->image;
                        if (!empty($project->image) && file_exists($imagePath)):
                        ?>
                          <img src="../../../storages/projects/<?= htmlspecialchars($project->image) ?>"
                            alt="<?= htmlspecialchars($project->title) ?>"
                            style="width:100px;height:100px;object-fit:cover;border-radius:0;">
                        <?php else: ?>
                          <span class="text-muted">No Image Available</span>
                        <?php endif; ?>
                      </div>
                    </div>

                    <div class="d-flex gap-2">
                      <a href="./index.php" class="btn btn-primary">Kembali</a>

                    </div>
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