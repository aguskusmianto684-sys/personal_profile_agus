<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include connection file
include '../config/connection.php';

// Check if connection was successful
if (!isset($connect) || !($connect instanceof mysqli)) {
    die("Error: Database connection failed. " . ($connect->connect_error ?? ''));
}

// Validate blog ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error'] = 'Invalid blog ID';
    header('Location: blog.php'); // Redirect to your blog listing page
    exit;
}

$id = (int)$_GET['id'];

// Use prepared statement for security
$stmt = $connect->prepare("SELECT * FROM blogs WHERE id = ?");
if (!$stmt) {
    die("Prepare failed: " . $connect->error);
}

$stmt->bind_param('i', $id);
if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}

$result = $stmt->get_result();
$blog = $result->fetch_assoc();

if (!$blog) {
    die("<div style='color:red; padding:10px;'>Blog not found</div>");
}

// Tentukan halaman redirect
if (isset($_GET['redirect'])) {
    // Gunakan redirect yang dikirim dari link
    $redirect = $_GET['redirect'];
} else {
    // Kalau tidak ada parameter, ambil dari referer jika bukan detail_blog
    $referer = $_SERVER['HTTP_REFERER'] ?? '';
    if ($referer && strpos($referer, 'detail_blog.php') === false) {
        $redirect = $referer;
    } else {
        $redirect = 'index.php#blog'; // default
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($blog['title'] ?? 'Blog Detail') ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        .blog-content img {
            max-width: 100%;
            height: auto;
            margin: 20px auto;
            display: block;
            border-radius: 8px;
        }

        .related-article {
            transition: transform 0.3s;
        }

        .related-article:hover {
            transform: translateY(-5px);
        }
        
        .text-limit {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .meta-item {
            font-size: 14px;
            color: #666;
            margin-right: 15px;
        }
    </style>
</head>

<body>
    <!-- Navigation or header would go here -->

    <section id="blog-detail" class="text-capitalize py-5">
        <div class="container">
            <!-- Back button -->
            <div class="d-flex justify-content-between align-items-center mb-5">
                <a href="<?= htmlspecialchars($redirect) ?>" class="btn btn-outline-dark rounded-pill px-4 py-2">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
            
            <!-- Blog Content -->
            <article class="mb-5" data-aos="fade-up">
                <h1 class="mb-3"><?= htmlspecialchars($blog['title'] ?? 'Judul tidak tersedia') ?></h1>

                <!-- Meta Information -->
                <div class="d-flex flex-wrap align-items-center mb-4">
                    <div class="meta-item">
                        <i class="bi bi-calendar me-1"></i> <?= date('d F Y', strtotime($blog['date'])) ?>
                    </div>
                    <?php if (!empty($blog['author'])): ?>
                    <div class="meta-item">
                        <i class="bi bi-person me-1"></i> <?= htmlspecialchars($blog['author']) ?>
                    </div>
                    <?php endif; ?>
                    <?php if (!empty($blog['category'])): ?>
                    <div class="meta-item">
                        <span class="badge bg-primary"><?= htmlspecialchars($blog['category']) ?></span>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Blog Image -->
                <?php if (!empty($blog['image'])):
                    $image_path = '../storages/blog/' . $blog['image'];
                    if (file_exists($image_path)): ?>
                        <div class="text-center">
                            <img src="<?= $image_path ?>"
                                class="img-fluid rounded mb-4"
                                alt="<?= htmlspecialchars($blog['title'] ?? '') ?>">
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <!-- Blog Content -->
                <div class="blog-content">
                    <?= nl2br(htmlspecialchars($blog['description'] ?? 'Konten tidak tersedia')) ?>
                </div>
            </article>

            <!-- Related Articles -->
            <div class="mt-5 pt-5 border-top">
                <h3 class="mb-4">Artikel Terkait</h3>
                <div class="row g-4">
                    <?php
                    $relatedQuery = "SELECT id, title, image, date, author, description FROM blogs WHERE id != ? ORDER BY date DESC LIMIT 3";
                    $stmt = $connect->prepare($relatedQuery);
                    if (!$stmt) {
                        die("Prepare failed: " . $connect->error);
                    }

                    $stmt->bind_param('i', $id);
                    if (!$stmt->execute()) {
                        die("Execute failed: " . $stmt->error);
                    }

                    $relatedResult = $stmt->get_result();

                    while ($related = $relatedResult->fetch_assoc()):
                        $related_image_path = '../storages/blog/' . $related['image'];
                        $related_image_display = (!empty($related['image']) && file_exists($related_image_path))
                            ? $related_image_path
                            : 'https://via.placeholder.com/300x200?text=No+Image';
                            
                        $short_description = strlen($related['description']) > 100 
                            ? substr($related['description'], 0, 100) . '...' 
                            : $related['description'];
                    ?>
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="related-article card h-100">
                                <?php if (!empty($related['image'])): ?>
                                    <img src="<?= $related_image_display ?>"
                                        class="card-img-top" style="height: 200px; object-fit: cover;"
                                        alt="<?= htmlspecialchars($related['title'] ?? '') ?>">
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($related['title'] ?? 'Judul tidak tersedia') ?></h5>
                                    
                                    <!-- Meta Information -->
                                    <div class="d-flex flex-wrap align-items-center mb-2">
                                        <div class="meta-item">
                                            <i class="bi bi-calendar me-1"></i> <?= date('d M Y', strtotime($related['date'])) ?>
                                        </div>
                                        <?php if (!empty($related['author'])): ?>
                                        <div class="meta-item">
                                            <i class="bi bi-person me-1"></i> <?= htmlspecialchars($related['author']) ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <!-- Limited Description -->
                                    <p class="card-text text-muted text-limit">
                                        <?= htmlspecialchars($short_description) ?>
                                    </p>
                                </div>
                                <div class="card-footer bg-transparent">
                                    <a href="detail_blog.php?id=<?= $related['id'] ?>&redirect=<?= urlencode('detail_blog.php?id=' . $id . '&redirect=' . $redirect) ?>" class="btn btn-sm btn-outline-primary">
                                        Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer would go here -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>