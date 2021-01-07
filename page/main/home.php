<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="alert alert-primary  alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Selamat Datang</strong> <?= $name ?>
            </div>
            
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <?php
                $statement = $conn->prepare("SELECT * FROM users");
                $stmt = $statement->execute();

                if($stmt>0){
                $dataAll = $statement->fetchAll();
                $no = 1;
                $active = 'active';
                $nonActive = '';
                ?>
                <div class="carousel-inner">
                <?php
                foreach ($dataAll as $user) {
                $item_class = ($no == $user['id']) ? $active : $nonActive;
                ?>
                    <div class="carousel-item <?= $item_class ?>">
                        <img src="asset/img/photo-profile/<?= $user['foto'] ?>" height="500" class="d-block w-100" alt="">
                        <div class="carousel-caption text-warning d-none d-md-block">
                            <h5><?= $user['nama'] ?></h5>
                            <p><?= $user['npm'] ?></p>
                        </div>
                    </div>
                <?php
                }# end foreach

                }else{
                $error_msg = 'Query Error!';
                echo $error_msg;
                }
                ?>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>