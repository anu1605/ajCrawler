
<?php

// barabanki
$array = ["ac", "ad", "ct", "dt", "al", "am", "an", "at", "jp", "au", "fz", "az", "bn", "bg", "bh", "bl", "br", "bd", "bb"];
$cityName = array("ac" => "Agra");


$city = $array[0];
for ($i = 1; $i < 30; $i++) {
    if ($i < 9)
        $pageNumber  = '0' . $i;
    else $pageNumber = $i;
    $link = 'https://epaperwmimg.amarujala.com/2023/05/02/' . $city . '/' . $pageNumber . '/hdimage.jpg';
    $content = file_get_contents($link);
    if (strlen($content) != 0) {
        $im = imagecreatefromstring($content);
        $path = dirname(__FILE__, 2) . "/" . "images/" . "AU_" . $cityName[$city]  . "_2023-05-02_ " . $pageNumber . "_hin.png";
        $content = imagepng($im, $path, 0);
    } else break;
}

?>
