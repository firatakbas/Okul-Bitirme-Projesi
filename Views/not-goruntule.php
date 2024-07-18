<?php //include $url . "Shared/header.php"; 
?>

<div class="d-flex">
    <?php //include $url . "Shared/sidebar.php"; 
    ?>
    <main class="col">
        <?php //include_once $url . "Shared/navbar.php"; 
        ?>

        <div class="content">
            <div class="bg-white p-3 mb-3 rounded d-flex justify-content-between align-items-center shadow rounded mb-5">
                <h1 class="fw-bold">Notlarımı Görüntüle</h1>
                <!-- <a href="?url=ogrenci-listele" class="p-2 bg-black text-white text-decoration-none rounded btn">
                    <i class="bi bi-list-ol"></i>
                    Öğrencileri Listele
                </a> -->
            </div>
            <div class="bg-white p-3 rounded w-100 shadow">
                <table class="table table-striped table-hover" id="myTable">
                    <thead>
                        <tr>
                            <!-- <th scope="col">Öğrenci ID</th> -->
                            <th scope="col">Ders Adı</th>
                            <!-- <th scope="col">Dersin Bölümü</th> -->
                            <th scope="col">Vize</th>
                            <th scope="col">Final</th>
                            <th scope="col">Ortalama-Durum</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $NotlarimiGetir = $baglan->prepare("SELECT
                                                    ogrenci.ogrenci_ad,
                                                    ogrenci.ogrenci_soyad,
                                                    ders.ders_adi,
                                                    ogrenci_notlar.vize,
                                                    ogrenci_notlar.final
                                                    FROM ogrenci_notlar 
                                                    INNER JOIN ders ON ders.ders_id = ogrenci_notlar.ders_id
                                                    INNER JOIN ogrenci ON ogrenci.ogrenci_id = ogrenci_notlar.ogrenci_id
                                                    WHERE ogrenci.ogrenci_id = ?");
                        $notlar = $NotlarimiGetir->execute(array($ogrenci_bilgi["ogrenci_id"]));
                        ?>

                        <?php while ($not = $NotlarimiGetir->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <th valign="middle"><?= $not["ders_adi"] ?></th>
                                <th valign="middle"><?= $not["vize"] ?></th>
                                <th valign="middle"><?= $not["final"] ?></th>
                                <th>
                                    <?php $ortalama = ($not["vize"] * 0.4) + ($not["final"] * 0.6); ?>
                                    <?php
                                    if ($ortalama >= 60 and $not["final"] >= 50) {
                                    ?>
                                        <div class="p-2 bg-success text-white rounded text-center">
                                            <span class="fw-bold">Ortalama:</span>
                                            <?= $ortalama ?>
                                            -
                                            <span class="fw-bold">GEÇTİ</span>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="p-2 bg-danger text-white rounded text-center">
                                            <span class="fw-bold">Ortalama:</span>
                                            <?= $ortalama ?>
                                            -
                                            <span class="fw-bold">KALDI</span>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </th>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>


<?php if (isset($_GET["islem"]) && $_GET["islem"] === "bos") { ?>
    <script>
        Swal.fire({
            // position: "top-end",
            icon: "warning",
            title: 'Boş Alan Bırakmayınız',
            width: '300px',
            showConfirmButton: false,
            timer: 1500,
        });
    </script>
<?php } ?>

<?php if (isset($_GET["islem"]) && $_GET["islem"] === "basarili") { ?>
    <script>
        Swal.fire({
            // position: "top-end",
            icon: "success",
            title: 'Öğrenci Notu Eklenmiştir',
            width: '300px',
            showConfirmButton: false,
            timer: 1500,
        });
    </script>
<?php } ?>

<?php if (isset($_GET["islem"]) && $_GET["islem"] === "noteklenmis") { ?>
    <script>
        Swal.fire({
            // position: "top-end",
            icon: "warning",
            title: 'Bu Not Sisteme Eklenmiş, Tekrar Eklenemez',
            width: '300px',
            showConfirmButton: false,
            timer: 1500,
        });
    </script>
<?php } ?>

<?php //include_once $url . "Shared/footer.php"; 
?>