<?php
include '../../../config/connection.php';
include '../../actions/resume/show.php';
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
                                <div class="card-body">
                                    <div class="card-header" style="background: linear-gradient(135deg, #023e8a, #0077b6, #90e0ef); border: none;">
                                        <h5>Ubah Data Resume</h5>
                                    </div>
                                    <form action="../../actions/resume/store.php" method="POST">
                                        <div class="mb-3">
                                            <label for="dateInput" class="form-label">Periode</label>
                                            <input type="text" class="form-control" value="<?= $resume->date ?>" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="jobInput" class="form-label">Pekerjaan</label>
                                            <input type="text" class="form-control" value="<?= $resume->job ?>" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="placeInput" class="form-label">Tempat</label>
                                            <input type="text" class="form-control" value="<?= $resume->place ?>" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="sumaryInput" class="form-label">Ringkasan</label>
                                            <textarea type="text" class="form-control" rows="4" disabled><?= $resume->sumary ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="descriptionInput" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" rows="4" disabled><?= $resume->description ?></textarea>
                                        </div>
                                        <a href="./index.php" class="btn btn-primary">Kembali</a>
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