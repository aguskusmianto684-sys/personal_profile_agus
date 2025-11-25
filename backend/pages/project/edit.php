<?php
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

include '../../actions/project/show.php';
if (!isset($project) || !$project) {
    echo "<script>alert('Data tidak ditemukan');window.location.href='index.php';</script>";
    exit;
}
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
                                    <form action="../../actions/project/update.php?id=<?= $project->id ?>" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label class="form-label">Judul Project</label>
                                            <input type="text" class="form-control" name="title"
                                                value="<?= htmlspecialchars($project->title) ?>" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Pekerjaan</label>
                                            <input type="text" name="job" class="form-control"
                                                value="<?= htmlspecialchars($project->job) ?>" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Kategori</label>
                                            <select class="form-select" name="category" required>
                                                <option value="" disabled>Pilih Kategori</option>
                                                <option value="programming" <?= $project->category == 'programming' ? 'selected' : '' ?>>Programming</option>
                                                <option value="multimedia" <?= $project->category == 'multimedia' ? 'selected' : '' ?>>Multimedia</option>
                                                <option value="prestasi" <?= $project->category == 'prestasi' ? 'selected' : '' ?>>Prestasi</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi</label>
                                            <textarea name="description" class="form-control" rows="4" required><?=
                                                                                                                htmlspecialchars($project->description)
                                                                                                                ?></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Gambar Saat Ini</label>
                                            <div>
                                                <?php if (!empty($project->image) && file_exists('../../../storages/projects/' . $project->image)): ?>
                                                    <img src="../../../storages/projects/<?= htmlspecialchars($project->image) ?>"
                                                        class="img-thumbnail" style="max-width: 200px;">
                                                <?php else: ?>
                                                    <div class="text-muted">Tidak ada gambar</div>
                                                <?php endif; ?>
                                            </div>

                                            <label class="form-label mt-3">Ubah Gambar (Opsional)</label>
                                            <input type="file" name="image" class="form-control"
                                                accept="image/jpeg, image/png, image/jpg">
                                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                                        </div>

                                        <div class="d-flex gap-2">
                                            <button type="submit" class="btn btn-success px-4" name="tombol">Simpan</button>
                                            <a href="./index.php" class="btn btn-primary">
                                                <i class="fas fa-arrow-left"></i> Kembali
                                            </a>
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