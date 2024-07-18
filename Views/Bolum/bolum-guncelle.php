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
                <h1 class="fw-bold">Bölüm Düzenle</h1>
                <a href="?url=bolum-listele" class="p-2 bg-black text-white text-decoration-none rounded btn">
                    <i class="bi bi-arrow-left-circle"></i>
                    Geri Dön
                </a>
            </div>
            <div class="bg-white p-3 rounded shadow">
                <?php
                $bolum_id = $_GET["bolum_id"];

                $sorgu = $baglan->prepare("SELECT * FROM bolum WHERE bolum_id = ?");
                $sorgu->execute(array($bolum_id));
                $bolum = $sorgu->fetch(PDO::FETCH_ASSOC);
                ?>
                <form action="<?= $url ?>Models/bolum-guncelle.php" method="POST">
                    <input type="text" class="form-control" hidden id="bolum_id" value="<?= $bolum["bolum_id"] ?>" name="bolum_id" readonly placeholder="Bu alan otomatik doldurulacak">
                    <div class="mb-3">
                        <label for="bolum_adi" class="form-label">Bölüm Adı</label>
                        <input type="text" class="form-control" id="bolum_adi" value="<?= $bolum["bolum_adi"] ?>" name="bolum_adi">
                    </div>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-plus-circle"></i>
                        Bölüm Düzenle
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