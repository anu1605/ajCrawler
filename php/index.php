
<?php



$array = ['agra-city',  'aligarh-city',  'almora', 'ambala', 'ambedkar-nagar', 'amethi', 'jpnagar', 'auraiya', 'faizabad', 'azamgarh', 'badaun', 'baghpat', 'bahraich', 'balia', 'balrampur', 'banda', 'barabanki', 'bareilly-city', 'basti', 'bhadohi', 'bhiwani', 'bhopal', 'bijnor', 'bilaspur', 'bulandsahar', 'chamba', 'chandauli', 'chandigarh-city', 'charkhi-dadri', 'dehradun-city', 'delhi-city', 'deoria', 'etawa', 'faridabad', 'farrukhabad', 'fatehabad', 'fatehpur', 'firozabad', 'garhwal', 'ghaziabad', 'ghazipur', 'gorakhpur-city', 'gorakhpur-dehat', 'greater-noida', 'gurgaon', 'hamirpur-dharamshala', 'hamirpur', 'hapur', 'hardoi', 'haridwar', 'hathras', 'hisar', 'jalandhar', 'jalaun', 'jammu-city', 'jounpur', 'jhajjar', 'jhansi-city', 'jind', 'kaithal', 'kangra', 'kannauj', 'kanpur-city', 'karnal', 'kasganj', 'kathua', 'kaushambi', 'kotdwar', 'kullu', 'kurukshetra', 'kushinagar', 'khiri', 'lalitpur', 'lucknow-city', 'mharajgunj', 'mainpuri', 'mandi', 'mathura', 'mau', 'meerut-city', 'mirzapur', 'mohali', 'moradabad-city', 'muzaffarnagar', 'haldwani', 'narnaul', 'noida', 'panchkula', 'panipat', 'pilibhit', 'pithoragarh', 'pratapgarh', 'allahabad-city', 'gangapar', 'raebareli', 'rajasthan', 'rampur', 'rewari', 'rishikesh', 'rishikesh', 'saharanpur-city', 'sambhal', 'santkabirnagar', 'shahjahanpur', 'shimla', 'siddharthnagar', 'sitapur', 'sonbhadra', 'sultanpur', 'udhampur', 'udhamsingh-nagar', 'una', 'unnao', 'varanasi-city', 'vikas-nagar', 'yamuna-nagar'];

$date =  '2023/05/02';




for ($i = 0; $i < count($array); $i++) {
    $city = $array[$i];
    // get first page of city
    $cityLink = 'https://epaper.amarujala.com/' . $city . '/' . str_replace('/', '', $date) . '/01.html?';
    $content = file_get_contents($cityLink);

    // get city code for each city
    $select = explode('<div class="pinch-zoom"><img id="cropbox" usemap="#enewspaper" class="news-image  map" src="https://epaperwmimg.amarujala.com/2023/05/02/', $content);
    $code = substr($select[1], 0, 2);

    // loop for pages
    for ($j = 1; $j < 30; $j++) {
        if ($j < 9)
            $pageNumber  = '0' . $j;
        else $pageNumber = $j;
        $link = 'https://epaperwmimg.amarujala.com/' . $date . '/' . $code . '/' . $pageNumber . '/hdimage.jpg';

        $content = file_get_contents($link);
        if (strlen($content) != 0) {
            $im = imagecreatefromstring($content);
            // $formatCity = ucwords(str_replace('-city', '', $city));
            $formatCity = ucfirst(explode('-', $city)[0]);
            $path = dirname(__FILE__, 2) . "/" . "images/" . "AU_" . $formatCity  . "_" . str_replace('/', '-', $date) . "_ " . $pageNumber . "_hin.png";
            $content = imagepng($im, $path, 0);
        } else break;
    }
}
?>
