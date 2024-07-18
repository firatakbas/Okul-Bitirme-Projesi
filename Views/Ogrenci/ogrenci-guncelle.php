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
                <h1 class="fw-bold">Öğrenci Düzenle</h1>
                <a href="?url=ogrenci-listele" class="p-2 bg-black text-white text-decoration-none rounded">
                    <i class="fa-solid fa-left-long"></i>
                    Geri Dön
                </a>
            </div>
            <div class="bg-white p-3 rounded shadow">
                <?php
                $ogrenci_id = $_GET["ogrenci_id"];

                $sorgu = $baglan->prepare("SELECT * FROM ogrenci WHERE ogrenci_id = ?");
                $sorgu->execute(array($ogrenci_id));
                $ogrenci = $sorgu->fetch(PDO::FETCH_ASSOC);
                ?>
                <form action="<?= $url ?>Models/ogrenci-guncelle.php" method="POST">
                    <input type="text" class="form-control" id="ogrenci_id" name="ogrenci_id" value="<?= $ogrenci["ogrenci_id"] ?>" readonly placeholder="Bu alana dokunmayın" hidden>
                    <div class="mb-3">
                        <label for="ogrenci_ad" class="form-label">Öğrenci Adı</label>
                        <input type="text" class="form-control" id="ogrenci_ad" name="ogrenci_ad" value="<?= $ogrenci["ogrenci_ad"] ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="ogrenci_soyad" class="form-label">Öğrenci Soyadı</label>
                        <input type="text" class="form-control" id="ogrenci_soyad" name="ogrenci_soyad" value="<?= $ogrenci["ogrenci_soyad"] ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="ogrenci_no" class="form-label">Öğrenci No</label>
                        <input type="text" class="form-control" id="ogrenci_no" name="ogrenci_no" value="<?= $ogrenci["ogrenci_no"] ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="ogrenci_sinif" class="form-label">Öğrenci Sınıfı</label>
                        <select class="form-select form-select-lg mb-3" id="ogrenci_sinif" name="ogrenci_sinif">
                            <option selected>Seçiniz</option>
                            <option value="1.Sınıf" <?php if ($ogrenci["ogrenci_sinif"] == "1.Sınıf") echo "selected"; ?>>1.Sınıf</option>
                            <option value="2.Sınıf" <?php if ($ogrenci["ogrenci_sinif"] == "2.Sınıf") echo "selected"; ?>>2.Sınıf</option>
                            <option value="3.Sınıf" <?php if ($ogrenci["ogrenci_sinif"] == "3.Sınıf") echo "selected"; ?>>3.Sınıf</option>
                            <option value="4.Sınıf" <?php if ($ogrenci["ogrenci_sinif"] == "4.Sınıf") echo "selected"; ?>>4.Sınıf</option>
                        </select>
                    </div>
                    <div class="mb-3">

                        <label for="ogrenci_cinsiyet" class="form-label">Öğrenci Cinsiyeti</label>

                        <br>
                        <input class="form-check-input" type="radio" name="ogrenci_cinsiyet" value="Erkek" disabled id="erkek" <?php if ($ogrenci["ogrenci_cinsiyet"] == "Erkek") echo "checked"; ?>>
                        <label class="form-check-label" for="erkek">Erkek</label>

                        <input class="form-check-input" type="radio" name="ogrenci_cinsiyet" value="Kadın" disabled id="kadın" <?php if ($ogrenci["ogrenci_cinsiyet"] == "Kadın") echo "checked"; ?>>
                        <label class="form-check-label" for="kadın">Kadın</label>

                    </div>
                    <div class="mb-3">
                        <label for="baslangic_yili" class="form-label">Okula Başlangıç Yılı</label>
                        <input type="date" class="form-control" id="baslangic_yili" name="baslangic_yili" disabled value="<?= $ogrenci["baslangic_yili"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="bolum_id" class="form-label">Okuduğu Bölüm</label>
                        <?php
                        $BolumleriGetir = $baglan->prepare("SELECT bolum_id, bolum_adi FROM bolum");
                        $BolumleriGetir->execute();
                        ?>
                        <select class="form-select form-select-lg mb-3" id="bolum_id" name="bolum_id">
                            <?php foreach ($BolumleriGetir as $bolum) { ?>
                                <option value="<?= $bolum['bolum_id'] ?>" <?php if ($bolum["bolum_id"] == $ogrenci["bolum_id"]) echo "selected"; ?>><?= $bolum["bolum_adi"] ?></option>";
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Güncelle
                    </button>
                </form>
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

<?php //include_once $url . "Shared/footer.php"; 
?>