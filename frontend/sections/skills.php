<?php
include('../config/connection.php');

// Ambil semua skills
$qSkills = "SELECT * FROM skills";
$resultSkills = mysqli_query($connect, $qSkills) or die(mysqli_error($connect));
?>

<section id="skills">
    <div class="container">
        <h2>Skills</h2>
        <p>Keahlian yang saya miliki merupakan hasil dari pengalaman, pembelajaran, dan dedikasi untuk memberikan solusi terbaik di setiap proyek.</p>
        
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($resultSkills)) : ?>
                <div class="col-12" style="margin-bottom:25px;"> <!-- Lebar penuh dan jarak lebih besar -->
                    <div class="skill-item" style="padding:20px; border-radius:8px; background:#fff; box-shadow:0 4px 10px rgba(0,0,0,0.1);">
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            <h4 style="margin:0; font-size:20px; font-weight:bold;"><?= $row['skill'] ?></h4>
                            <span style="font-size:16px; font-weight:bold;"><?= $row['percent'] ?>%</span>
                        </div>
                        <div style="height:10px; margin-top:10px; background:#f0f0f0; border-radius:5px;">
                            <div style="height:100%; width:<?= $row['percent'] ?>%; background:#3498db; border-radius:5px;"></div>
                        </div>
                        <div class="skill-desc" style="font-size:15px; color:#555; margin-top:10px; max-height:0; overflow:hidden; transition:max-height 0.3s ease;">
                            <?= $row['description'] ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<script>
document.querySelectorAll('.skill-item').forEach(item => {
    item.addEventListener('mouseenter', () => {
        item.querySelector('.skill-desc').style.maxHeight = '200px';
    });
    item.addEventListener('mouseleave', () => {
        item.querySelector('.skill-desc').style.maxHeight = '0';
    });
});
</script>
