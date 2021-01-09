<?php
$query = htmlspecialchars($_POST['query']);

$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => 'http://api-mobilespecs.azharimm.tk/search?query='.$query.'&limit=2000',
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

if ($last_page == 0 ) {
    echo    '<div class="container-fluid">
                <div class="row">
                    <div class="col"> 
                        <p class="display-4 my-4">Pencarian tidak ditemukan</p>

                        <div class="row my-3 d-flex justify-content-center">
                            <div class="col-md-1 mr-auto">
                                <a href="index.php?page=listBrand&pag=1" role="button" class="btn btn-secondary btn-block"><i class="fas fa-backward    "></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div';
}
$phones = $data['data']['phones'];
?>

<div class="container-fluid">
    <div class="row">
        <div class="col">

            <p class="display-4 my-4">Anda mencari - <?= $query ?></p>

            <div class="row my-3 d-flex justify-content-center">
                <div class="col-md-1">
                    <a href="index.php?page=listBrand&pag=1" role="button" class="btn btn-secondary btn-block"><i class="fas fa-backward    "></i></a>
                </div>
                <div class="col-md-4 ml-auto">
                    <form method="post" class="form-inline" action="index.php?page=search-page">
                        <div class="form-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Show</div>
                            </div>
                            <input type="query" name="query" id="query" class="form-control" placeholder="Tampilkan">
                            <button role="button" class="btn btn-secondary" type="submit" name="btnShow">Go</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-1 ml-auto"></div>
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
                            <a class="btn btn-primary col-12" href="index.php?page=detailHP&bslug=<?=$phone['brand_slug']?>&pslug=<?= $phone['phone_name_slug'] ?>&bphone=<?= $phone['brand'] ?>&nphone=<?= $phone['phone_name'] ?>&pag=1&show=2000" 
                            role="button">Cek Spesifikasi</a>
                        </div>
                    </div>
                </div>
            <?php
            } //end foreach
            ?>
            </div>
        </div>
    </div>
</div>