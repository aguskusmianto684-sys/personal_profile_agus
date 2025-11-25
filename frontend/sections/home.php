<?php
include '../config/connection.php';

$qAbouts = "SELECT * FROM abouts";
$result = mysqli_query($connect, $qAbouts) or die(mysqli_error(mysql: $connect));
$qService = "SELECT * FROM services";
$result_service = mysqli_query($connect, $qService) or die(mysqli_error(mysql: $connect));
$item = $result->fetch_object();

$data_items = [];
while ($row = mysqli_fetch_assoc($result_service)) {
    $data_items[] = $row['job']; //ambil nama service
}
?>
<section id="hero" class="hero section dark-background"
    style="background: linear-gradient(135deg, #0f2027, #203a43, #2c5364); padding: 80px 0;">

    <div class="container">
        <div class="row align-items-center">
            <!-- Kolom Teks -->
            <div class="col-lg-6 text-start" data-aos="fade-up" data-aos-delay="100">
                <h1 class="display-3 fw-bold" style="user-select:none; -webkit-user-select:none;">Portofolio</h1>
                <h3 class="text-uppercase mt-5" style="font-weight: bold; user-select:none; -webkit-user-select:none;"><?= htmlspecialchars($item->name) ?></h3>
                <p class="lead">Saya adalah <span class="typed" 
      style="user-select:none; -webkit-user-select:none; text-transform:capitalize;" 
      data-typed-items="<?= implode(', ', $data_items) ?>">
</span>

                <div class="hero-actions d-flex gap-3 mt-5">
                    <a href="#project" class="btn btn-light rounded-pill px-4 py-2 text-dark">Lihat Projek Saya</a>
                    <a href="#about" class="btn btn-outline-light rounded-pill px-4 py-2">Tentang Saya</a>
                </div>
            </div>

            <!-- Kolom Gambar -->
            <div class="col-lg-6 mt-5 mt-lg-0">
                <div class="position-relative p-3">
                    <div style="position: absolute; top: -15px; left: -15px; width: 100%; height: 100%; 
                        border: 3px solid rgba(255,255,255,0.2); border-radius: 20px;"></div>
                    <img src="temp_user/assets/img/agus-promag.jpg"
                        alt="Profile"
                        class="img-fluid rounded shadow-lg"
                        style="position: relative; z-index: 1; max-height: 400px; object-fit: cover; border-radius: 20px;">
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /Hero Section -->