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

// Fetch all blogs with pagination
$limit = 6;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$query = "SELECT SQL_CALC_FOUND_ROWS * FROM blogs ORDER BY date DESC LIMIT $limit OFFSET $offset";
$result = $connect->query($query);

$total_result = $connect->query("SELECT FOUND_ROWS()");
$total_rows = $total_result->fetch_row()[0];
$total_pages = ceil($total_rows / $limit);

if (!$result) {
    die("Query failed: " . $connect->error);
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Blog</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>

<body>
    <section id="blog-list" class="text-capitalize py-5">
        <div class="container">
            <div class="d-flex align-items-center mb-5">
                <h1 class="display-5 fw-bold me-auto">Daftar Blog</h1>
                <a href="index.php#blog" class="btn btn-outline-dark rounded-pill px-4 py-2">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <!-- Blog List -->
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($blog = $result->fetch_assoc()):
                        $image_path = '../storages/blog/' . $blog['image'];
                        $image_display = (!empty($blog['image']) && file_exists($image_path))
                            ? $image_path
                            : 'https://via.placeholder.com/800x500?text=No+Image';
                    ?>
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <?php if (!empty($blog['image'])): ?>
                                    <div class="ratio ratio-16x9">
                                        <img src="<?= $image_display ?>"
                                            class="card-img-top object-fit-cover"
                                            alt="<?= htmlspecialchars($blog['title'] ?? '') ?>">
                                    </div>
                                <?php endif; ?>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"><?= htmlspecialchars($blog['title'] ?? 'Judul tidak tersedia') ?></h5>
                                    <p class="card-text text-muted small">
                                        <i class="bi bi-calendar"></i> <?= date('d M Y', strtotime($blog['date'])) ?>
                                        <?php if (!empty($blog['author'])): ?>
                                            | <i class="bi bi-person"></i> <?= htmlspecialchars($blog['author']) ?>
                                        <?php endif; ?>
                                    </p>
                                    <p class="card-text flex-grow-1">
                                        <?= substr(nl2br(htmlspecialchars($blog['description'] ?? '')), 0, 150) ?>...
                                    </p>
                                    <div class="mt-auto">
                                        <a href="detail_blog.php?id=<?= $blog['id'] ?>&redirect=<?= urlencode('list_blog.php?page=' . $page) ?>"
                                            class="btn btn-sm btn-outline-primary w-100 read-more-btn">
                                            Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="col-12">
                        <div class="alert alert-info">
                            Tidak ada blog yang tersedia.
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <?php if ($total_pages > 1): ?>
                <nav class="mt-5">
                    <ul class="pagination justify-content-center">
                        <?php if ($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($page < $total_pages): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            <?php endif; ?>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>