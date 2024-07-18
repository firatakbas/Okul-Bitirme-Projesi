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
                <h1 class="fw-bold">Öğrencileri Listele</h1>
                <a href="?url=ogrenci-ekle" class="p-2 bg-black text-white text-decoration-none rounded btn">
                    <i class="fa-solid fa-plus"></i>
                    Yeni Öğrenci Ekle
                </a>
            </div>
            <hr>
            <div class="bg-white p-3 rounded w-100 shadow">
                <table class="table table-striped table-hover" id="myTable">
                    <thead>
                        <tr>
                            <!-- <th scope="col">Öğrenci ID</th> -->
                            <th scope="col">Adı Soyadı</th>
                            <th scope="col">Okuduğu Bölümü</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $OgrencileriGetir = $baglan->prepare("SELECT ogrenci.ogrenci_id, ogrenci.ogrenci_ad, ogrenci.ogrenci_soyad, ogrenci.bolum_id, bolum.bolum_id, bolum.bolum_adi FROM ogrenci INNER JOIN bolum ON ogrenci.bolum_id = bolum.bolum_id");
                        $OgrencileriGetir->execute();
                        ?>

                        <?php foreach ($OgrencileriGetir as $ogrenci) { ?>
                            <tr>
                                <!-- <td class="py-4"><?= $ogrenci["ogrenci_id"] ?></td> -->
                                <th valign="middle"><?= $ogrenci["ogrenci_ad"] . " " . $ogrenci["ogrenci_soyad"] ?></th>
                                <td valign="middle"><?= $ogrenci["bolum_adi"] ?></td>
                                <td class="d-flex gap-3">
                                    <a href="?url=ogrenci-guncelle&ogrenci_id=<?= $ogrenci["ogrenci_id"] ?>" class="bg-success text-white rounded px-3 py-2 text-decoration-none">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Güncelle
                                    </a>
                                    <a href="?url=ogrenci-sil&ogrenci_id=<?= $ogrenci["ogrenci_id"] ?>" class="bg-danger text-white rounded px-3 py-2 text-decoration-none OgrenciSil">
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
    $('.OgrenciSil').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href')

        Swal.fire({
            title: "Öğrenciyi Siliyorsunuz!, Emin Misiniz?",
            text: "Bu işlem geri alınamaz silmek istediğinize Emin Misiniz!",
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
            title: 'Öğrenci Bilgileri Güncellendi',
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
            title: 'Öğrenci Silindi',
            width: '300px',
            showConfirmButton: false,
            timer: 1500,
        });
    </script>
<?php } ?>


<?php //include_once $url . "Shared/footer.php";
?>