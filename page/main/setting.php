<?php
include('include/resize.php');
if (isset($_POST['btnUpdate'])) {
    $id = $_POST['id'];
    $nama = $_POST['name'];
    $npm = $_POST['npm'];
    $jurusan = $_POST['jurusan'];
    $semester = $_POST['semester'];
    $foto = $_FILES['foto']['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    if (empty($password1) && empty($password2)) {
        $stmt_empty_pass = $conn->prepare("UPDATE users SET foto=?,nama=?,npm=?,jurusan=?,semester=?,username=?,email=?  WHERE id='".$id."'");
        $exec_empty_pass = $stmt_empty_pass->execute(array($foto,$name,$npm,$jurusan,$semester,$username,$email));
        if ($exec_empty_pass < 1){
            $update_error_message = "TERJADI KESALAHAN INPUT PASSWORD KOSONG";
        }else {
            if(is_array($_FILES)) {
                $uploadedFile = $_FILES['foto']['tmp_name']; 
                $sourceProperties = getimagesize($uploadedFile);
                $dirPath = "asset/img/photo-profile/";
                $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
                $explodeFileName = explode('.',$foto);
                $newFileName = $explodeFileName[0];
                $imageType = $sourceProperties[2];
        
                switch ($imageType) {
        
                    case IMAGETYPE_PNG:
                        $imageSrc = imagecreatefrompng($uploadedFile); 
                        $tmp = imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
                        imagepng($tmp,$dirPath. $newFileName. "_thump.". $ext);
                        break;           
        
                    case IMAGETYPE_JPEG:
                        $imageSrc = imagecreatefromjpeg($uploadedFile); 
                        $tmp = imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
                        imagejpeg($tmp,$dirPath. $newFileName. "_thump.". $ext);
                        break;
                    
                    case IMAGETYPE_GIF:
                        $imageSrc = imagecreatefromgif($uploadedFile); 
                        $tmp = imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
                        imagegif($tmp,$dirPath. $newFileName. "_thump.". $ext);
                        break;
        
                    default:
                        echo "Invalid Image type.";
                        exit;
                        break;
                }
        
        
                move_uploaded_file($uploadedFile, $dirPath. $newFileName. ".". $ext);
                $update_msg = 'BERHASIL UPDATE DATA';
                echo    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Error </strong>'.$update_msg.' 
                            </div>
                            
                            <script>
                            $(".alert").alert();
                            </script>';
            }
        }
    }elseif($password1 == $password2) {
        $new_pass = md5($password1);
        $stmt_empty_pass = $conn->prepare("UPDATE users SET (foto,nama,npm,jurusan,semester,username,email,password) VALUE (?,?,?,?,?,?,?,?) WHERE id='".$id."'");
        $exec_empty_pass = $stmt_empty_pass->excute(array($foto,$name,$npm,$jurusan,$semester,$username,$email,$new_pass));
        if ($exec_empty_pass < 1){
            $update_error_message = "TERJADI KESALAHAN UPDATE DATA";
        }else{
            if(is_array($_FILES)) {
                $uploadedFile = $_FILES['foto']['tmp_name']; 
                $sourceProperties = getimagesize($uploadedFile);
                $dirPath = "asset/img/photo-profile/";
                $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
                $explodeFileName = explode('.',$foto);
                $newFileName = $explodeFileName[0];
                $imageType = $sourceProperties[2];
        
                switch ($imageType) {
        
                    case IMAGETYPE_PNG:
                        $imageSrc = imagecreatefrompng($uploadedFile); 
                        $tmp = imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
                        imagepng($tmp,$dirPath. $newFileName. "_thump.". $ext);
                        break;           
        
                    case IMAGETYPE_JPEG:
                        $imageSrc = imagecreatefromjpeg($uploadedFile); 
                        $tmp = imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
                        imagejpeg($tmp,$dirPath. $newFileName. "_thump.". $ext);
                        break;
                    
                    case IMAGETYPE_GIF:
                        $imageSrc = imagecreatefromgif($uploadedFile); 
                        $tmp = imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
                        imagegif($tmp,$dirPath. $newFileName. "_thump.". $ext);
                        break;
        
                    default:
                        echo "Invalid Image type.";
                        exit;
                        break;
                }
        
        
                move_uploaded_file($uploadedFile, $dirPath. $newFileName. ".". $ext);
                $update_msg = 'BERHASIL UPDATE DATA';
                echo    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Error </strong>'.$update_msg.' 
                            </div>
                            
                            <script>
                            $(".alert").alert();
                            </script>';
            }
        }
    }
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
        <div class="col-md-9 justify-content-center">
            <form action="index.php?page=setting" method="post" enctype="multipart/form-data">
                <div class="card-header border-0 shadow-sm px-4 mb-5 text-center font-weight-bold display-4">
                    Biodata
                </div>  
            <?php
            if (isset($_GET['msg'])) {
                $update_error_message = $_GET['msg'];
            }else {
                $update_error_message = '';
            }
            if ($update_error_message != "") {
                echo    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Error </strong>'.$update_error_message.' 
                        </div>
                        
                        <script>
                        $(".alert").alert();
                        </script>';
            }
            foreach ($dataSetting as $dataUser) {
            ?>

                <input type="hidden" name="id" value="<?= $dataUser['id'] ?>">
                <div class="form-group row mb-3">
                    <label for="inputName" class="col-md-2 col-form-label">Name</label>
                    <div class="col-md-10">
                        <input id="inputName" name="name" type="name" value="<?= $dataUser['nama']?>" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="inputNPM" class="col-md-2 col-form-label">NPM</label>
                    <div class="col-md-10">
                        <input id="inputNPM" name="npm" type="name" value="<?= $dataUser['npm']?>" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputJurusan">Jurusan</label>
                    </div>
                    <select name="jurusan" class="custom-select border-0 shadow-sm px-4" id="inputJurusan">
                        <option selected value="<?= $dataUser['jurusan']?>"><?= $dataUser['jurusan']?></option>
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
                    <select name="semester" class="custom-select border-0 shadow-sm px-4" id="inputSemester">
                        <option selected value="<?= $dataUser['semester']?>"><?= $dataUser['semester']?></option>
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
                        <input type="file" name="foto" class="custom-file-input" id="inputFoto" aria-describedby="inputFotoProfil">
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
                        <input id="inputPassword" name="password1" type="password" placeholder="Masukan password" class="form-control rounded-pill border-0 shadow-sm px-4">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="inputPassword" class="col-md-2 col-form-label">Konfirmasi Password</label>
                    <div class="col-md-10">
                        <input id="inputPassword" name="password2" type="password" placeholder="Masukan password" class="form-control rounded-pill border-0 shadow-sm px-4">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-md-2 ml-auto">
                        <button type="submit" name="btnUpdate" class="btn btn-success btn-block text-uppercase mb-2 rounded-pill shadow-sm">Ubah</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-3 mt-5 pt-5 ml-0">
            <div class="">
                <a href="asset\img\photo-profile\<?= $dataUser['foto'] ?>" 
                target="_blank" rel="noopener noreferrer">
                    <img class="text-center rounded-circle img-thumbnail shadow-sm" width="200" src="asset\img\photo-profile\<?php $image = explode('.',$dataUser['foto']); echo $image[0].'_thump.JPG';?>" alt="">    
                </a>
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
