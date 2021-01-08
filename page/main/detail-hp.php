<?php
$brand_slug = $_GET['bslug'];
$phone_slug = $_GET['pslug'];
$brand_name = $_GET['bphone'];
$phone_name = $_GET['nphone'];

$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => 'http://api-mobilespecs.azharimm.tk/brands/'.$brand_slug.'/'.$phone_slug.'',
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

$brandName = $data['data']['brand'];
$phoneName = $data['data']['phone_name'];
$phoneImage = $data['data']['phone_img_url'];
$phoneSpec = $data['data']['specifications'];
//define spec
    $spec_0 = $phoneSpec[0];
    $spec_1 = $phoneSpec[1];
    $spec_2 = $phoneSpec[2];
    $spec_3 = $phoneSpec[3];
    $spec_4 = $phoneSpec[4];
    $spec_5 = $phoneSpec[5];
    $spec_6 = $phoneSpec[6];
    $spec_7 = $phoneSpec[7];
    $spec_8 = $phoneSpec[8];
    $spec_9 = $phoneSpec[9];
    $spec_10 = $phoneSpec[10];
    $spec_11 = $phoneSpec[11];
    if (!empty($phoneSpec[12])){
        $spec_12 = $phoneSpec[12];
    }
//spec title
    $spec_0_title = $spec_0['title'];
    $spec_1_title = $spec_1['title'];
    $spec_2_title = $spec_2['title'];
    $spec_3_title = $spec_3['title'];
    $spec_4_title = $spec_4['title'];
    $spec_5_title = $spec_5['title'];
    $spec_6_title = $spec_6['title'];
    $spec_7_title = $spec_7['title'];
    $spec_8_title = $spec_8['title'];
    $spec_9_title = $spec_9['title'];
    $spec_10_title = $spec_10['title'];
    $spec_11_title = $spec_11['title'];
    if (!empty($phoneSpec[12])){
        $spec_12 = $phoneSpec[12];
        $spec_12_title = $spec_12['title'];
    }
// define detail spec
    $spec_0_specs = $spec_0['specs'];
    $spec_1_specs = $spec_1['specs'];
    $spec_2_specs = $spec_2['specs'];
    $spec_3_specs = $spec_3['specs'];
    $spec_4_specs = $spec_4['specs'];
    $spec_5_specs = $spec_5['specs'];
    $spec_6_specs = $spec_6['specs'];
    $spec_7_specs = $spec_7['specs'];
    $spec_8_specs = $spec_8['specs'];
    $spec_9_specs = $spec_9['specs'];
    $spec_10_specs = $spec_10['specs'];
    $spec_11_specs = $spec_11['specs'];
    if (!empty($phoneSpec[12])){
        $spec_12 = $phoneSpec[12];
        $spec_12_title = $spec_12['title'];
        $spec_12_specs = $spec_12['specs'];
    }
?>

<div class="container-fluid">
    <div class="row d-flex align-item-center">
        <div class="col-md-2 bg-dark mb-2">
            <a href="index.php?page=detailBrand&slug=<?= $brand_slug ?>&brand=<?= $brand_name ?>&show=" role="button" class="btn btn-secondary btn-block my-5"><i class="fas fa-backward    "></i></a>
        </div>
        <div class="col-md-8 text-center card-header bg-dark mb-2 mx-0">
            <h5 class="display-4"><?= $brandName ?></h5>
            <p class="lead"><strong><?= $phoneName ?></strong></p> 
        </div>
        <div class="col-md-2 bg-dark mb-2 mx-0"></div>
        <div class="card mb-3 p-3 text-dark">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= $phoneImage?>" class="card-img" style="max-width: 540px;" alt="...">
                    <hr class="w-100">
                    <!-- loop spec 1 / date release -->
                    <p class="font-weight-bold mb-0 ml-3"><?= $spec_1_title ?></p>

                    <?php for ($i=0; $i<count($spec_1_specs); $i++) { ?>
                    <dl class="row ml-1 mb-1">
                        <dt class="col-sm-5 mb-0"><small><?= $spec_1_specs[$i]['key'] ?></small></dt>
                        <?php   for ($j=0; $j<count($spec_1_specs[$i]['val']); $j++) { 
                                $explode = explode('.', $spec_1_specs[$i]['val'][$j]);
                                $implode = implode('. <br>', $explode);
                        ?>
                        <dd class="col-sm-7 mb-0"><small><?= $implode ?></small></dd>
                        <?php } ?>
                    </dl>
                    <?php } ?>
                    <!-- loop spec 11/12 or misc -->
                    <?php if (empty($spec_12)) { ?>
                        <p class="font-weight-bold mb-0 ml-3"><?= $spec_11_title ?></p>
                    <?php } else { ?>
                        <p class="font-weight-bold mb-0 ml-3"><?= $spec_12_title ?></p>
                    <?php } ?>
                    
                    <dl class="row ml-1 mb-1">
                        <?php   if (empty($spec_12)){  
                                for ($i=0; $i<count($spec_11_specs); $i++) { 
                        ?>
                        <dt class="col-sm-5 mb-0"><small>
                        <?php 
                            if (empty($spec_11_specs[$i]['key'])){
                                $spec_11_specs[$i]['key'] = 'empty value';
                                echo $spec_11_specs[$i]['key'];
                            }
                            echo $spec_11_specs[$i]['key'];
                        ?>
                        </small></dt>
                        <?php   for ($j=0; $j<count($spec_11_specs[$i]['val']); $j++) { ?>
                        <dd class="col-sm-7 mb-0"><small>
                        <?php 
                            if (empty($spec_11_specs[$i]['val'][$j])){
                                $spec_11_specs[$i]['val'][$j] = '';
                                echo $spec_11_specs[$i]['val'][$j];
                            }
                            echo $spec_11_specs[$i]['val'][$j];
                        ?>
                        </small></dd>
                        <?php   } //end for $j
                                } // end for $i
                                } // end if 
                                else { 
                                for ($i=0; $i<count($spec_12_specs); $i++) { 
                        ?>
                        <dt class="col-sm-5 mb-0"><small><?= $spec_12_specs[$i]['key'] ?></small></dt>
                        <?php   for ($j=0; $j<count($spec_12_specs[$i]['val']); $j++) { ?>
                        <dd class="col-sm-7 mb-0"><small><?= $spec_12_specs[$i]['val'][$j] ?></small></dd>
                        <?php   } //end for $j
                                } //end for $i
                                } // end else
                        ?>
                    </dl>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="display-4 text-uppercase font-weight-bold text-center mb-0">Spesifikasi</h5>

                        <div class="p-5 bg-white rounded shadow mb-5">
                        <!-- Lined tabs-->
                        <ul id="specTab" role="tablist" class="nav nav-tabs nav-pills with-arrow lined flex-column flex-sm-row text-center">
                            <?php   for ($i=0; $i<count($phoneSpec)-1; $i++) {
                                $explode = explode(' ', $phoneSpec[$i]['title']);
                                $implode = implode('', $explode);
                            ?>
                            <li class="nav-item flex-sm-fill">
                                <a 
                                id="<?= $implode ?>-tab" 
                                data-toggle="tab" 
                                href="#<?= $implode ?>" 
                                role="tab" 
                                aria-controls="<?= $implode ?>" 
                                aria-selected="true"
                                class="nav-link text-uppercase font-weight-bold mr-sm-0 rounded-0
                                <?php 
                                switch ($implode) {
                                    case 'Network':
                                        echo 'active"';
                                        break;
                                    case 'Launch':
                                        echo 'd-none m-0 p-0';
                                        break;
                                    case 'Misc':
                                        echo 'd-none m-0 p-0';
                                        break;
                                    default:
                                        echo '';
                                        break;
                                }
                                ?>"
                                >
                                    <?= $phoneSpec[$i]['title'] ?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                        <div id="specTabContent" class="tab-content">
                        <?php   for ($i=0; $i<count($phoneSpec); $i++) {
                                $explode = explode(' ', $phoneSpec[$i]['title']);
                                $implode = implode('', $explode);
                        ?> 
                            <div 
                            id="<?= $implode ?>" 
                            role="tabpanel" 
                            aria-labelledby="<?= $implode ?>-tab"
                            class="tab-pane fade px-4 py-5
                            <?php
                            switch ($implode) {
                                case 'Network':
                                    echo 'show active"';
                                    break;
                                case 'Launch':
                                    echo 'd-none';
                                    break;
                                case 'Misc':
                                    echo 'd-none';
                                    break;
                                default:
                                    echo '';
                                    break;
                            } //end switch
                            
                            ?>  
                            ">
                                <!-- loop spesifikasi -->
                                <?php for ($j=0; $j<count($phoneSpec[$i]['specs']); $j++) { ?>
                                <dl class="row ml-1 mb-1">
                                    <dt class="col-sm-5 mb-0"><?= $phoneSpec[$i]['specs'][$j]['key'] ?></dt>
                                    <?php   for ($k=0; $k<count($phoneSpec[$i]['specs'][$j]['val']); $k++) { ?>
                                    <dd class="col-sm-7 mb-0"><?= $phoneSpec[$i]['specs'][$j]['val'][$k] ?></dd>
                                    <?php } ?>
                                </dl>
                                <?php } ?>
                            </div>
                            <?php 
                            } // end for $i
                            ?>
                        </div>
                        <!-- End lined tabs -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<!-- bahan copi -->
                    <!-- <dl class="row">
                        <dt class="col-sm-3">Description lists</dt>
                        <dd class="col-sm-9">A description list is perfect for defining terms.</dd>

                        <dt class="col-sm-3">Euismod</dt>
                        <dd class="col-sm-9">
                            <p>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</p>
                            <p>Donec id elit non mi porta gravida at eget metus.</p>
                        </dd>

                        <dt class="col-sm-3">Malesuada porta</dt>
                        <dd class="col-sm-9">Etiam porta sem malesuada magna mollis euismod.</dd>

                        <dt class="col-sm-3 text-truncate">Truncated term is truncated</dt>
                        <dd class="col-sm-9">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</dd>

                        <dt class="col-sm-3">Nesting</dt>
                        <dd class="col-sm-9">
                            <dl class="row">
                            <dt class="col-sm-4">Nested definition list</dt>
                            <dd class="col-sm-8">Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc.</dd>
                            </dl>
                        </dd>
                    </dl> -->