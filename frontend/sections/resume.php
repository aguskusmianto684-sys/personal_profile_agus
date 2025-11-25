<?php
include '../config/connection.php';

// Ambil data about
$qAbout = "SELECT * FROM abouts LIMIT 1";
$result_about = mysqli_query($connect, $qAbout) or die(mysqli_error($connect));
$itemAbout = $result_about->fetch_object();

// Ambil sumary dari resume pertama kali dibuat
// $qSumary = "SELECT sumary FROM resumes ORDER BY id ASC LIMIT 1";
// $result_sumary = mysqli_query($connect, $qSumary) or die(mysqli_error($connect));
// $itemSumary = ($result_sumary && $result_sumary->num_rows > 0) ? $result_sumary->fetch_object() : null;

// Ambil semua data riwayat dari resume (paling lama ke paling baru)
$qResume = "SELECT * FROM resumes ORDER BY id ASC";
$result_resume = mysqli_query($connect, $qResume) or die(mysqli_error($connect));
?>

<section id="resume" class="resume section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Resume</h2>
        <p>Ringkasan perjalanan belajar saya yang menunjukkan dedikasi, pengalaman, dan komitmen untuk terus berkembang.</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5">
            <div class="col-lg-4">
                <div class="resume-side pe-lg-4" data-aos="fade-right" data-aos-delay="100">
                    <h3 class="mb-3">Sumary</h3>
                    <p class="mb-4">
                        Saya siswa smkn 3 banjar jurusan pplg, dan selama di sekolah banyak yang telah saya pelajari, seperti belajar tentang coding, dan bahasa pemrograman yang saya pahami, seperti html, css, js, dan php.
                    </p>
                    <a href="https://wa.me/085950898193" target="_blank" class="btn btn-outline-dark rounded-pill px-4 py-2">Hubungi saya</a>
                    <a href="#contact" class="btn btn-outline-dark rounded-pill px-4 py-2">Kirim pesan</a>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="resume-section ps-lg-4" data-aos="fade-up">
                    <h3 class="mb-4"><i class="bi bi-briefcase me-2"></i>Data riwayat</h3>

                    <?php if ($result_resume && $result_resume->num_rows > 0): ?>
                        <?php while ($itemResume = $result_resume->fetch_object()): ?>
                            <div class="resume-item mb-4 pb-3 border-bottom">
                                <h4 class="text-capitalize fw-bold mb-1"><?= htmlspecialchars($itemResume->job) ?></h4>
                                <h5 class="text-capitalize text-muted mb-2"><?= htmlspecialchars($itemResume->date) ?></h5>
                                <p class="company text-capitalize mb-2">
                                    <i class="bi bi-building me-2"></i> <?= htmlspecialchars($itemResume->place) ?>
                                </p>
                                <ul class="ps-3 mb-0">
                                    <li class="text-capitalize"><?= htmlspecialchars($itemResume->description) ?></li>
                                </ul>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p class="text-muted">Belum ada data riwayat.</p>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>
