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
    <div class="row">
        <div class="col-md-12 text-center card-header bg-dark rounded mb-2">
            <h5 class="display-4"><?= $brandName ?></h5>
            <p class="lead"><strong><?= $phoneName ?></strong></p> 
        </div>
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
                        <?php for ($j=0; $j<count($spec_1_specs[$i]['val']); $j++) { ?>
                        <dd class="col-sm-7 mb-0"><small><?= $spec_1_specs[$i]['val'][$j] ?></small></dd>
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
                                for ($i=0; $i<count($spec_1_specs); $i++) { 
                        ?>
                        <dt class="col-sm-5 mb-0"><small><?= $spec_11_specs[$i]['key'] ?></small></dt>
                        <?php   for ($j=0; $j<count($spec_1_specs[$i]['val']); $j++) { ?>
                        <dd class="col-sm-7 mb-0"><small><?= $spec_11_specs[$i]['val'][$j] ?></small></dd>
                        <?php   } //end for $i
                                } // end for $j
                                } // end if 
                                else { 
                                for ($i=0; $i<count($spec_1_specs); $i++) { 
                        ?>
                        <dt class="col-sm-5 mb-0"><small><?= $spec_12_specs[$i]['key'] ?></small></dt>
                        <?php   for ($j=0; $j<count($spec_1_specs[$i]['val']); $j++) { ?>
                        <dd class="col-sm-7 mb-0"><small><?= $spec_12_specs[$i]['val'][$j] ?></small></dd>
                        <?php   } //end for $i
                                } //end for $j
                                } // end else
                        ?>
                    </dl>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="display-4 text-uppercase font-weight-bold text-center mb-0">Spesifikasi</h5>

                        <div class="p-5 bg-white rounded shadow mb-5">
                        <!-- Lined tabs-->
                        <ul id="myTab2" role="tablist" class="nav nav-tabs nav-pills with-arrow lined flex-column flex-sm-row text-center">
                            <li class="nav-item flex-sm-fill">
                                <a id="home2-tab" data-toggle="tab" href="#home2" role="tab" aria-controls="home2" aria-selected="true" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 active">Home</a>
                            </li>
                            <li class="nav-item flex-sm-fill">
                                <a id="profile2-tab" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile2" aria-selected="false" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0">Profile</a>
                            </li>
                            <li class="nav-item flex-sm-fill">
                                <a id="contact2-tab" data-toggle="tab" href="#contact2" role="tab" aria-controls="contact2" aria-selected="false" class="nav-link text-uppercase font-weight-bold rounded-0">Contact</a>
                            </li>
                        </ul>
                        <div id="myTab2Content" class="tab-content">
                            <div id="home2" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 show active">
                                <p class="leade font-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <p class="leade font-italic mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <div id="profile2" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5">
                                <p class="leade font-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <p class="leade font-italic mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <div id="contact2" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">
                                <p class="leade font-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <p class="leade font-italic mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
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