<?php
if (isset($_POST['btnUpdate'])) {
    $nama = $_POST['name'];
    $foto = $_FILES['foto']['name'];
    if (condition) {
        # code...
    } else {
        # code...
    }
    
} else {
    echo 'error';
}

$q_username = $data['username'];
$statment = $conn->prepare("SELECT * FROM users WHERE username='".$q_username."'");
$stmt = $statment->execute();

if ($stmt>0) {
    $dataSetting = $statment->fetchall();
?>

<div class="container-fluid">
    <p class="display-4 my-3">Setting Akun</p>
    <div class="row">
        <div class="col-md-8 justify-content-center">
            <form action="index.php?page=setting" method="post">
            <?php
            foreach ($dataSetting as $dataUser) {
            ?>
                <div class="card-header border-0 shadow-sm px-4 mb-5 text-center font-weight-bold display-4">
                    Biodata
                </div>   

                <div class="form-group row mb-3">
                    <label for="inputName" class="col-md-2 col-form-label">Name</label>
                    <div class="col-md-10">
                        <input id="inputName" name="name" type="name" value="<?= $dataUser['nama']?>" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="inputNPM" class="col-md-2 col-form-label">NPM</label>
                    <div class="col-md-10">
                        <input id="inputNPM" name="name" type="name" value="<?= $dataUser['npm']?>" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputJurusan">Jurusan</label>
                    </div>
                    <select class="custom-select border-0 shadow-sm px-4" id="inputJurusan">
                        <option selected disabled><?= $dataUser['jurusan']?></option>
                        <option value="Informatika">Informatika</option>
                        <option value="Sistem Informasi (S1)">Sistem Informasi (S1)</option>
                        <option value="DKV">DKV</option>
                        <option value="Sistem Informasi (D3)">Sistem Informasi (D3)</option>
                        <option value="Akuntansi">Akuntansi</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputSemester">Semester</label>
                    </div>
                    <select class="custom-select border-0 shadow-sm px-4" id="inputSemester">
                        <option selected disabled><?= $dataUser['semester']?></option>
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
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputFoto">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputFoto" aria-describedby="inputFotoProfil">
                        <label class="custom-file-label" for="inputFoto">Pilih Foto</label>
                    </div>
                </div>


                <div class="card-header border-0 shadow-sm px-4 my-5 text-center font-weight-bold display-4">
                    Akun
                </div>

                <div class="form-group row mb-3">
                    <label for="inputUsername" class="col-md-2 col-form-label">Username</label>
                    <div class="col-md-10">
                        <input id="inputUsername" name="username" type="username" value="<?= $dataUser['username']?>" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="inputEmail" class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-10">
                        <input id="inputEmail" name="email" type="email" value="<?= $dataUser['email']?>" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="inputPassword" class="col-md-2 col-form-label">Password</label>
                    <div class="col-md-10">
                        <input id="inputPassword" name="password1" type="password" placeholder="Masukan password" required="" class="form-control rounded-pill border-0 shadow-sm px-4">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="inputPassword" class="col-md-2 col-form-label">Konfirmasi Password</label>
                    <div class="col-md-10">
                        <input id="inputPassword" name="password2" type="password" placeholder="Masukan password " required="" class="form-control rounded-pill border-0 shadow-sm px-4">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-md-2 ml-auto">
                        <button type="submit" name="btnUpdate" class="btn btn-success btn-block text-uppercase mb-2 rounded-pill shadow-sm">Ubah</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-3 ml-auto fixed">
            <div class="card text-dark bg-link">
            <img class="card-img-top" src="asset\img\photo-profile\<?= $dataUser['foto'] ?>" alt="">
            </div>
        <?php
        }
        ?>
        </div>
    </div>
</div>
<?php
}else {
    echo 'Update query setting error!';
}
?>
