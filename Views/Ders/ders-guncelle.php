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
                <h1 class="fw-bold">Ders Düzenle</h1>
                <a href="?url=ders-listele" class="p-2 bg-black text-white text-decoration-none rounded btn">
                    <i class="fa-solid fa-left-long"></i>
                    Geri Dön
                </a>
            </div>
            <div class="bg-white p-3 rounded shadow">
                <?php
                $ders_id = $_GET["ders_id"];

                $sorgu = $baglan->prepare("SELECT * FROM ders WHERE ders_id = ?");
                $sorgu->execute(array($ders_id));
                $ders = $sorgu->fetch(PDO::FETCH_ASSOC);
                ?>
                <form action="<?= $url ?>Models/ders-guncelle.php" method="POST">
                    <input type="text" class="form-control" id="ders_id" hidden value="<?= $ders["ders_id"] ?>" name="ders_id" readonly placeholder="Bu alan otomatik doldurulacak">
                    <div class="mb-3">
                        <label for="ders_adi" class="form-label">Ders Adı</label>
                        <input type="text" class="form-control" id="ders_adi" value="<?= $ders["ders_adi"] ?>" name="ders_adi">
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