<?php
include '../config/connection.php';
$qAbouts = "SELECT * FROM abouts";
$result = mysqli_query($connect, $qAbouts) or die(mysqli_error($connect));
$qSocmed = "SELECT * FROM socmeds"; // pastikan tabelnya sesuai
$socmed = mysqli_query($connect, $qSocmed) or die(mysqli_error($connect));
$item = $result->fetch_object();
?>
<header id="header" class="header dark-background d-flex flex-column"
    style="background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);">

    <i class="header-toggle d-xl-none bi bi-list"></i>
    <nav id="navmenu" class="navmenu">
        <div class="profile-img text-center w-100 mt-5">
            <img src="../storages/about/<?= $item->image ?>"alt=""class="img-fluid rounded-circle mx-auto d-block"style="width: 120px; height: 120px; object-fit: cover; -webkit-user-select:none;">
        </div>


        <!-- <a href="#hero" class="logo d-flex align-items-center justify-content-center">
            <h1 class="sitename text-light text-uppercase mb-0"><?= $item->name ?></h1>
        </a> -->
        <ul class=" text-uppercase mt-4" style="user-select:none; -webkit-user-select:none;">
            <li><a href="#hero" class="active"><i class="bi bi-house navicon"></i>Home</a></li>
            <li><a href="#about"><i class="bi bi-person navicon"></i> About</a></li>
            <li><a href="#blog"><i class="bi bi-newspaper navicon"></i> blog</a></li>
            <li><a href="#skills"><i class="bi bi-images navicon"></i> Skill</a></li>
            <li><a href="#resume"><i class="bi bi-file-earmark-text navicon"></i> Resume</a></li>
            <li><a href="#project"><i class="bi bi-journal-bookmark-fill navicon"></i> Project</a></li>
            <li><a href="#services"><i class="bi bi-hdd-stack navicon"></i> Services</a></li>
            <li><a href="#contact"><i class="bi bi-envelope navicon"></i> Contact</a></li>
        </ul>
    </nav>
    <div class="social-links text-center mt-3">

        <?php while ($s = $socmed->fetch_object()): ?>
            <a href="<?= $s->link ?>" target="_blank">
                <i class="bi bi-<?= strtolower($s->icon) ?> text-white"></i>
            </a>
        <?php endwhile; ?>
    </div>
</header>

