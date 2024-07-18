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
                <h1 class="fw-bold">Öğretmenleri Listele</h1>
                <a href="?url=ogretmen-ekle" class="p-2 bg-black text-white text-decoration-none rounded">
                    <i class="fa-solid fa-plus"></i>
                    Yeni Öğretmen Ekle
                </a>
            </div>
            <hr>
            <div class="bg-white p-3 rounded w-100 shadow">
                <table class="table table-striped table-hover" id="myTable">
                    <thead>
                        <tr>
                            <!-- <th scope="col">Öğretmen ID</th> -->
                            <th scope="col">Adı Soyadı</th>
                            <th scope="col">Ders Verdiği Bölüm Adı</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $OgretmenleriGetir = $baglan->prepare("SELECT ogretmen.ogretmen_id, ogretmen.ogretmen_ad, ogretmen.ogretmen_soyad, ogretmen.bolum_id, bolum.bolum_id, bolum.bolum_adi FROM ogretmen INNER JOIN bolum ON ogretmen.bolum_id = bolum.bolum_id");
                        $OgretmenleriGetir->execute();
                        ?>

                        <?php foreach ($OgretmenleriGetir as $ogretmen) { ?>
                            <tr>
                                <!-- <td class="py-4"><?= $ogretmen["ogretmen_id"] ?></td> -->
                                <th valign="middle"><?= $ogretmen["ogretmen_ad"] . " " . $ogretmen["ogretmen_soyad"] ?></th>
                                <td valign="middle"><?= $ogretmen["bolum_adi"] ?></td>
                                <td class="d-flex gap-3">
                                    <a href="?url=ogretmen-guncelle&ogretmen_id=<?= $ogretmen["ogretmen_id"] ?>" class="bg-success text-white rounded px-3 py-2 text-decoration-none">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Güncelle
                                    </a>
                                    <a href="?url=ogretmen-sil&ogretmen_id=<?= $ogretmen["ogretmen_id"] ?>" class="bg-danger text-white rounded px-3 py-2 text-decoration-none OgretmenSil">
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
    $('.OgretmenSil').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href')

        Swal.fire({
            title: "Öğretmeni Siliyorsunuz!, Emin Misiniz?",
            text: "Bu İşlem Geri Alınamaz Silmek İstediğinize Emin Misiniz!",
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
            title: 'Öğretmen Bilgileri Güncellendi',
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
            title: 'Öğretmen Silindi',
            width: '300px',
            showConfirmButton: false,
            timer: 1500,
        });
    </script>
<?php } ?>


<?php //include_once $url . "Shared/footer.php";
?>