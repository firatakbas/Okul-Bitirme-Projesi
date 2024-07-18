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
                <h1 class="fw-bold">Not Düzenle</h1>
                <a href="?url=ogrenci-listele" class="p-2 bg-black text-white text-decoration-none rounded ">
                    <i class="bi bi-arrow-left-circle"></i>
                    Geri Dön
                </a>
            </div>
            <div class="bg-white p-3 rounded shadow">
                <?php
                $ogrenci_id = $_GET["ogrenci_id"];
                $ders_id = $_GET["ders_id"];
                $NotGetir = $baglan->prepare("SELECT ogrenci.ogrenci_id, ogrenci.ogrenci_ad, ogrenci.ogrenci_soyad, ogrenci_notlar.vize, ogrenci_notlar.final, ders.ders_id, ders.ders_adi
                                                FROM ogrenci_notlar
                                                INNER JOIN ogrenci
                                                ON ogrenci_notlar.ogrenci_id = ogrenci.ogrenci_id
                                                INNER JOIN ders
                                                ON ogrenci_notlar.ders_id = ders.ders_id
                                                WHERE ogrenci.ogrenci_id = ? AND ders.ders_id = ?
                                            ");
                $NotGetir->execute(array($ogrenci_id, $ders_id));
                $not = $NotGetir->fetch(PDO::FETCH_ASSOC);
                ?>
                <form action="<?= $url ?>Models/not-guncelle.php" method="POST">
                    <input type="text" class="form-control" id="ogrenci_id" name="ogrenci_id" value="<?= $not["ogrenci_id"] ?>" hidden>
                    <input type="text" class="form-control" id="ders_id" name="ders_id" value="<?= $not["ders_id"] ?>" hidden>
                    <div class="mb-3">
                        <label for="ogrenci_ad" class="form-label">Öğrenci Adı</label>
                        <input type="text" class="form-control" id="ogrenci_ad" name="ogrenci_ad" value="<?= $not["ogrenci_ad"] ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="ogrenci_soyad" class="form-label">Öğrenci Soyadı</label>
                        <input type="text" class="form-control" id="ogrenci_soyad" name="ogrenci_soyad" value="<?= $not["ogrenci_soyad"] ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="ogrenci_soyad" class="form-label">Ders Adı</label>
                        <input type="text" class="form-control" id="ders_adi" name="ders_adi" value="<?= $not["ders_adi"] ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="ogrenci_soyad" class="form-label">Vize</label>
                        <input type="text" class="form-control" id="vize" name="vize" value="<?= $not["vize"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="ogrenci_soyad" class="form-label">Final</label>
                        <input type="text" class="form-control" id="final" name="final" value="<?= $not["final"] ?>">
                    </div>
                    <button type="submit" class="btn btn-success">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Notu Güncelle
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