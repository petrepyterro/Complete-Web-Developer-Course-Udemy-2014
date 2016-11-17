<?php
$city = $_GET['city'];
$city = str_replace(" ", "-", $city);
$contents =  file_get_contents("http://www.weather-forecast.com/locations/" . $city ."/forecasts/latest");

$codeSec = '3 Day Weather Forecast Summary:<\/b> <span class="phrase">';
$codeMain = '3 Day Weather Forecast Summary:<\/b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">';

preg_match("/" . $codeMain . "(.*?)</s", $contents, $matches);
if (isset($matches[1])){
  echo $matches[1];
} else {
  preg_match("/" . $codeSec . "(.*?)</s", $contents, $matches);
  echo $matches[1];
}



