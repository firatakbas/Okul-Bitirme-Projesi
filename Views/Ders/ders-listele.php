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
                <h1 class="fw-bold">Dersleri Listele</h1>
                <a href="?url=ders-ekle" class="p-2 bg-black text-white text-decoration-none rounded">
                    <i class="fa-solid fa-plus"></i>
                    Yeni Ders Ekle
                </a>
            </div>
            <div class="bg-white p-3 rounded shadow">
                <table class="table table-striped table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Ders ID</th>
                            <th scope="col">Ders Adı</th>
                            <th scope="col">Dersi Veren Hoca</th>
                            <th scope="col">Dersin Bölümü</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $DersleriGetir = $baglan->prepare("SELECT 
                        ders.ders_id,
                        ders.ders_adi,
                        bolum.bolum_adi,
                        ogretmen.ogretmen_ad,
                        ogretmen.ogretmen_soyad
                        FROM 
                            ders
                        INNER JOIN 
                            ogretmen ON ders.ogretmen_id = ogretmen.ogretmen_id
                        INNER JOIN 
                            bolum ON ders.bolum_id = bolum.bolum_id");
                        $DersleriGetir->execute();
                        ?>

                        <?php foreach ($DersleriGetir as $ders) { ?>
                            <tr>
                                <th valign="middle"><?= $ders["ders_id"] ?></th>
                                <td valign="middle"><?= $ders["ders_adi"] ?></td>
                                <td valign="middle"><?= $ders["ogretmen_ad"] . " " . $ders["ogretmen_soyad"] ?></td>
                                <td valign="middle"><?= $ders["bolum_adi"] ?></td>
                                <td class="d-flex gap-2">
                                    <a href="?url=ders-guncelle&ders_id=<?= $ders["ders_id"] ?>" class="bg-success text-white rounded px-3 py-2 text-decoration-none">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Güncelle
                                    </a>
                                    <a href="?url=ders-sil&ders_id=<?= $ders["ders_id"] ?>" class="bg-danger text-white rounded px-3 py-2 text-decoration-none DersSil">
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
    $('.DersSil').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href')

        Swal.fire({
            title: "Dersi Siliyorsunuz!",
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
            title: 'Ders Adı Güncellendi',
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
            title: 'Ders Silindi',
            width: '300px',
            showConfirmButton: false,
            timer: 1500,
        });
    </script>
<?php } ?>


<?php //include_once $url . "Shared/footer.php";
?>