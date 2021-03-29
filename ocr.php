<?php
header('content-type:image/png');
//$img = imagecreatetruecolor(100, 100);
$img = imagecreatefrompng ('logo.png') ;
$zold = imagecolorallocate($img, 0, 255, 0);
$feher = imagecolorallocatealpha($img, 255, 255, 255, 50);
$adatok = getimagesize('logo.png');
$w = $adatok[0];
$h = $adatok[1];

for($y = 0; $y < $h; $y++){
        for($x = 0; $x < $w; $x++){
            $rgb = imagecolorat($img, $x, $y);
            $r = ($rgb >> 16) & 0xFF;
            $g = ($rgb >> 8) & 0xFF;
            $b = $rgb & 0xFF;
            if($b > 220 && $g > 220 && $r > 220){
                imagesetpixel($img, $x, $y, imagecolorallocate($img, 0, 0, 0));
            }
            else{
                imagesetpixel($img, $x, $y, imagecolorallocate($img, 255, 255, 255));
            }
        }
}
imagepng($img);
imagedestroy($img);
?>