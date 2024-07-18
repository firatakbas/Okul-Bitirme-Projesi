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
                <h1 class="fw-bold">Not Ekle </h1>
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
                            <th scope="col">Öğrenci Adı Soyadı</th>
                            <!-- <th scope="col">Dersin Bölümü</th> -->
                            <th scope="col">Dersin Adı</th>
                            <th scope="col">Vize</th>
                            <th scope="col">Final</th>
                            <th scope="col">Ortalama-Durum</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $OgretmeninVerdigiDersleriGetir = $baglan->prepare("SELECT
                                                ders.ders_adi, ders.ders_id, ogrenci.ogrenci_ad, ogrenci.ogrenci_soyad, ogrenci.ogrenci_id
                                                FROM ders
                                                INNER JOIN ogretmen
                                                ON ders.ogretmen_id = ogretmen.ogretmen_id
                                                INNER JOIN ogrenci
                                                ON ogrenci.bolum_id = ogretmen.bolum_id
                                                WHERE ogretmen.ogretmen_id = ?");
                        $OgretmeninVerdigiDersleriGetir->execute(array($ogretmen_bilgi["ogretmen_id"]));
                        // $bolum_adi = $o->fetch(PDO::FETCH_ASSOC)["bolum_adi"];
                        // while ($row = $o->fetch(PDO::FETCH_ASSOC)) {
                        //     //echo "Bölüm Adı: " . $row["bolum_adi"] . "<br>";
                        //     echo "<b>Ders Adı:</b> " . $row["ders_adi"] . "<br>";
                        //     echo "<b>Öğrenci Ad Soyad:</b> " . $row["ogrenci_ad"] . " " . $row["ogrenci_soyad"] . "<br><br>";
                        // }
                        ?>

                        <?php while ($row = $OgretmeninVerdigiDersleriGetir->fetch(PDO::FETCH_ASSOC)) { ?>
                            <?php
                            $NotlariGetir = $baglan->prepare("SELECT
                                                                ders.ders_adi,
                                                                ogrenci_notlar.vize,
                                                                ogrenci_notlar.final
                                                                FROM ogrenci_notlar
                                                                INNER JOIN ders
                                                                ON ogrenci_notlar.ders_id = ders.ders_id
                                                                WHERE ders.ders_id = ? AND ogrenci_notlar.ogrenci_id = ?");
                            $NotlariGetir->execute(array($row["ders_id"], $row["ogrenci_id"]));
                            $not = $NotlariGetir->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <tr>
                                <?php $disabled = !isset($not["vize"]) && !isset($not["final"]); ?>
                                <th valign="middle"><?= $row["ogrenci_ad"] . " " . $row["ogrenci_soyad"] ?></th>
                                <th valign="middle"><?= $row["ders_adi"] ?></th>
                                <form action="<?= $url ?>Models/not-ekle.php" method="POST">
                                    <th valign="middle">
                                        <input type="text" class="form-control" name="ogrenci_id" value="<?= $row["ogrenci_id"] ?>" hidden>
                                        <input type="text" class="form-control" name="ders_id" value="<?= $row["ders_id"] ?>" hidden>
                                        <input type="number" class="form-control w-100" name="vize" placeholder="Vize Notu" min="0" max="100" required value="<?= isset($not["vize"]) ? $not["vize"] : ""; ?>">
                                    </th>
                                    <th valign="middle">
                                        <input type="number" class="form-control w-100" name="final" placeholder="Final Notu" min="0" max="100" required value="<?= isset($not["final"]) ? $not["final"] : ""; ?>">
                                    </th>
                                    <th valign="middle">
                                        <?php @$ortalama = ($not["vize"] * 0.4) + ($not["final"] * 0.6); ?>
                                        <?php
                                        if (@$ortalama >= 60 and $not["final"] >= 50) {
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
                                    <th class="d-flex gap-3">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa-solid fa-sliders"></i>
                                            Notu Ekle
                                        </button>
                                        <a href="?url=notu-goruntule&ogrenci_id=<?= $row["ogrenci_id"] ?>&ders_id=<?= $row["ders_id"] ?>" class="w-50 btn btn-dark<?= $disabled ? ' disabled' : '' ?>">
                                            Notu Görüntüle
                                        </a>
                                    </th>
                                </form>
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

<?php if (isset($_GET["islem"]) && $_GET["islem"] === "guncellendi") { ?>
    <script>
        Swal.fire({
            // position: "top-end",
            icon: "success",
            title: 'Öğrenci Notu Güncellendi',
            width: '300px',
            showConfirmButton: false,
            timer: 1500,
        });
    </script>
<?php } ?>

<?php //include_once $url . "Shared/footer.php"; 
?>