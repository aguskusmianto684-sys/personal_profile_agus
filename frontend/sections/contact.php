<?php
include '../config/connection.php';

$qAbout = "SELECT * FROM abouts";
$result = mysqli_query($connect, $qAbout) or die(mysqli_error($connect));
$qcontact = "SELECT * FROM contacts";
$result_contact = mysqli_query($connect, $qcontact) or die(mysqli_error($connect));
$itemAbout = $result->fetch_object();
?>

<section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Kontak</h2>
        <p>Hubungi saya untuk informasi lebih lanjut, dan berikan kritik dan saran, atau kerja sama.</p>
    </div>

    <div class="container">
        <div class="row g-4 g-lg-5">

            <!-- Card Kontak -->
            <div class="col-lg-5 d-flex flex-column">
                <div class="card shadow-sm border rounded h-100">
                    <div class="card-body d-flex flex-column">
                        <h3>Kontak Saya</h3>
                        <p>Silakan hubungi melalui informasi di bawah ini untuk konsultasi atau dukungan teknis.</p>

                        <div class="info-item mb-4">
                            <a href="#about" class="icon-box">
                                <i class="bi bi-geo-alt"></i>
                            </a>
                            <div class="content">
                                <h4>Lokasi</h4>
                                <?= !empty($itemAbout->address) ? $itemAbout->address : 'Jl. Contoh No. 123, Kota, Negara' ?>
                            </div>
                        </div>

                        <div class="info-item mb-4">
                            <a href="#about" class="icon-box">
                                <i class="bi bi-telephone"></i>
                            </a>
                            <div class="content">
                                <h4>Nomor Telepon</h4>
                                <?= !empty($itemAbout->phone) ? $itemAbout->phone : '+62 123 4567 890' ?>
                            </div>
                        </div>

                        <div class="info-item mb-4">
                            <a href="#about" class="icon-box">
                                <i class="bi bi-envelope"></i>
                            </a>
                            <div class="content">
                                <h4>Alamat Email</h4>
                                <?= !empty($itemAbout->email) ? $itemAbout->email : 'contoh@email.com' ?>
                            </div>
                        </div>

                        <div class="mt-auto">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d499.1376816688437!2d108.68333533455628!3d-7.380638929308388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sid!4v1754881196027!5m2!1sen!2sid"
                                frameborder="0" style="border:0; width: 100%; height: 270px;"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Form -->
            <div class="col-lg-7">
                <div class="card shadow-sm border rounded h-100">
                    <div class="card-body d-flex flex-column">
                        <h3>Masukan & Saran</h3>
                        <p>Berikan masukan dan saran anda melalui form berikut untuk membantu saya terus berkembang.</p>

                        <form action="actions/contacts/create_contact.php" method="post" class="mt-3 flex-grow-1 d-flex flex-column">
                            <div class="row gy-3 flex-grow-1">

                                <div class="col-12">
                                    <input type="text" name="name" class="form-control" placeholder="Nama" required>
                                </div>

                                <div class="col-12">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>

                                <div class="col-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subjek" required>
                                </div>

                                <div class="col-12">
                                    <input type="text" class="form-control" name="phone" placeholder="Nomor Telepon" required>
                                </div>

                                <div class="col-12 flex-grow-1">
                                    <textarea class="form-control h-100" name="massage" placeholder="Pesan" required></textarea>
                                </div>

                                <div class="col-12 text-center mt-3">
                                    <button type="submit" class="btn btn-outline-dark rounded-pill px-4 py-2" name="tombol">
                                        Kirim pesan
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="mt-5">
                            <div class="border-0 p-4 text-center">
                                <i class="bi bi-chat-square-quote fs-1 text-primary mb-3"></i>
                                <p class="fs-5 fst-italic">
                                    "Kritik dan saran yang membangun adalah bahan untuk terus berkembang.
                                    Setiap masukan dari Anda sangat berarti bagi saya."
                                </p>
                                <h6 class="fw-bold mt-3">— Terima kasih atas dukungan Anda</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- /Contact Section -->