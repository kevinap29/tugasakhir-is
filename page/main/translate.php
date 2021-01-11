<?php
if (isset($_POST['btnTranslate'])) {
    $country = (isset($_POST['country'])) ? $_POST['country'] : '';
    $text = (isset($_POST['text'])) ? $_POST['text'] : '';
    
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api-translate.azharimm.tk/translate?engine=google&text='.urlencode($text).'&to='.$country.'',
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
        $hasil = json_decode($response, true);

        $translate = ($hasil['data']['result']);
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <p class="display-4 my-4">API Google Translate</p>
            
            <form method="post">
                <div class="row">
                    <div class="card col-md-5 ml-auto p-0 mt-3">
                        <div class="card-body p-1 ">
                            <div class="form-group">
                                <select class="custom-select" name="country" id="country">
                                    <option selected disabled>Pilih bahasa</option>
                                    <?php
                                    $country = (object)array();
                                    $country->code = array(
                                        'id',
                                        'en',
                                        'de',
                                        'ja'
                                    );
                                    $country->name = array(
                                        'Indonesia',
                                        'English',
                                        'German',
                                        'Japanesse'
                                    );

                                    $country_json = json_encode($country);
                                    $data = json_decode($country_json);
                                    $code = $data->code;
                                    $name = $data->name;
                                    $count = count($code);
                                    for ($i=0; $i < $count ; $i++) { 
                                        echo '<option value="'.$code[$i].'">'.$name[$i].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="card col-md-5">
                        <div class="card-body text-dark">
                            <label for="text">Text : Detected Automaticlly</label>
                            <textarea class="form-control" name="text" id="text" rows="4"><?php if(empty($text)){echo '';}else {echo $text;}?></textarea>
                        </div>
                    </div>
                    <div class="col-md-2 mt-5">
                        <button type="submit" name="btnTranslate" id="btnTranslate" class="btn btn-secondary btn-lg btn-block">Translate</button>
                    </div>
                    <div class="card col-md-5 ml-auto">
                        <div class="card-body text-dark">
                            <label for="hasil">Text : Translated</label>
                            <textarea id="hasil" class="form-control bg-secondary text-white" rows="4"><?php if(empty($translate)){echo '';}else {echo $translate;}?></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>