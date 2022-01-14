<?php
require_once 'pr6_lineGraph.php';
require_once 'pr6_pieChart.php';
require_once 'pr6_barChart.php';
updateLine();
//updatePie();
updateBar();

echo "
<h1> Статистика сайта </h1>
<a href=\"http://localhost/pr6_pieChart.php\"> pie chart </a?><br>

<img src=\"pr6_barGraph.png\">
<img src=\"pr6_lineGraph.png\">
<img src=\"pr6_pieChart.png\">
";