<?php
include '../../../config/connection.php';
include '../../actions/blog/show.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php
include '../../partials/header.php';
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
                                    <h5>Detail Data Blog</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="titleInput" class="form-label">Judul</label>
                                            <input type="text" class="form-control" value="<?= $blog->title ?>" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="authorInput" class="form-label">Penulis</label>
                                            <input type="text" class="form-control" value="<?= $blog->author ?>" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="dateInput" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" value="<?= $blog->date ?>" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="descriptionInput" class="form-label">Deskripsi</label>
                                            <input type="description" class="form-control" value="<?= $blog->description ?>" disabled></input>
                                        </div>
                                        <div class="mb-3">
                                            <h6>Gambar</h6>
                                            <img style="width:100px;height:100px;object-fit:cover;border-radius:0;" src="../../../storages/blog/<?= $blog->image ?>" alt="">
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