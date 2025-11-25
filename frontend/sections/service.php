<?php
include '../config/connection.php';

$qServices = "SELECT * FROM services";
$result = mysqli_query($connect, $qServices) or die(mysqli_error($connect));
?>

<section id="services" class="services section py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="container section-title" data-aos="fade-up">
                <h2>Services</h2>
                <p>Saya menawarkan jasa pembuatan website dan solusi digital yang dibuat khusus sesuai kebutuhan kamu.</p>
            </div>
        </div>

        <div class="row justify-content-center g-4">
            <?php while ($item = mysqli_fetch_object($result)) : ?>
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100 text-center p-4"
                        data-aos="fade-up"
                        data-aos-delay="<?= rand(100, 200) ?>">
                        <div class="icon-wrapper bg-dark bg-gradient rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center"
                            style="width:80px; height:80px;">
                            <i class="<?= $item->icon ?> text-white fs-3"></i>
                        </div>
                        <h4 class="fw-bold mb-3"><?= ucwords($item->job) ?></h4>
                        <p class="text-muted"><?= $item->description ?? '' ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>