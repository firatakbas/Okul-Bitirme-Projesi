<main class="col">
    <div class="navbar bg-dark">
        <div class="d-flex text-black justify-content-between w-100">

            <span class="text-white">
                <!-- $ogretmen_session = $_SESSION["ogretmen_oturum"];
                $OgretmenBilgileriniGetir = $baglan->prepare("SELECT * FROM ogretmen WHERE ogretmen_no = ?");
                $OgretmenBilgileriniGetir->execute($ogretmen_session);
                $ogretmen_bilgisi = $OgretmenBilgileriniGetir->fetch(PDO::FETCH_ASSOC); -->
                <?= @$ogretmen_bilgi["ogretmen_numarasi"] ?> <?= @$ogrenci_bilgi["ogrenci_no"] ?>
                -
                <?= @$ogretmen_bilgi["ogretmen_ad"] . " " . @$ogretmen_bilgi["ogretmen_soyad"] ?>
                <?= @$ogrenci_bilgi["ogrenci_ad"] . " " . @$ogrenci_bilgi["ogrenci_soyad"] ?>
            </span>

            <div class="d-flex gap-4">
                <!-- <a href="#" class="text-white text-decoration-none">
                    <i class="bi bi-person-gear"></i>
                    Profilim
                </a> -->

                <a class="text-white text-decoration-none d-flex align-items-center gap-3 exit rounded " href="../Views/cikis.php">
                    Çıkış Yap
                    <i class="fa-solid fa-right-from-bracket"></i>
                </a>
            </div>

        </div>

    </div>