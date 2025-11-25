<?php
include __DIR__ . '/../../config/connection.php';

// Ambil data profil PERTAMA dari tabel abouts (bukan terakhir)
$qFirstProfile = "SELECT * FROM abouts ORDER BY id ASC LIMIT 1"; // ASC untuk dapat yang pertama
$resFirstProfile = mysqli_query($connect, $qFirstProfile);
$mainProfile = ($resFirstProfile && mysqli_num_rows($resFirstProfile) > 0) ? mysqli_fetch_object($resFirstProfile) : null;

// Cek dan siapkan path foto profil
$fotoProfil = (!empty($mainProfile->image) && file_exists(__DIR__ . '/../../storages/about/' . $mainProfile->image))
  ? '/pkl_lauwba/personal_profile_agus/storages/about/' . $mainProfile->image
  : '/pkl_lauwba/personal_profile_agus/storages/about/default.jpg';
?>

<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="z-index: 1040;">


  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end bg-dark flex-grow-1 pe-4">
    <ul class="navbar-nav ms-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle d-flex align-items-center text-white" href="#"
          id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-person-circle me-1"></i> <!-- Icon user -->
        </a>

        <ul class="dropdown-menu shadow"
          aria-labelledby="profileDropdown"
          style="min-width: 220px; margin-top: 0px; z-index: 9999; position: absolute; left: -125px;">

          <li class="dropdown-header text-center">
            <img src="<?= $fotoProfil ?>" alt="profile"
              class="rounded-circle mb-2" style="width: 60px; height: 60px; object-fit: cover;">
            <h6 class="mb-0 text-uppercase"><?= htmlspecialchars($mainProfile->name ?? 'Admin') ?></h6>
            <small><?= htmlspecialchars($mainProfile->email ?? '-') ?></small>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item d-flex align-items-center" href="../../actions/auth/logout.php"><i class="mdi mdi-logout me-2"></i> Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>