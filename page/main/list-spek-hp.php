<?php
$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "https://api-mobilespecs.azharimm.tk/brands",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_HTTPGET => array(
    
),
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
$data = json_decode($response, true);
$count = count($data);	
?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <p class="display-4 my-4">API Spek HP</p>
            <div class="row">
            <?= $data['page'] ?>
            </div>
        </div>
    </div>
</div>