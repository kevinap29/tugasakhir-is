<?php
$query = urlencode($_GET['q']);
$show = $_GET['show'];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://api-mobilespecs.azharimm.tk/search?query='.$query.'&limit='.$show.'',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    
    $response = curl_exec($curl);
    curl_close($curl);
    $data = json_decode($response, true);

    $limit = $data['data']['limit'];
    $last_page = $data['data']['last_page'];
    $phones = $data['data']['phones'];
    $count = count($phones);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col">

            <p class="display-4 my-4">Anda mencari - <?= urldecode($query) ?></p>

            <div class="row my-3 d-flex justify-content-center">
                <div class="col-md-1">
                    <a href="index.php?page=listBrand&pag=1" role="button" class="btn btn-secondary btn-block"><i class="fas fa-backward    "></i></a>
                </div>
                <div class="col-md-4 ml-auto">
                    <?php include('include/search.php') ?>
                </div>
                <div class="col-md-1 ml-auto"><small class="text-dark ml-auto"><strong><?=$count?></strong> hasil</small></div>
            </div>

            <div class="row d-flex align-items-stretch ">
            <?php
            if (empty($last_page)) {
                echo    '<div class="col-md-12 my-3">
                            <p class="lead text-center">Data tidak ditemukan/bermasalah</p>
                        </div>';
            }else{

            foreach ($phones as $phone) {
                
            ?>
                <div class="col-md-3 mb-4">
                    <div class="card text-dark">
                        <div class="card-header text-center font-weight-bold">
                        <span class="d-inline-block text-truncate" style="max-width: 300px;">
                            <p class="mb-0"><?= $phone['brand'] ?></p>
                            <p class="mb-0"><small><?= $phone['phone_name'] ?></small></p> 
                        </span>
                        </div>

                        <img src="<?= $phone['phone_img_url'] ?>" class="card-img-top p-3" alt="..." style="max-width: 300px; max-height:300px">
                        
                        <div class="card-footer">
                            <a class="btn btn-primary col-12" href="index.php?page=detailHP&bslug=<?=$phone['brand_slug']?>&pslug=<?= $phone['phone_name_slug'] ?>&bphone=<?= $phone['brand'] ?>&nphone=<?= $phone['phone_name'] ?>&pag=1&show=<?= $count ?>&devices=<?= $count ?>" 
                            role="button">Cek Spesifikasi</a>
                        </div>
                    </div>
                </div>
            <?php
            } //end else
            } //end foreach
            ?>
            </div>
        </div>
    </div>
</div>