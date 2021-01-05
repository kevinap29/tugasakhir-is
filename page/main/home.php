

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card-header text-dark bg-light">
                <p>Selamat Datang, <strong><?= $name ?></strong></p>
            </div>
        </div>
    </div>

    <p class="display-4 my-3">List anggota</p>

    <?php
    $statement = $conn->prepare("SELECT * FROM users");
    $stmt = $statement->execute();

    if($stmt>0){
    $dataAll = $statement->fetchAll();
    foreach ($dataAll as $user) {

    ?>
    <div class="col-md-10 justify-content-center">
        <div class="card text-dark border-0 shadow-sm my-3">
            <!-- <img class="card-img-top" data-src="holder.js/100x180/" alt="Card image cap"> -->
            <div class="card-body">
                <dl class="row">
                    <dt class="col-md-3">
                    <figure class="figure">
                        <img src="asset/img/photo-profile/<?= $user['foto'] ?>" height="150" width="150" class="figure-img rounded" alt="...">
                        <figcaption class="figure-caption"><?= $user['nama'] ?></figcaption>
                    </figure>
                    </dt>
                    <dd class="col-md-9">
                        <p>Jurusan : <?= $user['jurusan'] ?></p>
                        <p>NPM : <?= $user['npm'] ?></p>
                        <p>Semester : <?= $user['semester'] ?></p>
                    </dd>
                </dl>
            </div>
            <hr class="mb-0">
        </div>
    </div>
    <?php
    }// end foreach

    }else{
    $error_msg = 'Query Error!';
    echo $error_msg;
    }
    ?>