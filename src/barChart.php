<?php
require_once '/var/www/html/pr6/fixtures.php';
function updateBar(){
    $largeurImage = 400;
    $hauteurImage = 300;
    $im = ImageCreate ($largeurImage, $hauteurImage)  
            or die ("Ошибка при создании изображения");          
    $blanc = ImageColorAllocate ($im, 255, 255, 255);  
    $noir = ImageColorAllocate ($im, 0, 0, 0);   
    $bleu = ImageColorAllocate ($im, 0, 0, 255);  

// function barGraph(){
	$mainArr = generate_data();
	$emails = graphEmail($mainArr);
	$emailNames=[
		0 => 'gmail',
		1 => 'rambler',
		2 => 'mail',
		3 => 'yandex',
		4 => 'hotmail',
		5 => 'other'
	];

ImageLine ($im, 10, $hauteurImage-10, $largeurImage-10, $hauteurImage-10, $noir);

for ($mois=1; $mois<=6; $mois++) {
ImageString ($im, 0, $mois*60, $hauteurImage-10, $emailNames[$mois-1], $noir);
}

ImageLine ($im, 10, 10, 10, $hauteurImage-10, $noir);

    $visitesMax = max($emails)+1;
     
    for ($mois=1; $mois<=6; $mois++) {
        $hauteurImageRectangle = round(($emails[$mois-1]*$hauteurImage)/$visitesMax);
        ImageFilledRectangle ($im, $mois*60-15, $hauteurImage-$hauteurImageRectangle, $mois*60+15, $hauteurImage-10, $bleu);

        ImageString ($im, 0, $mois*60-7, $hauteurImage-$hauteurImageRectangle-10, $emails[$mois-1], $noir);
    }


$stamp = imagecreatetruecolor(100, 70);
imagefilledrectangle($stamp, 0, 0, 99, 69, 0x0000FF);
imagefilledrectangle($stamp, 9, 9, 90, 60, 0xFFFFFF);
imagestring($stamp, 4, 20, 20, 'Belkin', 0x0000FF);
imagestring($stamp, 4, 20, 40, 'G.A.', 0x0000FF);

// Установка полей для штампа и получение высоты/ширины штампа
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 50);

     
    imagepng($im, 'pr6_barGraph.png');
	imagedestroy($im); 
}