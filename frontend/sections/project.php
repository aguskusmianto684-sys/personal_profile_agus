<?php
include '../config/connection.php';

// Ambil semua projects
$qProject = "SELECT * FROM projects ORDER BY id DESC LIMIT 3";
$result = mysqli_query($connect, $qProject) or die(mysqli_error($connect));

// Ambil kategori unik
$qCategory = mysqli_query($connect, "SELECT DISTINCT category FROM projects");
?>

<section id="project" class="portfolio section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Project</h2>
        <p>Beberapa project yang pernah saya buat sebagai hasil karya dan pengalaman belajar.</p>
    </div>

    <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <!-- Filter Kategori -->
            <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">All</li>
                <?php while ($category = mysqli_fetch_object($qCategory)): ?>
                    <li data-filter=".filter-<?= strtolower($category->category) ?>">
                        <?= ucfirst($category->category) ?>
                    </li>
                <?php endwhile; ?>
            </ul>

            <!-- Daftar Project -->
            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                <?php while ($project = mysqli_fetch_object($result)):
                    $imagePath = '../storages/projects/' . $project->image;
                    $imageExists = !empty($project->image) && file_exists($imagePath);

                    // Konten popup dengan icon
                    $popupContent = '
                        <div class="project-detail-popup">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-briefcase-fill text-primary me-2"></i>
                                <p class="mb-0"><strong>Job:</strong> ' . htmlspecialchars($project->job) . '</p>
                            </div>
                            <div class="d-flex align-items-start">
                                <i class="bi bi-card-text text-primary me-2 mt-1"></i>
                                <div>
                                    <p class="mb-1"><strong>Description:</strong></p>
                                    <p class="mb-0">' . nl2br(htmlspecialchars($project->description)) . '</p>
                                </div>
                            </div>
                        </div>
                    ';
                ?>
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-<?= strtolower($project->category) ?>">
                        <div class="card h-100 shadow-sm border-0">
                            <?php if ($imageExists): ?>
                                <img src="<?= $imagePath ?>" 
                                     class="card-img-top" 
                                     alt="<?= htmlspecialchars($project->title) ?>" 
                                     loading="lazy" 
                                     style="height: 250px; object-fit: cover;">
                            <?php else: ?>
                                <img src="assets/img/placeholder.jpg" 
                                     class="card-img-top" 
                                     alt="Placeholder Image" 
                                     loading="lazy" 
                                     style="height: 250px; object-fit: cover;">
                            <?php endif; ?>

                            <div class="card-body d-flex flex-column text-transform">
                                <h5 class="card-title"><?= htmlspecialchars($project->title) ?></h5>
                                <p class="card-text text-muted mb-3"><?= htmlspecialchars($project->job) ?></p>

                                <div class="mt-auto">
                                    <?php if ($imageExists): ?>
                                        <a href="<?= $imagePath ?>"
                                           data-gallery="portfolio-gallery-<?= strtolower($project->category) ?>"
                                           class="btn btn-sm btn-primary glightbox preview-link"
                                           data-title="<?= htmlspecialchars($project->title) ?>"
                                           data-description='<?= $popupContent ?>'>
                                           <i class="bi bi-zoom-in"></i> Lihat Detail
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Card -->
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>

<style>
    .project-detail-popup {
        padding: 10px;
    }
    .project-detail-popup i {
        font-size: 1.2rem;
    }
</style>