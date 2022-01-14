<?php
function contentСoordination() {

# получение темы браузера (тема перестала отправляться в cookie)

// $color_scheme = stristr(apache_request_headers()["Cookie"], 'color_scheme=');
// $color_scheme = explode("=", $color_scheme)[1];

// # вывод всех заголовков

// echo "<pre>";
// print_r (apache_request_headers());
// echo "<pre>";
// # #

// echo $color_scheme;

// if ($color_scheme === 'dark'){
// 	$_SESSION['bgcolor'] = '#2c2730';
// 	$_SESSION['font'] = 'white';
// }
// else{
//   	$_SESSION['bgcolor'] = 'white';
//   	$_SESSION['font'] = '#2c2730';
// }


if ($_COOKIE["color_scheme"]=== 'dark'){
  $_SESSION['bgcolor'] = '#2c2730';
  $_SESSION['font'] = 'white';
}
else{
    $_SESSION['bgcolor'] = 'white';
    $_SESSION['font'] = '#2c2730';
}
# # # # #
# получение языка

$acceptLanguage = apache_request_headers()["Accept-Language"];
$_SESSION['acceptLanguage'] = substr($acceptLanguage,0,2);

# # # # #
# установка имени
$_SESSION['name'] = $_SERVER['PHP_AUTH_USER'];



}

function sayHi() {
	echo "
 		<body bgcolor=\"{$_SESSION['bgcolor']}\">
 			<font color=\"{$_SESSION['font']}\">
 			";
	echo (($_SESSION['acceptLanguage']==='ru') ? ("<h1>привет, ") : ("<h1>hello "));
	echo "{$_SESSION['name']}!</h1><br/>";

	echo "
 			</font>
 		</body>
 		";
}
?>



<script src="https://cdn.jsdelivr.net/npm/js-cookie/dist/js.cookie.min.js"></script>

  <script>
    // code to set the `color_scheme` cookie
    var $color_scheme = Cookies.get("color_scheme");
    function get_color_scheme() {
      return (window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)").matches) ? "dark" : "light";
    }
    function update_color_scheme() {
      Cookies.set("color_scheme", get_color_scheme());
    }
    // read & compare cookie `color-scheme`
    if ((typeof $color_scheme === "undefined") || (get_color_scheme() != $color_scheme)){
      window.location.reload();
      update_color_scheme();
    }
    // detect changes and change the cookie
    if (window.matchMedia)
      window.matchMedia("(prefers-color-scheme: dark)").addListener( update_color_scheme );
  </script>