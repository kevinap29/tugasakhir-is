<?php

function imageResize($imageSrc,$imageWidth,$imageHeight) {

    $newImageWidth =300;
    $newImageHeight =300;

    $newImageLayer=imagecreatetruecolor($newImageWidth,$newImageHeight);
    imagecopyresampled($newImageLayer,$imageSrc,0,0,0,0,$newImageWidth,$newImageHeight,$imageWidth,$imageHeight);

    return $newImageLayer;
}

?>