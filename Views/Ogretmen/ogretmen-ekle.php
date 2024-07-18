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
                <h1 class="fw-bold">Öğretmen Ekle</h1>
                <a href="?url=ogretmen-listele" class="p-2 bg-black text-white text-decoration-none rounded">
                    <i class="fa-solid fa-list-ol"></i>
                    Öğretmenleri Listele
                </a>
            </div>
            <div class="bg-white p-3 rounded w-100 shadow">
                <form action="<?= $url ?>Models/ogretmen-ekle.php" method="POST">
                    <div class="mb-3">
                        <label for="ogretmen_ad" class="form-label">Öğretmen Adı</label>
                        <input type="text" class="form-control" id="ogretmen_ad" name="ogretmen_ad">
                    </div>
                    <div class="mb-3">
                        <label for="ogretmen_soyad" class="form-label">Öğretmen Soyadı</label>
                        <input type="text" class="form-control" id="ogretmen_soyad" name="ogretmen_soyad">
                    </div>
                    <div class="mb-3">
                        <label for="ogretmen_numarasi" class="form-label">Öğretmen Numarası</label>
                        <input type="text" class="form-control" id="ogretmen_numarasi" name="ogretmen_numarasi">
                    </div>
                    <div class="mb-3">
                        <label for="ogretmen_sifre" class="form-label">Öğretmen Şifre</label>
                        <input type="text" class="form-control" id="ogretmen_sifre" name="ogretmen_sifre">
                    </div>
                    <div class="mb-3">

                        <label for="ogretmen_cinsiyet" class="form-label">Öğrenci Cinsiyeti</label>

                        <br>
                        <input class="form-check-input" type="radio" name="ogretmen_cinsiyet" value="Erkek" id="erkek">
                        <label class="form-check-label" for="erkek">Erkek</label>

                        <input class="form-check-input" type="radio" name="ogretmen_cinsiyet" value="Kadın" id="kadın">
                        <label class="form-check-label" for="kadın">Kadın</label>

                    </div>
                    <div class="mb-3">
                        <label for="bolum_id" class="form-label">Öğretmenin Bölümü</label>
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
                        <i class="bi bi-plus-circle"></i>
                        Öğretmeni Ekle
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

<?php if (isset($_GET["islem"]) && $_GET["islem"] === "basarili") { ?>
    <script>
        Swal.fire({
            // position: "top-end",
            icon: "success",
            title: 'Öğretmen Sisteme Yüklendi',
            width: '300px',
            showConfirmButton: false,
            timer: 1500,
        });
    </script>
<?php } ?>


<?php //include_once $url . "Shared/footer.php"; 
?>