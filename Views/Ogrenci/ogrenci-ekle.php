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
                <h1 class="fw-bold">Öğrenci Ekle</h1>
                <a href="?url=ogrenci-listele" class="p-2 bg-black text-white text-decoration-none rounded btn">
                    <i class="fa-solid fa-list-ol"></i>
                    Öğrencileri Listele
                </a>
            </div>
            <div class="bg-white p-3 rounded w-100 shadow">
                <form action="<?= $url ?>Models/ogrenci-ekle.php" method="POST">
                    <div class="mb-3">
                        <label for="ogrenci_ad" class="form-label">Öğrenci Adı</label>
                        <input type="text" class="form-control" id="ogrenci_ad" name="ogrenci_ad">
                    </div>
                    <div class="mb-3">
                        <label for="ogrenci_soyad" class="form-label">Öğrenci Soyadı</label>
                        <input type="text" class="form-control" id="ogrenci_soyad" name="ogrenci_soyad">
                    </div>
                    <div class="mb-3">
                        <label for="ogrenci_no" class="form-label">Öğrenci No</label>
                        <input type="text" class="form-control" id="ogrenci_no" name="ogrenci_no">
                    </div>
                    <div class="mb-3">
                        <label for="ogrenci_sifre" class="form-label">Öğrenci Şifresi</label>
                        <input type="text" class="form-control" id="ogrenci_sifre" name="ogrenci_sifre">
                    </div>
                    <div class="mb-3">
                        <label for="ogrenci_sinif" class="form-label">Öğrenci Sınıfı</label>
                        <select class="form-select" id="ogrenci_sinif" name="ogrenci_sinif">
                            <option selected>Seçiniz</option>
                            <option value="1.Sınıf">1.Sınıf</option>
                            <option value="2.Sınıf">2.Sınıf</option>
                            <option value="3.Sınıf">3.Sınıf</option>
                            <option value="4.Sınıf">4.Sınıf</option>
                        </select>
                    </div>
                    <div class="mb-3">

                        <label for="ogrenci_cinsiyet" class="form-label">Öğrenci Cinsiyeti</label>

                        <br>
                        <input class="form-check-input" type="radio" name="ogrenci_cinsiyet" value="Erkek" id="erkek">
                        <label class="form-check-label" for="erkek">Erkek</label>

                        <input class="form-check-input" type="radio" name="ogrenci_cinsiyet" value="Kadın" id="kadın">
                        <label class="form-check-label" for="kadın">Kadın</label>

                    </div>
                    <div class="mb-3">
                        <label for="baslangic_yili" class="form-label">Okula Başlangıç Yılı</label>
                        <input type="date" class="form-control" id="baslangic_yili" name="baslangic_yili">
                    </div>
                    <div class="mb-3">
                        <label for="bolum_id" class="form-label">Okuduğu Bölüm</label>
                        <select class="form-select" id="bolum_id" name="bolum_id">
                            <?php
                            $BolumleriGetir = $baglan->prepare("SELECT bolum_id, bolum_adi FROM bolum");
                            $BolumleriGetir->execute();
                            foreach ($BolumleriGetir as $bolum) {
                                echo "<option value='" . $bolum['bolum_id'] . "'>" . $bolum['bolum_adi'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">
                        <i class="fa-solid fa-plus"></i>
                        Öğrenciyi Ekle
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

<?php if (isset($_GET["islem"]) && $_GET["islem"] === "no_var") { ?>
    <script>
        Swal.fire({
            // position: "top-end",
            icon: "warning",
            title: 'Bu Numaraya Kayıtlı Öğrenci Var',
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
            title: 'Öğrenci Sisteme Yüklendi',
            width: '300px',
            showConfirmButton: false,
            timer: 1500,
        });
    </script>
<?php } ?>

<?php //include_once $url . "Shared/footer.php"; 
?>