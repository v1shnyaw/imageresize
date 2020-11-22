<?php
define('TARGET_WIDTH', 200);
define('TARGET_HEIGHT', 100);
function makeBanner ($filename, $resultFilename) { // функция принимает название исходного файла и  название результирующего файла
    $info   = getimagesize($filename);  // нахождение параметров исходного изображения
    $width  = $info[0];
    $height = $info[1];
    $img = imageCreateFromPng($filename); // создание изображения из файла
    $newImage = imageCreateTrueColor(TARGET_WIDTH, TARGET_HEIGHT); // создание новое полноцветное изображение
    $bgColor = imagecolorallocate($newImage,255, 255,255);
    imagefill($newImage, 0,0, $bgColor); // заливка фона нового изображения белым
    $proportion = ceil(TARGET_HEIGHT / ($height / $width)); // нахождение пропорций изображения
    /* след. строка -- копирование и изменение размера исходного изображения на новое изображение */
    imageCopyResampled($newImage, $img, (TARGET_WIDTH - $proportion) / 2, 0, 0, 0, $proportion, TARGET_HEIGHT, $width, $height);
    imagepng($newImage, $resultFilename); // сохранение результата
}
$initialImage = 'image.png';
$resultImage = 'result.png';
makebanner($initialImage, $resultImage);
include_once 'test.html';