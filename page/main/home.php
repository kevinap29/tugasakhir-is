

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card text-dark">
                <div class="card-header">
                    <p>Selamat Datang, <strong><?= $name ?></strong></p>
                </div>
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
    <div class="card text-dark border-0 shadow-sm my-3">
        <!-- <img class="card-img-top" data-src="holder.js/100x180/" alt="Card image cap"> -->
        <div class="card-body">
            <dl class="row">
                <dt class="col-md-3">
                    <?= $user['nama'] ?>
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
    <?php
    }// end foreach

    }else{
    $error_msg = 'Query Error!';
    echo $error_msg;
    }
    ?>