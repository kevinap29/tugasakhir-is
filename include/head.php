<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Select 2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <!-- Style CSS -->
    <link rel="stylesheet" href="asset/css/app.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="asset/img/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="asset/img/favicon/favicon.ico" type="image/x-icon">

    <?php
    if ($_GET['page'] == 'home') {
        echo '<title>Beranda - Kelompok 4</title>';
    }elseif ($_GET['page'] == 'setting') {
        echo '<title>Setting - Kelompok 4</title>';
    }elseif ($_GET['page'] == 'anggota') {
        echo '<title>Anggota - Kelompok 4</title>';
    }elseif ($_GET['page'] == 'listBrand') {
        echo '<title>List Brand HP - Kelompok 4</title>';
    }
    ?>
</head>