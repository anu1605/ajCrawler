<?php

$content = file_get_contents("https://epaper.amarujala.com/balia/20230502/01.html?format=img&ed_code=balia");
// $select = explode('<select id="subs_login_nkit_country_code">', $content);
// $select2 = explode('</select>', $select[1]);
// $newSelect = str_replace("\n", "", str_replace(" ", "", $select[1]));
// $select3 = array_filter(explode('<optiondata-countryCode="', $newSelect));
// // print_r($select3);
// function subString($s)
// {
//     return strtolower(substr($s, 0, 2));
// }
// print_r(array_map('substring', $select3));
// echo $select[1];
// echo $newSelect2;
// print_r($select3);
$selct = explode('<div class="hamburger-menu">
<i class="e_sprite three_bar"></i>
</div>', $content);
echo $content;
