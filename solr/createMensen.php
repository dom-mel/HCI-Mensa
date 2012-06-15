<?php

header('Content-Type: text/xml; charset=utf-8');
error_reporting(0);

$mensen = json_decode(file_get_contents('https://raw.github.com/jprberlin/mensen/master/mensen.json'));
$mensen = $mensen->mensen;

$allMensen = json_decode(file_get_contents('http://www.studentenwerk-berlin.de/mensafeed/mensen/'));
$allMensen = prepareMensaFeed($allMensen);

echo "<add>\n";
foreach ($mensen as $id => $data) {
    echo "\t<doc>\n";
    outTag('id', $id);
    outTag('title', $allMensen[$id]->mensa_title);
    outTag('name', $data->name);
    outTag('address', $data->address);
    outTag('zip', $data->postalcode);
    outTag('lat', $data->lat);
    outTag('lng', $data->lng);
    outTag('mensacard_only', $allMensen[$id]->mensacard_only);
    outTag('district', getDistrict($data->postalcode));
    outTag('imageUrl', $data->image_url);
    outTag('webUrl', $data->web_url);
    outTag('opening_hours', $data->opening_hours);

    echo "\t</doc>\n";
}
echo '</add>';


function getDistrict($zip) {
    $zip = intval($zip);
    if (in_array($zip, array(10115,10117,10119,10178,10179))) {
        return 'Berlin-Mitte';
    }
    if (in_array($zip, array(10243,10245,10247,10249))) {
        return 'Friedrichshain';
    }

    if (in_array($zip, array(10318,10319))) {
        return 'Lichtenberg';
    }

    if (in_array($zip, array(10551))) {
        return 'Tiergarten';
    }
    if (in_array($zip, array(10405,10407,10409,10435,10437,10439))) {
        return 'Prenzlauer Berg';
    }
    if (in_array($zip, array(10585,10587,10589,10623,10625,10627,10629))) {
        return 'Charlottenburg';
    }
    if (in_array($zip, array(10823,10825,10827,10829))) {
        return 'Schöneberg';
    }
    if (in_array($zip, array(10961,10963,10965,10967,10969,10997,10999))) {
        return 'Kreuzberg';
    }
    if (in_array($zip, array(12043,12045,12047,12049,12051,12053,12055,12057,12059))) {
        return 'Neukölln';
    }
    if (in_array($zip, array(12157,12161,12163,12165,12167,12169))) {
        return 'Steglitz';
    }
    if (in_array($zip, array(12203,12205,12207,12209))) {
        return 'Lichterfelde';
    }
    if (in_array($zip, array(12247,12249))) {
        return 'Lankwitz';
    }
    if (in_array($zip, array(12277,12279))) {
        return 'Marienfelde';
    }
    if (in_array($zip, array(12305,12307,12309))) {
        return 'Lichtenrade';
    }
    if (in_array($zip, array(12487,12489))) {
        return 'Adlershof';
    }
    if (in_array($zip, array(12555,12557,12559))) {
        return 'Köpenick';
    }
    if (in_array($zip, array(12679,12681,12683,12685,12687,12689))) {
        return 'Marzahn';
    }
    if (in_array($zip, array(13086,13088,13089))) {
        return 'Weißensee';
    }
    if (in_array($zip, array(13187,13189))) {
        return 'Pankow';
    }
    if (in_array($zip, array(13347,13349,13351,13353,13355,13357,13359))) {
        return 'Wedding';
    }
    if (in_array($zip, array(13403,13405,13407,13409))) {
        return 'Reinickendorf';
    }
    if (in_array($zip, array(13435,13437,13439))) {
        return 'Wittenau';
    }
    if (in_array($zip, array(14109))) {
        return 'Wannsee';
    }
    if (in_array($zip, array(14163,14165,14167,14169))) {
        return 'Zehlendorf';
    }
    return '';
}

function prepareMensaFeed($feed) {
    $result = array();

    foreach ($feed->mensen as $mensa) {
        $result[$mensa->mensa_ID] = $mensa;
    }
    return $result;
}

function outTag($name, $value) {
    $value = trim($value);
    echo "\t\t";
    printf('<field name="%s"><![CDATA[%s]]></field>', $name, $value);
    echo "\n";
}
