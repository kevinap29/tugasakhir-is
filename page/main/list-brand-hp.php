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
  CURLOPT_URL => 'http://api-mobilespecs.azharimm.tk/brands?page='.$paginate.'&limit=30&search=&sort=brand:asc',
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
$limit = $data['data']['limit'];
$last_page = $data['data']['last_page'];
$brands = $data['data']['brands'];
$no = 1;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <p class="display-4 my-4">API Spek HP - List Brand</p>
            <div class="row d-flex align-items-stretch">
            <?php
                foreach ($brands as $brand) { 
            ?>
                <div class="col-md-4 mb-3">
                    <div class="card-header border-0 shadow-sm text-center font-weight-bold">
                        <a id="linkBrands" class="card-link text-white " href="http://">
                            <h6 class="card-title"><?=$brand['brand']?> <span 
                            class="badge badge-pill badge-primary" 
                            data-toggle="tooltip" 
                            data-placement="top" 
                            title="Ada <?= $brand['count_devices']?> HP dalam brand <?= $brand['brand'] ?> "><?= $brand['count_devices']?></span></h6>
                        </a>
                    </div>
                </div>
            <?php
            }
            ?>
            </div>
        </div>
    </div>
    <?php include('include/pagination.php')?>
</div>