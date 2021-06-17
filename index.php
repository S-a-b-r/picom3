<?php
function getRand(){
    $out = "";
    for($i = 0;$i<5;$i++){
        $out.=rand(0,9);
    }
    return $out;
}
$draw = new ImagickDraw();
$draw->setFillColor("black");
$draw->setStrokeColor('black');
$draw->setFontSize(52);//Размер шрифта
$draw->rotate(rand(0,10));
$draw->rectangle(0,30,400,35);
$draw->rotate(rand(-10,0));
$draw->annotation(20, 60, getRand());//Текст капчи


$canvas = new Imagick();
$canvas->newImage(180, 90, "blue");
$canvas->drawImage($draw);

//Задание шумов
$canvas->adaptiveBlurImage(18,7);
$canvas->addNoiseImage(2);


$canvas->setImageFormat('png');

header("Content-Type: image/png");
echo $canvas;
?>