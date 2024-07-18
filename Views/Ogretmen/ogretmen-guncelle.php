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
                <h1 class="fw-bold">Öğretmen Düzenle</h1>
                <a href="?url=ogretmen-listele" class="p-2 bg-black text-white text-decoration-none rounded">
                    <i class="fa-solid fa-left-long"></i>
                    Geri Dön
                </a>
            </div>
            <div class="bg-white p-3 rounded shadow">
                <?php
                $ogretmen_id = $_GET["ogretmen_id"];

                $sorgu = $baglan->prepare("SELECT * FROM ogretmen WHERE ogretmen_id = ?");
                $sorgu->execute(array($ogretmen_id));
                $ogretmen = $sorgu->fetch(PDO::FETCH_ASSOC);
                ?>
                <form action="<?= $url ?>Models/ogretmen-guncelle.php" method="POST">
                    <input type="text" class="form-control" id="ogretmen_id" name="ogretmen_id" value="<?= $ogretmen["ogretmen_id"] ?>" readonly placeholder="Bu alana dokunmayın" hidden>
                    <div class="mb-3">
                        <label for="ogretmen_ad" class="form-label">Adı</label>
                        <input type="text" class="form-control" id="ogretmen_ad" name="ogretmen_ad" value="<?= $ogretmen["ogretmen_ad"] ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="ogretmen_soyad" class="form-label">Soyadı</label>
                        <input type="text" class="form-control" id="ogretmen_soyad" name="ogretmen_soyad" value="<?= $ogretmen["ogretmen_soyad"] ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="ogretmen_numarasi" class="form-label">Numarası</label>
                        <input type="text" class="form-control" id="ogretmen_numarasi" name="ogretmen_numarasi" value="<?= $ogretmen["ogretmen_numarasi"] ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="bolum_id" class="form-label">Ders Verdiği Bölüm Adı</label>
                        <?php
                        $BolumleriGetir = $baglan->prepare("SELECT bolum_id, bolum_adi FROM bolum");
                        $BolumleriGetir->execute();
                        ?>
                        <select class="form-select form-select-lg mb-3" id="bolum_id" name="bolum_id" disabled>
                            <?php foreach ($BolumleriGetir as $bolum) { ?>
                                <option value="<?= $bolum['bolum_id'] ?>" <?php if ($bolum["bolum_id"] ==  $ogretmen["bolum_id"]) echo "selected"; ?>><?= $bolum["bolum_adi"] ?></option>";
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