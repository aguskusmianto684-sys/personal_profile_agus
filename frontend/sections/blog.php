<?php
include '../config/connection.php';

$qBlogs = "SELECT * FROM blogs ORDER BY date DESC LIMIT 3";
$result = mysqli_query($connect, $qBlogs);

if (!$result) {
    die("Error: " . mysqli_error($connect));
}
?>

<!-- Blog Section -->
<section id="blog" class="services section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Blog</h2>
        <p>Melalui blog ini, saya berbagi cerita, pengetahuan, serta inspirasi yang saya temui dalam perjalanan belajar dan berkarya.</p>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row gy-4">
            <?php
            $delay = 100;
            while ($blog = mysqli_fetch_assoc($result)):
                $image_path = '../storages/blog/' . $blog['image'];
                $image_display = (!empty($blog['image']) && file_exists($image_path))
                    ? $image_path
                    : 'https://via.placeholder.com/300x300?text=No+Image';

                // Potong deskripsi jika terlalu panjang
                $short_description = strlen($blog['description']) > 100
                    ? substr($blog['description'], 0, 100) . '...'
                    : $blog['description'];
            ?>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                    <div class="position-relative" style="border-radius:10px; overflow:hidden; box-shadow:0 10px 10px rgba(0,0,0,0.1); background:#fff; height:100%;">

                        <!-- Gambar Blog -->
                        <div style="position: relative;">
                            <img src="<?= $image_display ?>" alt="<?= htmlspecialchars($blog['title']) ?>"
                                style="width:100%; height:200px; object-fit:cover; display:block;">

                            <!-- Overlay dengan icon -->
                            <div style="position:absolute; top:0; left:0; right:0; bottom:0; background:rgba(0,0,0,0.5); 
                            display:flex; justify-content:center; align-items:center; opacity:0; transition:opacity 0.3s;"
                                onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0'">
                                <div style="display:flex; gap:15px;">
                                    <a href="<?= $image_display ?>"
                                        class="glightbox"
                                        data-title="<?= htmlspecialchars($blog['title']) ?>"
                                        data-description="<?= htmlspecialchars($blog['description']) ?>">
                                        <i class="bi bi-zoom-in" style="font-size:24px; color:white;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Konten Blog -->
                        <div style="padding:15px; display:flex; flex-direction:column; height:calc(100% - 200px);">
                            <!-- Tanggal dan Author -->
                            <div style="font-size:12px; color:#666; margin-bottom:8px; display:flex; align-items:center;">
                                <span style="margin-right:15px;"><i class="bi bi-calendar3 me-1"></i> <?= date('d M Y', strtotime($blog['date'])) ?></span>
                                <span><i class="bi bi-person me-1"></i> <?= htmlspecialchars($blog['author'] ?? 'Agus Kusmianto') ?></span>
                            </div>

                            <h3 style="font-size:16px; font-weight:bold; margin-bottom:8px;">
                                <a href="detail_blog.php?id=<?= $blog['id'] ?>" style="text-decoration:none; color:black;">
                                    <?= htmlspecialchars($blog['title']) ?>
                                </a>
                            </h3>

                            <!-- Deskripsi pendek -->
                            <p style="font-size:13px; color:#555; margin-bottom:15px; flex-grow:1;">
                                <?= htmlspecialchars($short_description) ?>
                            </p>

                            <?php if (!empty($blog['category'])): ?>
                                <span class="badge bg-primary mb-3" style="align-self:flex-start;">
                                    <?= htmlspecialchars($blog['category']) ?>
                                </span>
                            <?php endif; ?>

                            <!-- Tombol Detail di tengah -->
                            <div style="text-align: center; margin-top: auto;">
                                <a href="detail_blog.php?id=<?= $blog['id'] ?>&redirect=<?= urlencode('index.php#blog') ?>" 
                                   class="btn btn-outline-dark rounded-pill px-3 py-1" 
                                   style="font-size: 12px;">
                                   Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                $delay += 100;
                if ($delay > 300) $delay = 100;
            endwhile;
            ?>
        </div>

        <!-- Tombol Lihat Selengkapnya di bawah dan center -->
        <div style="text-align:center; margin-top:20px;">
            <a href="list_blog.php" class="btn btn-outline-dark rounded-pill px-4 py-2 text-capitalize">
                Lihat Selengkapnya <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<?php mysqli_close($connect); ?>