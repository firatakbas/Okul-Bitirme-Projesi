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
                <h1 class="fw-bold">Ders Ekle</h1>
                <a href="?url=ders-listele" class="p-2 bg-black text-white text-decoration-none rounded btn">
                    <i class="fa-solid fa-list-ol"></i>
                    Dersleri Listele
                </a>
            </div>
            <div class="bg-white p-3 rounded shadow">
                <form action="<?= $url ?>Models/ders-ekle.php" method="POST">
                    <!-- <div class="mb-3">
                        <label for="ders_id" class="form-label">Ders ID</label>
                        <input type="text" class="form-control" id="ders_id" readonly placeholder="Bu alan otomatik doldurulacak">
                        <div class="form-text">Bu alan otomatik doldurulacak</div>
                    </div> -->
                    <div class="mb-3">
                        <label for="ders_adi" class="form-label">Ders Adı</label>
                        <input type="text" class="form-control" id="ders_adi" name="ders_adi">
                    </div>
                    <div class="mb-3">
                        <label for="bolum_id" class="form-label">Dersin Bölümü</label>
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
                    <div class="mb-3">
                        <label for="ogretmen_id" class="form-label">Öğretmen Seç</label>
                        <select class="form-select" id="ogretmen_id" name="ogretmen_id">
                            <?php
                            $HocalariGetir = $baglan->prepare("SELECT ogretmen.ogretmen_id, ogretmen.ogretmen_ad, ogretmen.ogretmen_soyad, ogretmen.bolum_id, bolum.bolum_id, bolum.bolum_adi FROM ogretmen INNER JOIN bolum ON ogretmen.bolum_id = bolum.bolum_id");
                            $HocalariGetir->execute();
                            foreach ($HocalariGetir as $hoca) {
                                echo "<option value='" . $hoca['ogretmen_id'] . "'>" . $hoca['ogretmen_ad'] . " " . $hoca['ogretmen_soyad']  . " - " . $hoca['bolum_adi'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-plus-circle"></i>
                        Dersi Ekle
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
            title: 'Ders Sisteme Yüklendi',
            width: '300px',
            showConfirmButton: false,
            timer: 1500,
        });
    </script>
<?php } ?>

<?php //include_once $url . "Shared/footer.php"; 
?>