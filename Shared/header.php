<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OBS - <?= $title ?></title>

    <!-- Bootstrap CSS -->
    <link href="<?= $url ?>dist/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Sweet Alert 2 CSS-JS -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.11.0/sweetalert2.css" rel="stylesheet"> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?= $url ?>dist/sweetalert2.css">

    <!-- jquery JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script=> -->
    <script src="<?= $url ?>dist/jquery.min.js"></script>

    <!-- Datatables CSS-JS -->
    <link rel="stylesheet" href="<?= $url ?>dist/datatables.min.css">
    <script src="<?= $url ?>dist/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <!-- Style CSS -->
    <link rel="stylesheet" href="<?= $url ?>dist/style.css">
</head>