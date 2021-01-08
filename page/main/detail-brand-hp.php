<?php
$brand_slug = $_GET['slug'];
$show_more = $_GET['show'];//set limit 2000 for show all content
$default_show = 100;

if (empty($show_more)) {
    $show = $default_show;
}else {
    $show = $show_more;
}

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://api-mobilespecs.azharimm.tk/brands/'.$brand_slug.'?limit='.$show.'&sort=brand:asc',
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
$phones = $data['data']['phones'];
?>

<div class="container-fluid">
    <div class="row">
        <div class="col">

            <p class="display-4 my-4">Brand - <?= $brandName ?></p>

            <div class="row my-3 d-flex justify-content-center">
                <div class="col-md-1">
                    <a href="index.php?page=listBrand&pag=1" role="button" class="btn btn-secondary btn-block"><i class="fas fa-backward    "></i></a>
                </div>
                <div class="col-md-2 ml-auto">
                    <!-- <button type="button" name="" id="" class="btn btn-secondary btn-block"><i class="fas fa-forward    "></i></i></button> -->
                </div>
            </div>

            <div class="row d-flex align-items-stretch ">
            <?php
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
                            <a class="btn btn-primary col-12" href="index.php?page=detailHP&bslug=<?=$brand_slug?>&pslug=<?= $phone['phone_name_slug'] ?>&bphone=<?= $phone['brand'] ?>&nphone=<?= $phone['phone_name'] ?>" 
                            role="button">Cek Spesifikasi</a>
                        </div>
                    </div>
                </div>
            <?php
            }//end foreach
            ?>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-md-4 ">
                    <?php
                        if (empty($_GET['show'])) {
                            echo '<a href="index.php?page=detailBrand&slug='.$brand_slug.'&brand='.$phone['brand'].'&show=2000" role="button" class="btn btn-secondary btn-block">
                            Show More</i></a>';
                        }elseif ($_GET['show'] == 2000) {

                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>