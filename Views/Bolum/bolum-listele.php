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
                <h1 class="fw-bold">Bölümleri Listele</h1>
                <a href="?url=bolum-ekle" class="p-2 bg-black text-white text-decoration-none rounded">
                    <i class="fa-solid fa-plus"></i>
                    Yeni Bölüm Ekle
                </a>
            </div>
            <div class="bg-white p-3 rounded w-100 shadow">
                <table class="table table-striped table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Bölüm ID</th>
                            <th scope="col">Bölüm Adı</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $BolumleriGetir = $baglan->prepare("SELECT bolum_id, bolum_adi FROM bolum");
                        $BolumleriGetir->execute();
                        ?>

                        <?php foreach ($BolumleriGetir as $bolum) { ?>
                            <tr>
                                <?php $bolum_id = $bolum["bolum_id"]; ?>
                                <th valign="middle"><?= $bolum["bolum_id"] ?></th>
                                <td valign="middle"><?= $bolum["bolum_adi"] ?></td>
                                <td class="d-flex gap-2">
                                    <a href="?url=bolum-guncelle&bolum_id=<?= $bolum["bolum_id"] ?>" class="bg-success text-white rounded px-3 py-2 text-decoration-none">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Güncelle
                                    </a>
                                    <a href="?url=bolum-sil&bolum_id=<?= $bolum["bolum_id"] ?>" class="bg-danger text-white rounded px-3 py-2 text-decoration-none BolumSil">
                                        <i class="fa-solid fa-trash"></i>
                                        Sil
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

<script>
    $('.BolumSil').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href')

        Swal.fire({
            title: "Bölümünü Siliyorsunuz!, Emin Misiniz?",
            text: "Bu işlemle beraber bu bölüme ait derslerde silinecek, Emin Misiniz!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Evet, Eminim Sil."
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        });
    })
</script>


<?php if (isset($_GET["islem"]) && $_GET["islem"] === "basarili") { ?>
    <script>
        Swal.fire({
            // position: "top-end",
            icon: "success",
            title: 'Bölüm Adı Güncellendi',
            width: '300px',
            showConfirmButton: false,
            timer: 1500,
        });
    </script>
<?php } ?>


<?php if (isset($_GET["islem"]) && $_GET["islem"] === "silmebasarili") { ?>
    <script>
        Swal.fire({
            // position: "top-end",
            icon: "success",
            title: 'Bölüm Silindi',
            width: '300px',
            showConfirmButton: false,
            timer: 1500,
        });
    </script>
<?php } ?>


<?php //include_once $url . "Shared/footer.php";
?>