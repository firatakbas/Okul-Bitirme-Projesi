<?php //include $url . "Shared/header.php"; 
?>

<div class="d-flex">
    <?php //include $url . "Shared/sidebar.php"; 
    ?>
    <main class="col">
        <?php //include_once $url . "Shared/navbar.php"; 
        ?>

        <div class="content ">
            <div class="bg-white p-3 mb-3 rounded d-flex justify-content-between align-items-center shadow rounded mb-5">
                <h1 class="fw-bold">Bölüm Ekle</h1>
                <a href="?url=bolum-listele" class="p-2 bg-black text-white text-decoration-none rounded">
                    <i class="fa-solid fa-list-ol"></i>
                    Bölümleri Listele
                </a>
            </div>
            <!-- <hr> -->
            <div class="bg-white p-3 rounded w-100 shadow">
                <form action="/Models/bolum-ekle.php" method="POST">
                    <!-- <div class="mb-3">
                        <label for="bolum_id" class="form-label">Bölüm ID</label>
                        <input type="text" class="form-control" id="bolum_id" readonly placeholder="Bu alan otomatik doldurulacak">
                        <div class="form-text">Bu alan otomatik doldurulacak</div>
                    </div> -->
                    <div class="mb-3">
                        <label for="bolum_adi" class="form-label">Bölüm Adı</label>
                        <input type="text" class="form-control" id="bolum_adi" name="bolum_adi">
                    </div>
                    <button type="submit" class="btn btn-success ">
                        <i class="bi bi-plus-circle"></i>
                        Bölüm Ekle
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
            title: 'Bölüm Sisteme Yüklendi',
            width: '300px',
            showConfirmButton: false,
            timer: 1500,
        });
    </script>
<?php } ?>

<?php //include_once $url . "Shared/footer.php"; 
?>