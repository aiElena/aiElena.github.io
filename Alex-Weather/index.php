
<?php
$url = "http://api.openweathermap.org/data/2.5/weather?id=706483&lang=en&units=metric&appid=853437dd97c1de13d607d8ea9a4cbae4";
$contents = file_get_contents($url);

echo ($contents);

?>