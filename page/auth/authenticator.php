<?php
    include('../../config/session.php');
    include('../../asset/vendor/GoogleAuthenticator\PHPGangsta\GoogleAuthenticator.php');

    $pga = new PHPGangsta_GoogleAuthenticator();
    $secret = $_SESSION['secret'];
    $qr_code = $pga->getQRCodeGoogleUrl("Kelompok 4 Integrasi Sistem", $secret);
    $error_message = '';

    if (isset($_POST['btnValidate'])) {
        $code = $_POST['code'];

        if ($code == '') {
            $error_message = 'Scan QR code untuk konfigurasi aplikasi ini';
        }else{
            if ($pga->verifyCode($secret, $code, 2)) {
                header("location: ../../index.php?page=home");
            }else{
                $error_message = 'Authentikasi tidak tersedia';
                header("location: index.php?page=auth");
            }
        }
    }
?>

<!-- konten auth -->
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-xl-7 mx-auto">
            <h3 class="display-4">Authentikasi</h3>
            <p class="text-muted mb-4">Siapkan hp untuk proses 2-step verification</p>
            <div class="form-group text-center">
                <img src="<?php echo $qr_code; ?>" alt="">
            </div>
            <form action="authenticator.php" method="post">
                <?php
                    if ($error_message != '') {
                        echo    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Error </strong>'.$error_message.' 
                                </div>
                                
                                <script>
                                $(".alert").alert();
                                </script>';
                    }
                ?>
                <div class="form-group">
                    <label for="code-id">Masukan Auth code</label>
                    <input id="code-id" class="form-control" type="text" placeholder="6 Digit kode" name="code">
                </div>
                <div class="form-group">
                    <input type="submit" name="btnValidate" class="btn btn-primary" value="Validasi">
                </div>
            </form>
        </div>
    </div>
</div><!-- End -->