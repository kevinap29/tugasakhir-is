<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
      <div class="py-4 px-3 mb-4 bg-light">
        <div class="media d-flex align-items-center"><img src="asset/img/photo-profile/<?php
          if ($foto != 'default.jpg') {
            $image = explode('.',$foto); 
            echo $image[0].'_thump.JPG';  
          }else{
            echo $foto;
          }
        ?>
        " alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
          <div class="media-body p-1">
            <h5 class="m-0 text-uppercase"><?= $username ?> <small class="text-muted"> (<?= $npm ?>) </small></h5>
            <p class="font-weight-bold text-uppercase mb-0"><?= $jurusan ?></p>
          </div>
        </div>
      </div>

      <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Main</p>

      <ul class="nav flex-column bg-white mb-0">
        <li class="nav-item">
          <a href="index.php?page=home" class="nav-link text-dark font-weight-bold bg-light">
                    <i class="fa fa-home mr-3 text-primary fa-fw"></i>
                    Home
                </a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=anggota" class="nav-link text-dark font-weight-bold bg-light">
                    <i class="fa fa-users mr-3 text-primary fa-fw"></i>
                    Anggota
                </a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=api" class="nav-link text-dark font-weight-bold bg-light">
                    <i class="fa fa-mobile-alt mr-3 text-primary fa-fw"></i>
                    API Spek HP
                </a>
        </li>
      </ul>
    </div>
    <!-- End vertical navbar -->