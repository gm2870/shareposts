<?php
/**
 * Created by PhpStorm.
 * User: amirhossein
 * Date: 9/10/18
 * Time: 17:12
 */
session_start() ;

header("Content-Type: image/png");

$img = imagecreate(100 , 70) ;
imagecolorallocate($img  , 135, 211, 207) ;

$txtColor = imagecolorallocate($img , 37, 102, 206) ;

$code = randSTR(6) ;



imagestring($img , 20 , 10 , 30 , $code,$txtColor) ;

for( $i=0;$i<50;$i++){
    imagesetpixel($img , rand(0,100) , rand(0,100) , $txtColor) ;
}
for ($i=0;$i<5;$i++){
    imageline($img , rand(0,30) , rand(10,30) , rand(20,90) , rand(40,90) , $txtColor);
}

imagepng($img) ;
imagedestroy($img) ;

$_SESSION['code'] = $code ;



function randSTR($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
