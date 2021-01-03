<?php
include('../../config/session.php');

if (isset($_POST['btnLogin'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $statement = $conn->prepare("SELECT google_secret_code FROM users WHERE username=? AND password = ?");
    $hasil = $statement->execute(array($username,$password));
    if($hasil>0){
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        //$_SESSION['user'] = $username;
        $_SESSION['secret'] = $data[0]['google_secret_code'];
        echo '<script>window.location="index.php?page=authLogin";</script>';
    }else{
        $login_error_message = 'Akun tidak ditemukan';
        echo '<script>window.location="index.php?page=login&msg='.$login_error_message.'";</script>';
    }
}
?>
<!-- konten login -->
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-xl-7 mx-auto">
            <h3 class="display-4">Login</h3>
            <p class="text-muted mb-4">Masukan Username dan Password yang sudah terdaftar</p>
            <form method="post" action="index.php?page=login">
                <?php
                    if (isset($_GET['msg'])) {
                        $login_error_message = $_GET['msg'];
                    }else {
                        $login_error_message = '';
                    }
                    if ($login_error_message != "") {
                        echo    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Error </strong>'.$login_error_message.' 
                                </div>
                                
                                <script>
                                $(".alert").alert();
                                </script>';
                    }
                ?>
                <div class="form-group mb-3">
                    <input id="inputUsername" name="username" type="username" placeholder="Masukan Username" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                </div>
                <div class="form-group mb-3">
                    <input id="inputPassword" name="password" type="password" placeholder="Masukan Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                </div>
                <button type="submit" name="btnLogin" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Masuk</button>
                <span class="text-muted">belum punya akun? klik <a href="index.php?page=register"> disini</a></span>
                <div class="text-center font-italic text-muted d-flex justify-content-between mt-4">
                    <p>@Kelompok 4 Integrasi Sistem 2020
                    </p>
                </div>
            </form>
        </div>
    </div>
</div><!-- End -->
