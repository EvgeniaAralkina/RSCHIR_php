<?php

//header ("Content-type: image/png");  
	require_once 'pr6_dataGenerator.php';

function drawSegment($x0,$y0,$radius,$begAngle,$endAngle,$color)
{
	global $im,$x0,$y0,$black;
	imagefilledarc($im, $x0, $y0, $radius*2, $radius*2,
	    $begAngle, $endAngle,
	    $color, IMG_ARC_PIE);
	imagefilledarc($im, $x0, $y0, $radius*2, $radius*2,
	    $begAngle, $endAngle,
	    $black, IMG_ARC_EDGED | IMG_ARC_NOFILL);
}


function drawDiagram($dataArray,$colors,$x0,$y0,$radius)
{
	global $im,$x0,$y0,$black;

	$count=count($dataArray);

	$sumVal=array_sum($dataArray);

	$begAngle=0;

	$endAngle=floor($begAngle+
	(($dataArray[1]*100)/$sumVal)*360/100);


	drawSegment($x0,$y0,$radius,
	$begAngle,$endAngle,$colors[1]);

	for($i=2;$i<$count;$i++){
	    $begAngle=$endAngle;
	    $endAngle=floor($begAngle+
	        (($dataArray[$i]*100)/$sumVal)*360/100);
	        drawSegment($x0,$y0,$radius,
	        $begAngle,$endAngle,$colors[$i]);
	}
	//рисуем сегмент для последнего элемента массива
	$begAngle=$endAngle;
	$endAngle=360;
	drawSegment($x0,$y0,$radius,
	$begAngle,$endAngle,$colors[$count]);
}


	$im = @ImageCreate (500, 400);

	$x0=200; $y0=200;
	$radius=100;

	$mainArr = generate_data();
	$dataArray = graphAddress($mainArr);

	$colors = [
		0 => ImageColorAllocate ($im, 255, 255, 255), 
		1 => ImageColorAllocate ($im, 25, 25, 25), //white
		2 => ImageColorAllocate ($im, 0, 0, 0), //$black,
		3 =>ImageColorAllocate ($im, 255, 0, 0), //$red,
		4 =>  ImageColorAllocate ($im, 0, 255, 0), //$green,
		5 => ImageColorAllocate ($im, 0, 0, 255), // $blue,
		6 => ImageColorAllocate ($im, 255, 255, 0), //$yellow,
		7 => ImageColorAllocate ($im, 255, 0, 255), //$magenta,
		8 => ImageColorAllocate ($im, 0, 255, 255), //$cyan,
		9 => ImageColorAllocate ($im, 221, 221, 221), //$l_grey,
		10 => ImageColorAllocate ($im, 100, 100, 0), //$с1,
		11 => ImageColorAllocate ($im, 150, 221, 150), //$с2,
		12 => ImageColorAllocate ($im, 221, 150, 0), //$с3,
		13 => ImageColorAllocate ($im, 0, 0, 150), //$с4
	];

		$region =[
		1 => ' - Moskovskaya obl',
		2 => ' - Chelyabinskaya obl',
		3 => ' - Nizhegorodskaya obl',
		4 => ' - Volgogradskaya obl',
		5 => ' - Novosibirskaya obl',
		6 => ' - Murmanskaya obl',
		7 => ' - Orlovskaya obl',
		8 => ' - Archangelskaya obl',
		9 => ' - Smolenskaya obl',
		10 => ' - Tomskaya obl',
		11 => ' - Penzenskaya obl.',
		12 => ' - Pskovskaya obl',
		13 => ' - Other'
	];
	
	drawDiagram($dataArray,$colors,$x0,$y0,$radius);
	$xr0 = 325;
	$yr0 = 20;

	for($i=1;$i<14;$i++){
		ImageFilledRectangle ($im, $xr0, $yr0, $xr0+10, $yr0+10, $colors[$i]);
		ImageString ($im, 0, $xr0+15, $yr0, $region[$i], $colors[2]);
		$yr0 +=20;
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

// // Вывод и освобождение памяти
imagepng($im, 'pr6_pieChart.png');
imagedestroy($im);