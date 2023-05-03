
<?php


// $array = ["ac", "ad", "ct", "dt", "al", "am", "an", "at", "jp", "au", "fz", "az", "bn", "bg", "bh", "bl", "br", "bd", "bb", "cb", "db", "bs", "bo", "bw", "hd", "ba", ""];
// $cityName = array("ac" => "Agra", "ad" => "Agra", "ct" => "Aligarh", "dt" => "Aligarh", "al" => "Almora", "am" => "Ambala", "an" => "Ambedkar", "at" => "Amethi", "jp" => "Amroha", "au" => "Auraiya", "fz" => "Ayodhya", "az" => "Azamgarh", "bn" => "Badaun", "bg" => "Baghpat");
$array = ['agra-city'];

$date =  '2023/05/02';
$city = $array[0];

// get first page of city
$cityLink = 'https://epaper.amarujala.com/' . $city . '/' . str_replace('/', '', $date) . '/01.html?';
$content = file_get_contents($cityLink);

// get city code for each city
$select = explode('<div class="pinch-zoom"><img id="cropbox" usemap="#enewspaper" class="news-image  map" src="https://epaperwmimg.amarujala.com/2023/05/02/', $content);
$code = substr($select[1], 0, 2);

// loop for pages
for ($i = 1; $i < 30; $i++) {
    if ($i < 9)
        $pageNumber  = '0' . $i;
    else $pageNumber = $i;
    $link = 'https://epaperwmimg.amarujala.com/' . $date . '/' . $code . '/' . $pageNumber . '/hdimage.jpg';

    $content = file_get_contents($link);
    if (strlen($content) != 0) {
        $im = imagecreatefromstring($content);
        $formatCity = ucwords(str_replace('-city', '', $city));
        $path = dirname(__FILE__, 2) . "/" . "images/" . "AU_" . $formatCity  . "_" . str_replace('/', '-', $date) . "_ " . $pageNumber . "_hin.png";
        $content = imagepng($im, $path, 0);
    } else break;
}
?>
