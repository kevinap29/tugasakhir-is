<?php
include('config/session.php');

if (empty($_SESSION['secret'])) {
  header("location: page/auth/index.php?page=login");
}else {
  $secret = $_SESSION['secret'];

  $statement = $conn->prepare("SELECT * FROM users WHERE google_secret_code = '".$secret."'");
  $stmt = $statement->execute();

  if($stmt>0){
    $data = $statement->fetch();
    $name = $data['nama'];
    $username = $data['username'];
    $npm = $data['npm'];
    $jurusan = $data['jurusan'];
    $foto = $data['foto'];

  }else{
    $error_msg = 'Session Error!';
    echo $error_msg;
  }

}
?>

<!doctype html>
<html lang="en">
  <?php include('include/head.php') ?>
  <body>

    <?php include('include/nav.php'); ?>

    <!-- Page content holder -->
    <div class="page-content p-5 main-container text-white" id="content">
      <!-- Toggle button -->
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars "></i></button>
        </div>
        <div class="col-md-4 ml-auto d-flex justify-content-end">
          <div class="btn-group dropleft">
            <button class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4 drowdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-cog "></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="index.php?page=setting">Setting User</a>
              <a class="dropdown-item" href="index.php?page=logout">Logout</a>
            </div>
          </div>
        </div>
      
      <!-- Content -->
      <?php 
        if ($_GET['page']=='home') {
          include('page/main/home.php');
        }elseif ($_GET['page']=='logout') {
          include('page/auth/logout.php');
        }elseif ($_GET['page']=='setting') {
          include('page/main/setting.php');
        }elseif ($_GET['page']=='anggota') {
          include('page/main/anggota.php');
        }elseif ($_GET['page']=='listBrand') {
          include('page/main/list-brand-hp.php');
        }elseif ($_GET['page']=='detailBrand') {
          include('page/main/detail-brand-hp.php');
        }
      ?>

      
      <a class="top-link hide " href="" id="js-top">
        <i class="fas fa-chevron-up    "></i>
      </a>
    </div>
    <!-- End content -->

    <?php include('include/script.php') ?>
  </body>
</html>