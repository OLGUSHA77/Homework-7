<?php

class GenerateImage
{
    public function generate($ss1,$ss2)
    {
        $myImage = imagecreatetruecolor(1000,700);

        $blueColor = imagecolorallocate($myImage,29,7,216);
        $blackColor = imagecolorallocate($myImage,0,0,0);

        $userFont = __DIR__ . '/assets/BudmoJiggerCyr.ttf';

        $filePNG = imagecreatefrompng(__DIR__ . '/assets/diplom.png');

        imagefilledrectangle($myImage,0,0,1000,700,$blueColor);
        imagecopy($myImage,$filePNG,0,0,0,0,1000,700);
        imagettftext($myImage,40,0,120,250,$blackColor,$userFont,$ss1);
        imagettftext($myImage,20,0,120,350,$blackColor,$userFont,$ss2);
        //вывод изображения
        header ('Content-Type: image/png');
        imagepng($myImage);
        imagedestroy($myImage);
    }
}