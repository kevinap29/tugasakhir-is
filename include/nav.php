<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
      <div class="py-4 px-3 mb-4 bg-light">
        <div class="media d-flex align-items-center"><img src="asset\img\photo-profile\<?= $foto ?>" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
          <div class="media-body p-1">
            <h4 class="m-0 text-uppercase"><?= $username ?> <small class="text-muted"> (<?= $npm ?>) </small></h4>
            <p class="font-weight-bold text-uppercase mb-0"><?= $jurusan ?></p>
          </div>
        </div>
      </div>

      <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Main</p>

      <ul class="nav flex-column bg-white mb-0">
        <li class="nav-item">
          <a href="index.php?page=home" class="nav-link text-dark font-weight-bold bg-light">
                    <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                    Home
                </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-dark font-weight-bold">
                    <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                    API
                </a>
        </li>
      </ul>
    </div>
    <!-- End vertical navbar -->