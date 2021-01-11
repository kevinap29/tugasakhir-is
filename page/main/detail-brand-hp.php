<?php
$pag = $_GET['pag'];
$brand_slug = $_GET['slug'];
$brand = $_GET['brand'];
$show = $_GET['show'];//default limit
$count = $_GET['devices'];
$default_show = 20;
if ($count <= $default_show) {
    $show = $count;
}

if (isset($_POST['btnShow'])) {
    header('Location: index.php?page=detailBrand&slug='.$brand_slug.'&brand='.$brand.'&pag='.$pag.'&show='.$_POST['show'].'&devices='.$count.'');
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

$limit = '';
$limit = isset($data['data']['limit']) ? $data['data']['limit'] : '';
$phones = '';
// pemeriksaan menggunakan fungsi isset()
$phones = isset($data['data']['phones']) ? $data['data']['phones'] : '';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col">

            <p class="display-4 my-4">Brand - <?= $brandName ?></p>

            <div class="row my-3 d-flex justify-content-center">
                <div class="col-md-1">
                    <a href="index.php?page=listBrand&pag=<?= $pag ?>" role="button" class="btn btn-secondary btn-block"><i class="fas fa-backward    "></i></a>
                </div>
                <div class="col-md-3 ml-auto">
                    <form method="post" class="form-inline">
                        <div class="form-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" for="show">Show</div>
                            </div>
                            <select class="custom-select" name="show" id="show">
                            <?php
                            $nilai = 2000;
                            $lipat = 4;
                            for ($i=1; $i <= $nilai ; $i++) { 
                                $bagi = $i % $lipat;
                                if ($bagi == 0) {
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                            }
                            ?>
                            </select>
                            <button role="button" class="btn btn-secondary" type="submit" name="btnShow">Go</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-1 ml-auto">
                    <a href="index.php?page=detailBrand&slug=<?=$brand_slug?>&brand=<?=$brand?>&pag=<?=$pag?>&show=<?=$default_show?>&devices=<?=$count?>" type="button" class="btn btn-secondary btn-block"><i class="fas fa-sync-alt    "></i></i></a>
                </div>
            </div>

            <div class="row d-flex align-items-stretch ">
            <?php
            if (empty($phones)) {
                echo    '<div class="col-md-12 my-3">
                        <p class="lead text-center">Data tidak ditemukan/bermasalah</p>
                        </div>';
            }else {
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

                        <img src="<?= $phone['phone_img_url'] ?>" class="card-img-top p-3" alt="..." style="max-width: 250px; height:300px">
                        
                        <div class="card-footer">
                            <a class="btn btn-primary col-12" 
                            href="index.php?page=detailHP&bslug=<?=$brand_slug?>&pslug=<?= $phone['phone_name_slug'] ?>&bphone=<?= $phone['brand'] ?>&nphone=<?= $phone['phone_name'] ?>&pag=<?=$pag ?>&show=<?=$show ?>&devices=<?=$count?>" 
                            role="button">Cek Spesifikasi</a>
                        </div>
                    </div>
                </div>
            <?php
            }// end foreach
            }//end else
            ?>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-md-4 ">
                    <?php
                        if ($count > 20 && $count != $show ) {
                            echo '<a href="index.php?page=detailBrand&slug='.$brand_slug.'&brand='.$brand.'&pag='.$pag.'&devices='.$count.'&show='.$count.'" role="button" class="btn btn-secondary btn-block">
                            Show More</i></a>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>