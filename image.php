<?php

require_once("user.php");

$image_url = $_GET['img'];
$image_height = $_GET['height'];
$image_width = $_GET['width'];

$urlCheck = stripos(PLEXURL, "http");

if ($urlCheck === false) {

    $plexAddress = "http://" . PLEXURL;

}else{
    
    $plexAddress = PLEXURL;
    
}

if(PLEXPORT !== ""){ $plexAddress = $plexAddress . ":" . PLEXPORT; }

//$plexAddress = PLEXURL.':'.PLEXPORT;

$addressPosition = strpos($image_url, $plexAddress);

if($addressPosition !== false && $addressPosition == 0) {
    
	$image_src = $plexAddress . '/photo/:/transcode?height='.$image_height.'&width='.$image_width.'&upscale=1&url=' . $image_url . '&X-Plex-Token=' . PLEXTOKEN;
    
	header('Content-type: image/jpeg');
    
	readfile($image_src);
    
} else {
    
    echo "Bad Plex Image Url";	
    
}
