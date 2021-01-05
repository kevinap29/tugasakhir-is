<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Select 2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Style CSS -->
    <link rel="stylesheet" href="../../asset/css/app.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="../../asset/img/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../asset/img/favicon/favicon.ico" type="image/x-icon">
    <?php
        if ($_GET['page']=='login') {
            echo '<title>LOGIN</title>';
        }elseif ($_GET['page']=='register'){
            echo '<title>REGISTER</title>';
        }elseif ($_GET['page']=='auth') {
            echo '<title>AUTH</title>';
        }elseif ($_GET['page']=='authLogin') {
            echo '<title>AUTH</title>';
        }
    ?>
</head>