<?php
    include('../../config/session.php');
    include('../../asset/vendor/GoogleAuthenticator\PHPGangsta\GoogleAuthenticator.php');

    if (isset($_POST['btnRegis'])) {
        $pga = new PHPGangsta_GoogleAuthenticator();
        $secret = $pga->createSecret();

        $foto = $_POST['foto'];
        $name = $_POST['name'];
        $npm = $_POST['npm'];
        $jurusan = $_POST['jurusan'];
        $semester = $_POST['semester'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $statment = $conn->prepare("INSERT INTO users (foto,nama,npm,jurusan,semester,username,email,password,google_secret_code) VALUES (?,?,?,?,?,?,?,?,?)");
        $hasil = $statment->execute(array($name,$npm,$jurusan,$semester,$username,$email,$password,$secret));

        if ($hasil > 0) {
            echo '<script>window.location="index.php?page=auth"</script>';
            $_SESSION['user'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['secret'] = $secret;
        } else {
            $register_error_message = 'Terjadi Kesalahan, coba lain kali';
            echo '<script>window.location="index.php?page=register&msg='.$register_error_message.'"</script>';
        }
    }
?>
<!-- konten register-->
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-xl-7 mx-auto">
            <h3 class="display-4">Register</h3>
            <p class="text-muted mb-4">Harap isi semua form dibawah ini</p>
            <form method="post" action="index.php?page=register">
                <?php
                    if (isset($_GET['msg'])) {
                        $register_error_message = $_GET['msg'];
                    }else {
                        $register_error_message = '';
                    }
                    if ($register_error_message != "") {
                        echo    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Error </strong>'.$register_error_message.' 
                                </div>
                                
                                <script>
                                $(".alert").alert();
                                </script>';
                    }
                ?>
                <input type="hidden" name="foto" value="default.jpg">
                <div class="form-group mb-3">
                    <input id="inputName" name="name" type="name" placeholder="Masukan Nama" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                </div>
                <div class="form-group mb-3">
                    <input id="inputNPM" name="npm" type="npm" placeholder="Masukan NPM" required="" class="form-control rounded-pill border-0 shadow-sm px-4">
                </div>
                <div class="form-group mb-3">
                  <select class="form-control rounded-pill border-0 shadow-sm px-4" name="jurusan" id="inputJurusan">
                    <option selected disabled>Masukan Jurusan</option>
                    <option value="Informatika">Informatika</option>
                    <option value="Sistem Informasi (S1)">Sistem Informasi (S1)</option>
                    <option value="DKV">DKV</option>
                    <option value="Sistem Informasi (D3)">Sistem Informasi (D3)</option>
                    <option value="Akuntansi">Akuntansi</option>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <select class="form-control rounded-pill border-0 shadow-sm px-4" name="semester" id="inputSemester">
                    <option selected disabled>Masukan Semester</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="dll">Di atas 9</option>
                  </select>
                </div>
                <div class="form-group mb-3">
                    <input id="inputUsername" name="username" type="username" placeholder="Masukan Username" required="" class="form-control rounded-pill border-0 shadow-sm px-4">
                </div>
                <div class="form-group mb-3">
                    <input id="inputEmail" name="email" type="email" placeholder="Masukan Email" required="" class="form-control rounded-pill border-0 shadow-sm px-4">
                </div>
                <div class="form-group mb-3">
                    <input id="inputPassword" name="password" type="password" placeholder="Masukan Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                </div>
                <button type="submit" name="btnRegis" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Daftar</button>
                <div class="text-center font-italic text-muted d-flex justify-content-between mt-4">
                    <p>@Kelompok 4 Integrasi Sistem 2020
                    </p>
                </div>
            </form>
        </div>
    </div>
</div><!-- End -->