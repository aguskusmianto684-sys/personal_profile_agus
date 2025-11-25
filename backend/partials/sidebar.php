<?php
include __DIR__ . '/../../config/connection.php';

$path_parts = explode('/', trim($_SERVER['PHP_SELF'], '/'));
$current_folder = $path_parts[count($path_parts) - 2]; // ambil folder sebelum file

// Ambil profil PERTAMA (untuk sidebar tetap)
$qFirstProfile = "SELECT * FROM abouts ORDER BY id ASC LIMIT 1"; // ASC untuk dapat yang pertama
$resFirstProfile = mysqli_query($connect, $qFirstProfile);
$mainProfile = ($resFirstProfile && mysqli_num_rows($resFirstProfile) > 0) ? mysqli_fetch_object($resFirstProfile) : null;

// Data default
$nama = is_object($mainProfile) ? $mainProfile->name : 'User Tidak Dikenal';
$fotoName = is_object($mainProfile) ? $mainProfile->image : 'default.jpg';

// Path ke gambar
$relativePath = "../../../storages/about/" . $fotoName;
$absolutePath = __DIR__ . '/../../storages/about/' . $fotoName;

// Jika file tidak ditemukan, fallback ke default
if (!file_exists($absolutePath)) {
  $relativePath = "../../../storages/about/default.jpg";
}
?>

<style>
  .sidebar .nav-link,
  .sidebar .nav-link i {
    color: white !important;
    background-color: transparent !important;
    border-left: none !important;
  }

  .sidebar .nav-link:hover,
  .sidebar .nav-link.active {
    background-color: #333 !important;
    color: white !important;
    border-left: none !important;
  }

  /* Hilangkan garis aktif bawaan */
  .sidebar .nav-link::before {
    display: none !important;
  }

  /* Icon + text geser kanan + jarak vertikal lebih rapat */
  .sidebar .nav-link {
    padding: 6px 30px !important;
    /* atas-bawah 6px, kiri-kanan 30px */
    display: flex;
    align-items: center;
  }

  .sidebar .nav-link i {
    margin-right: 10px;
    /* jarak antara icon dan teks */
    font-size: 18px;
  }
</style>



<div class="container-scroller">
  <nav class="sidebar sidebar-offcanvas bg-dark text-white" id="sidebar">
    <div class="brand-logo d-flex flex-column align-items-center justify-content-center pb-4">
      <a href="./index.php" class="text-nowrap logo-img">
        <img src="<?= htmlspecialchars($relativePath) ?>"
          width="100" height="100" alt="Profil"
          class="rounded-circle d-block mx-auto my-2 shadow"
          style="background: #e3f0ff; box-shadow: 0 4px 12px rgba(0,0,0,0.15); padding: 6px;" />
      </a>
      <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="ti ti-x fs-8"></i>
      </div>
    </div>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link text-white <?= $current_folder === 'dashboard' ? 'active' : '' ?>" href="../dashboard/index.php">
          <i class="mdi mdi-view-dashboard" style="margin-right: 10px;"></i> Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white <?= $current_folder === 'about' ? 'active' : '' ?>" href="../about/index.php">
          <i class="mdi mdi-account" style="margin-right: 10px;"></i> About
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white <?= $current_folder === 'blog' ? 'active' : '' ?>" href="../blog/index.php">
          <i class="mdi mdi-book-open" style="margin-right: 10px;"></i> Blog
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white <?= $current_folder === 'contact' ? 'active' : '' ?>" href="../contact/index.php">
          <i class="mdi mdi-email" style="margin-right: 10px;"></i> Contact
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white <?= $current_folder === 'project' ? 'active' : '' ?>" href="../project/index.php">
          <i class="mdi mdi-briefcase" style="margin-right: 10px;"></i> Project
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white <?= $current_folder === 'resume' ? 'active' : '' ?>" href="../resume/index.php">
          <i class="mdi mdi-file-document" style="margin-right: 10px;"></i> Resume
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white <?= $current_folder === 'service' ? 'active' : '' ?>" href="../service/index.php">
          <i class="bi bi-server" style="margin-right: 10px;"></i> Service
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white <?= $current_folder === 'skil' ? 'active' : '' ?>" href="../skill/index.php">
          <i class="mdi mdi-chart-bar" style="margin-right: 10px;"></i> Skill
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="../socmed/index.php">
          <i class="mdi mdi-share-variant" style="margin-right: 10px;"></i> Socmeds
        </a>
      </li>

    </ul>
  </nav>
</div>