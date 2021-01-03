<!doctype html>
<html lang="en">
  <?php include('head.php') ?>
  <body>
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- gambar kanan -->
            <div class="col-md-6 d-none d-md-flex bg-image"></div>


            <!-- form kiri -->
            <div class="col-md-6 bg-light">
                <div class="login d-flex align-items-center py-5">

                    <!-- konten -->
                    <?php
                        if ($_GET['page']=='login') {
                            include('login.php');
                        }elseif ($_GET['page']=='register'){
                            include('register.php');
                        }elseif ($_GET['page']=='auth') {
                            include('authenticator.php');
                        }elseif ($_GET['page']=='authLogin') {
                            include('authenticator-login.php');
                        }
                    ?>

                </div>
            </div><!-- End -->

        </div>
    </div>
    <?php include('script.php') ?>
  </body>
</html>