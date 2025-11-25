<?php
include '../../../config/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php
include '../../partials/header.php';
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
                                    <h5>Tambah Data About</h5>
                                </div>
                                <div class="card-body">
                                    <form action="../../actions/project/store.php" method="POST" enctype="multipart/form-data">
                                        <!-- Judul Project -->
                                        <div class="mb-3">
                                            <label class="form-label">Judul Project</label>
                                            <input type="text" name="title" class="form-control" placeholder="Masukkan Judul Project..." required>
                                        </div>

                                        <!-- Pekerjaan -->
                                        <div class="mb-3">
                                            <label class="form-label">Pekerjaan</label>
                                            <input type="text" name="job" class="form-control" placeholder="Masukkan Nama Pekerjaan..." required>
                                        </div>

                                        <!-- Kategori -->
                                        <div class="mb-3">
                                            <label class="form-label">Kategori</label>
                                            <select class="form-select" name="category" required>
                                                <option value="" selected disabled>Pilih Kategori</option>
                                                <option value="programming">Programming</option>
                                                <option value="multimedia">Multimedia</option>
                                                <option value="prestasi">Prestasi</option>
                                            </select>
                                        </div>

                                        <!-- Deskripsi -->
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi</label>
                                            <textarea name="description" class="form-control" rows="4" placeholder="Masukkan deskripsi..." required></textarea>
                                        </div>

                                        <!-- Gambar -->
                                        <div class="mb-4">
                                            <label class="form-label">Gambar</label>
                                            <input type="file" name="image" class="form-control" required>
                                        </div>

                                        <!-- Tombol -->
                                        <div class="d-flex gap-2">
                                            <button type="submit" class="btn btn-success px-4" name="tombol">Simpan</button>
                                            <a href="./index.php" class="btn btn-primary px-4">Kembali</a>
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