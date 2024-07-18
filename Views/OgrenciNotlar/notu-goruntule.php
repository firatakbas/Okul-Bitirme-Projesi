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
                <h1 class="fw-bold">Notu Görüntüle</h1>
                <a href="?url=not-ekle" class="p-2 bg-black text-white text-decoration-none rounded">
                    <i class="bi bi-plus"></i>
                    Not Girişi
                </a>
            </div>
            <hr>
            <div class="bg-white p-3 rounded w-100 shadow">
                <table class="table table-striped table-hover" id="">
                    <thead>
                        <tr>
                            <!-- <th scope="col">Öğrenci ID</th> -->
                            <th scope="col">Adı Soyadı</th>
                            <th scope="col">Dersin Adı</th>
                            <th scope="col">Vize</th>
                            <th scope="col">Final</th>
                            <th scope="col">Ortalama-Durum</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
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
                        <tr>
                            <td valign="middle"><?= $not["ogrenci_ad"] ?> <?= $not["ogrenci_soyad"] ?></td>
                            <td valign="middle"><?= $not["ders_adi"] ?></td>
                            <td valign="middle"><?= $not["vize"] ?></td>
                            <td valign="middle"><?= $not["final"] ?></td>
                            <td valign="middle">
                                <?php @$ortalama = ($not["vize"] * 0.4) + ($not["final"] * 0.6); ?>
                                <?php
                                if (@$ortalama >= 60 and $not["final"] >= 50) {
                                ?>
                                    <div class="p-2 bg-success text-white rounded text-center">
                                        <span class="fw-bold">Ortalama:</span>
                                        <?= $ortalama ?>
                                        -
                                        <span class="fw-bold">GEÇTİ</span>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="p-2 bg-danger text-white rounded text-center">
                                        <span class="fw-bold">Ortalama:</span>
                                        <?= $ortalama ?>
                                        -
                                        <span class="fw-bold">KALDI</span>
                                    </div>
                                <?php
                                }
                                ?>
                            </td>
                            <td valign="middle">
                                <a href="?url=not-guncelle&ogrenci_id=<?= $not["ogrenci_id"] ?>&ders_id=<?= $not["ders_id"] ?>" class="bg-success text-white rounded px-3 py-2 text-decoration-none">
                                    <i class="bi bi-sliders"></i>
                                    Güncelle
                                </a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

<div class="modal fade" id="OgrenciDetay" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Öğrenci Detay</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ID: <?php echo $ogrenci["ogrenci_id"];; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
            </div>
        </div>
    </div>
</div>


<script>
    $('.OgrenciSil').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href')

        Swal.fire({
            title: "Öğrenciyi Siliyorsunuz!, Emin Misiniz?",
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
            title: 'Öğrenci Bilgileri Güncellendi',
            width: '300px',
            showConfirmButton: false,
            timer: 1500,
        });
    </script>
<?php } ?>


<?php //include_once $url . "Shared/footer.php";
?>