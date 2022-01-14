<?php

require __DIR__ .'/vendor/autoload.php';

 function generate_data(){
	$faker = Faker\Factory::create('RU_RU');

	$fixtures = [];
	for ($i = 0; $i < 50; $i++){
		$fixtures[$i] =
			[
				'id' => $i,
				'name' => $faker->name,
				'email' => $faker->freeEmail,
				'age' => $faker->biasedNumberBetween($min = 10, $max = 99),
				'address'=> $faker->address,
				'password' => $faker->biasedNumberBetween($min = 1000, $max = 9999)
			];
		}

	return $fixtures;
}


function graphEmail($arr){
	$email = [
		0 => 0, //gamil
		1 => 0, //rambler
		2 => 0, //mail
		3 => 0, //yandex
		4 => 0, //hotmail
		5 => 0 //other
	];

	for ($i = 0; $i < count($arr); $i++){
		switch (strstr($arr[$i]['email'],'@')) {
			case '@gmail.com':
				$email[0] +=1;
				break;
			case '@rambler.ru':
				$email[1] +=1;
				break;
			case '@list.ru';
			case'@bk.ru';
			case '@mail.ru':
				$email[2] +=1;
				break;
			case '@ya.ru';
			case '@yandex.ru':
				$email[3] +=1;
				break;
			case '@hotmail.com':
				$email[4] +=1;
				break;
			default:
				$email[5] += 1;
				break;
		}
	}
	return $email;	

}

function graphAddress($arr){
	$region =[
		1 => 0, //mo
		2 => 0, //'che'
		3 => 0, //'nn'
		4 => 0, //'vo'
		5 => 0, //'nov'
		6 => 0, //'mur'
		7 => 0, //'orl'
		8 => 0, //'arch'
		9 => 0, //'smol'
		10 => 0, //'tom'
		11 =>0, //'pen'
		12 => 0, //'psk'
		13 => 0 //'other'
	];
	
	for ($i = 0; $i < count($arr); $i++){
		switch (strstr(strstr($arr[$i]['address'], ' '), ',', true)) {
			case ' Смоленская область':
				$region[9] +=1;
					break;
			case ' Томская область':
				$region[10] +=1;
					break;
			case ' Пензенская область':
				$region[11] +=1;
					break;
			case ' Псковская область':
				$region[12] +=1;
					break;
			case ' Московская область':
				$region[1] +=1;
				break;
			case ' Челябинская область':
				$region[2] +=1;
				break;
			case ' Нижегородская область':
				$region[3] +=1;
				break;
			case ' Волгоградская область':
				$region[4] +=1;
				break;
			case ' Новосибирская область':
				$region[5] +=1;
				break;
			case ' Мурманская область':
				$region[6] +=1;
				break;
			case ' Орловская область':
				$region[7] +=1;
				break;
			case ' Архангельская область':
				$region[8] +=1;
				break;
			default:
				$region[9] += 1;
				break;
		}
	}

	return $region;

}

function graphAge($arr){
	$age = [
		0 => 0, //10-19
		1 => 0, //20-19
		2 => 0, //30-39
		3 => 0, //40-49
		4 => 0, //50-59
		5 => 0, //60-69
		6 => 0, //70-79
		7 => 0, //80-89
		8 => 0 //90-99
	];

	for ($i = 0; $i < count($arr); $i++){
		switch ($arr[$i]) {
			case ($arr[$i]['age']>9 && $arr[$i]['age']<20):
				$age[0] +=1;
				break;
			case ($arr[$i]['age']>19 && $arr[$i]['age']<30):
				$age[1] +=1;
				break;
			case ($arr[$i]['age']>29 && $arr[$i]['age']<40):
				$age[2] +=1;
				break;
			case ($arr[$i]['age']>39 && $arr[$i]['age']<50):
				$age[3] +=1;
				break;
			case ($arr[$i]['age']>49 && $arr[$i]['age']<60):
				$age[4] +=1;
				break;
			case ($arr[$i]['age']>59 && $arr[$i]['age']<70):
				$age[5] +=1;
				break;
			case ($arr[$i]['age']>69 && $arr[$i]['age']<80):
				$age[6] +=1;
				break;
			case ($arr[$i]['age']>79 && $arr[$i]['age']<90):
				$age[7] +=1;
				break;
			default:
				$age[8] += 1;
				break;
		}
	}

	return $age;		
}