
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <p class="display-4 my-4">Data anggota</p>
            <div class="row row-cols-1 row-cols-md-2">
                <?php
                $statement = $conn->prepare("SELECT * FROM users");
                $stmt = $statement->execute();

                if($stmt>0){
                $dataAll = $statement->fetchAll();
                foreach ($dataAll as $user) {

                ?>
                <div class="col mb-3 d-flex align-item-strect">
                    <div class="card col-md-10 text-dark border-0 shadow-sm my-3">
                        <!-- <img class="card-img-top" data-src="holder.js/100x180/" alt="Card image cap"> -->
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-md-4">
                                <figure class="figure">
                                    <img src="asset/img/photo-profile/<?= $user['foto'] ?>" height="100" width="100" class="figure-img rounded" alt="...">
                                    <figcaption class="figure-caption"><?= $user['nama'] ?></figcaption>
                                </figure>
                                </dt>
                                <dd class="col-md-6">
                                    <p>Jurusan : <?= $user['jurusan'] ?></p>
                                    <p>NPM : <?= $user['npm'] ?></p>
                                    <p>Semester : <?= $user['semester'] ?></p>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <?php
                }# end foreach

                }else{
                $error_msg = 'Query Error!';
                echo $error_msg;
                }
                ?>
            </div>
        </div>
    </div>
</div>