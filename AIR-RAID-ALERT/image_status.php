<?php
$im = imagecreate(320, 196);

$COLOR = [];
for ($i = 0; $i < 16; $i++) { 
  $COLOR[$i] = imagecolorallocate($im, $i*16, $i*16, $i*16);
}
imagefill($im, 0, 0, $COLOR[15]);

$border = imageCreateFromPng('./ukraine/ukraine-border.png');
imagecopy($im, $border, 5, 2, 0, 0, 190, 130);

/*
01 	Автономна Республіка Крим
05 	Вінницька область
07 	Волинська область
12 	Дніпропетровська область
14 	Донецька область
18 	Житомирська область
21 	Закарпатська область
23 	Запорізька область
26 	Івано-Франківська область
32 	Київська область
35 	Кіровоградська область
44 	Луганська область
46 	Львівська область
48 	Миколаївська область
51 	Одеська область
53 	Полтавська область
56 	Рівненська область
59 	Сумська область
61 	Тернопільська область
63 	Харківська область
65 	Херсонська область
68 	Хмельницька область
71 	Черкаська область
73 	Чернівецька область
74 	Чернігівська область
80 	м. Київ
85 	м. Севастополь
*/

$actual = json_decode('{"id": 741, 
  "AIR": {"r1": 1, "r5": 0, "r7": 0, "r12": 0, "r14": 1, "r18": 0, "r21": 0, "r23": 1, "r26": 0, "r32": 0, "r35": 0, "r44": 1, "r46": 0, "r48": 0, "r51": 0, "r53": 0, "r56": 0, "r59": 0, "r61": 0, "r63": 0, "r65": 0, "r68": 0, "r71": 0, "r73": 0, "r74": 0, "r80": 0},
  "time": 1707039081,
  "NUCLEAR": {},
  "UNKNOWN": {},
  "CHEMICAL": {},
  "ARTILLERY": {},
  "URBAN_FIGHTS": {}
}', true);

$selregI = 46;
$selregS = 0;
foreach ($actual['AIR'] as $key => $value) {
  if ($value == 1) {
    $key = str_replace('r', '', $key);
    imagecopy($im, imageCreateFromPng('./ukraine/'.$key.'.png'), 5, 2, 0, 0, 190, 130);
    if ($key == $selregI) $selregS = 1;
  };
}
if ($selregS) {
  imagettftext($im, 16, 0, 180, 105, $COLOR[0], './Unicode.font.ttf', 'ПОВІТРЯНА');
  imagettftext($im, 20, 0, 180, 128, $COLOR[0], './Unicode.font.ttf', 'ТРИВОГА');
} else {
  imagettftext($im, 10, 0, 22, 148, $COLOR[0], './Unicode.font.ttf', "Львівська область - ок");
};

imagestring($im, 2, 22, 82, date('H:i', $actual['time']), $COLOR[0]);
imagestring($im, 2, 22, 96, '#'.$actual['id'], $COLOR[0]);

imagestringup($im, 1, 0, 162,  date('H:i dmy'), $COLOR[0]);

imagesavealpha($im, false);

header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>