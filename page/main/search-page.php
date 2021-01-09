<?php
$query = $_POST['query'];

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
$phones = $data['data']['phones'];

if ($last_page == 0) {
    $phones = null;
    echo '<p class="display-4 my-4">Pencarian tidak ditemukan</p>';
}

?>

