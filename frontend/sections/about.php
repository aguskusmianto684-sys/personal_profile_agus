<?php
include '../config/connection.php';

// Ambil data PERTAMA dari tabel abouts (bukan terakhir)
$qFirstAbout = "SELECT * FROM abouts ORDER BY id ASC LIMIT 1"; // ASC untuk dapat yang pertama
$result = mysqli_query($connect, $qFirstAbout) or die(mysqli_error($connect));
$item = mysqli_fetch_object($result);

// Hitung total skill
$qCountSkill = "SELECT COUNT(*) as total FROM skills";
$totalSkill = mysqli_fetch_object(mysqli_query($connect, $qCountSkill))->total;

// Hitung total blog
$qCountBlog = "SELECT COUNT(*) as total FROM blogs";
$totalBlog = mysqli_fetch_object(mysqli_query($connect, $qCountBlog))->total;

// Hitung total project
$qCountProject = "SELECT COUNT(*) as total FROM projects";
$totalProject = mysqli_fetch_object(mysqli_query($connect, $qCountProject))->total;
?>

<section id="about" class="about section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row">

            <!-- Kartu Profil -->
            <div class="col-lg-5" data-aos="zoom-in" data-aos-delay="200">
                <div class="profile-card text-center p-4 rounded shadow">
                    <div class="profile-header position-relative">
                        <img src="../storages/about/<?= $item->image ?>" alt="<?= $item->name ?>" class="rounded-circle img-fluid" style="width:120px;height:120px;object-fit:cover;">
                        <span class="badge bg-light position-absolute top-0 end-0 m-2">
                            <i class="bi bi-check-circle-fill text-dark"></i>
                        </span>
                    </div>
                    <h3 class="mt-3 mb-1 fw-bold"><?= strtoupper($item->name) ?></h3>
                    <p class="profession">Web Developer</p>

                    <!-- Kontak -->
                    <div class="text-start mt-3">
                        <div class="contact-item mb-2">
                            <i class="bi bi-envelope"></i> <?= $item->email ?>
                        </div>
                        <div class="contact-item mb-2">
                            <i class="bi bi-telephone"></i> <?= $item->phone ?>
                        </div>
                        <div class="contact-item">
                            <i class="bi bi-geo-alt"></i> <?= $item->address ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tentang Saya -->
            <div class="col-lg-7" data-aos="fade-left" data-aos-delay="300">
                <div class="about-content">

                    <!-- Header -->
                    <span class="badge bg-light text-dark px-3 py-1 rounded-pill mb-3">Get to Know Me</span>
                    <h2 class="fw-bold">Tentang Saya</h2>
                    <p class="mb-4"><?= nl2br($item->description) ?></p>

                    <!-- Statistik -->
                    <div class="d-flex justify-content-around mb-4">
                        <div class="text-center">
                            <h1 class="mb-0"><?= $totalSkill ?></h1>
                            <small class="text-muted">Total Skill</small>
                        </div>
                        <div class="text-center">
                            <h1 class="mb-0"><?= $totalBlog ?></h1>
                            <small class="text-muted">Total Blog</small>
                        </div>
                        <div class="text-center">
                            <h1 class="mb-0"><?= $totalProject ?></h1>
                            <small class="text-muted">Total Project</small>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-5">
                        <a href="https://drive.google.com/file/d/1jaGDxdPOriIB-jkHKL4ilD5NVNfTAat3/view?usp=sharing"
                            class="btn btn-outline-dark rounded-pill py-2">
                            <i class="bi bi-download"></i> Download CV
                        </a>
                    </div>
                    <!-- Tombol Download CV -->

                </div>
            </div>

        </div>
    </div>
</section>