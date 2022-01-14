<?php
	require_once 'pr6_dataGenerator.php';
function updateLine(){
$mainArr = generate_data();
	$ages = graphAge($mainArr);
	$rangrAge=[
		0 => '10-19',
		1 => '20-29',
		2 => '30-39',
		3 => '40-49',
		4 => '50-59',
		5 => '60-69',
		6 => '70-79',
		7 => '80-89',
		8 => '90-99'
	];

    $largeurImage = 400;
    $hauteurImage = 300;
    $im = ImageCreate ($largeurImage, $hauteurImage)  
            or die ("Ошибка при создании изображения");          
    $blanc = ImageColorAllocate ($im, 255, 255, 255);  
    $noir = ImageColorAllocate ($im, 0, 0, 0);   
    $bleu = ImageColorAllocate ($im, 0, 0, 255);  

ImageLine ($im, 10, $hauteurImage-10, $largeurImage-10, $hauteurImage-10, $noir);

for ($mois=1; $mois<=9; $mois++) {
ImageString ($im, 0, $mois*40, $hauteurImage-10, $rangrAge[$mois-1], $noir);
}

ImageLine ($im, 10, 10, 10, $hauteurImage-10, $noir);

    $visitesMax = max($ages)+1;

    $b = $hauteurImage-round(($ages[0]*$hauteurImage)/$visitesMax)-10;
    ImageString($im, 10, 40-3, $b-13, '.', $bleu);
    ImageString ($im, 0, 40, $b-15, $ages[0], $noir);

    for ($mois=1; $mois<9; $mois++) {

    	$a = $hauteurImage-round(($ages[$mois-1]*$hauteurImage)/$visitesMax)-10;
    	$b = $hauteurImage-round(($ages[$mois]*$hauteurImage)/$visitesMax)-10;

    	ImageLine ($im, $mois*40, $a, ($mois+1)*40, $b, $bleu);
    	ImageString($im, 10, ($mois+1)*40-3, $b-13, '.', $bleu);
    	ImageString ($im, 0, ($mois+1)*40, $b-15, $ages[$mois], $noir);

    }


$stamp = imagecreatetruecolor(100, 70);
imagefilledrectangle($stamp, 0, 0, 99, 69, 0x0000FF);
imagefilledrectangle($stamp, 9, 9, 90, 60, 0xFFFFFF);
imagestring($stamp, 4, 20, 20, 'Aralkina', 0x0000FF);
imagestring($stamp, 4, 20, 40, 'Evgenia', 0x0000FF);

// Установка полей для штампа и получение высоты/ширины штампа
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 50);

     
    imagepng($im, 'pr6_lineGraph.png');
	imagedestroy($im); 
}

