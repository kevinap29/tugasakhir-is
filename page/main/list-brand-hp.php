<?php
$pag = $_GET['pag'];
$paginate = 0;
switch ($pag) {
    case '1':
        $paginate = 1;
        break;
    case '2':
        $paginate = 2;
        break;
    case '3':
        $paginate = 3;
        break;
    case '4':
        $paginate = 4;
        break;
                
    default: 
        $paginate = 1;
        break;
}

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://api-mobilespecs.azharimm.tk/brands?page='.$paginate.'&limit=30&sort=brand:asc',
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

$page = $data['data']['page'];
$brands = $data['data']['brands'];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <p class="display-4 my-4">List Brand</p>
            
            <div class="row my-3 d-flex">
                <?php include('include/pagination.php')?>
                <div class="col-md-6 ml-auto d-flex justify-content-end">
                    <?php include('include/search.php') ?>
                </div>
            </div>

            <div class="row">
            <?php
                if (empty($brands)) {
                    header('location: index.php?page=empty-page');
                }
                foreach ($brands as $brand) { 
            ?>
                <div class="col-md-4 mb-3">
                    <div class="card d-flex align-items-center">
                        <div class="card-header border-0 shadow-sm text-center font-weight-bold">
                            <a id="linkBrands" class="card-link text-dark " href="index.php?page=detailBrand&slug=<?=$brand['brand_slug']?>&brand=<?= $brand['brand'] ?>&pag=<?= $pag ?>&devices=<?= $brand['count_devices']?>&show=20">
                                <h6 class="card-title"><?=$brand['brand']?> <span 
                                class="badge badge-pill badge-primary" 
                                data-toggle="tooltip" 
                                data-placement="top" 
                                <?php if ($brand['count_devices'] > 20 ){
                                    $brand['count_devices']/2;
                                    if ($brand['count_devices'] > 20) {
                                        $brand['count_devices']/2;
                                    }
                                }
                                
                                ?>
                                title="Ada <?= $brand['count_devices']?> HP dalam brand <?= $brand['brand'] ?> "><?= $brand['count_devices']?></span></h6>
                            </a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            </div>
        </div>
    </div>
</div>