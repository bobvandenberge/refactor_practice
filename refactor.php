<?php

// Voer dit programma uit
function voerProgrammaUit($arguments)
{
    if (count($arguments) != 2) {
        exit("Verkeerd aantal argumenten. Roep de applicatie aan op de volgende manier: `wissel.php <bedrag>`" . PHP_EOL);
    }

    if (!is_numeric($arguments[1])) {
        exit("Input moet een valide getal zijn" . PHP_EOL);
    } else {
        $parseNaarGetal = floatval($arguments[1]);
    }

    $teruggave = $parseNaarGetal;
    $teruggave = round($teruggave * 100 / 5) * 5;

    if ($teruggave == 0) {
        exit("U krijgt geen geld terug" . PHP_EOL);
    }

    $teruggave1 = $teruggave;
    $muntenOverzicht = array();

    $geldEenheid = 50 * 100;
    if ($teruggave1 >= $geldEenheid) {
        $aantalKeerMuntPastInRestBedrag = floor($teruggave1 / $geldEenheid);
        $teruggave1 = $teruggave1 % $geldEenheid;

        $muntenOverzicht[strval($geldEenheid)] = $aantalKeerMuntPastInRestBedrag;
    }

    $geldEenheid = 20 * 100;
    if ($teruggave1 >= $geldEenheid) {
        $aantalKeerMuntPastInRestBedrag = floor($teruggave1 / $geldEenheid);
        $teruggave1 = $teruggave1 % $geldEenheid;

        $muntenOverzicht[strval($geldEenheid)] = $aantalKeerMuntPastInRestBedrag;
    }

    $geldEenheid = 10 * 100;
    if ($teruggave1 >= $geldEenheid) {
        $aantalKeerMuntPastInRestBedrag = floor($teruggave1 / $geldEenheid);
        $teruggave1 = $teruggave1 % $geldEenheid;

        $muntenOverzicht[strval($geldEenheid)] = $aantalKeerMuntPastInRestBedrag;
    }

    $geldEenheid = 5 * 100;
    if ($teruggave1 >= $geldEenheid) {
        $aantalKeerMuntPastInRestBedrag = floor($teruggave1 / $geldEenheid);
        $teruggave1 = $teruggave1 % $geldEenheid;

        $muntenOverzicht[strval($geldEenheid)] = $aantalKeerMuntPastInRestBedrag;
    }

    $geldEenheid = 2 * 100;
    if ($teruggave1 >= $geldEenheid) {
        $aantalKeerMuntPastInRestBedrag = floor($teruggave1 / $geldEenheid);
        $teruggave1 = $teruggave1 % $geldEenheid;

        $muntenOverzicht[strval($geldEenheid)] = $aantalKeerMuntPastInRestBedrag;
    }


    $geldEenheid = 1 * 100;
    if ($teruggave1 >= $geldEenheid) {
        $aantalKeerMuntPastInRestBedrag = floor($teruggave1 / $geldEenheid);
        $teruggave1 = $teruggave1 % $geldEenheid;

        $muntenOverzicht[strval($geldEenheid)] = $aantalKeerMuntPastInRestBedrag;
    }

    $resultaat = "";

    foreach ($muntenOverzicht as $geldEenheid => $aantal) {
        if ($geldEenheid >= 100) {
            $resultaat .= "$aantal x " . $geldEenheid / 100 . " euro";
        } else {
            $resultaat .= "$aantal x " . $geldEenheid . " cent";
        }
        $resultaat .= PHP_EOL;
    }
    echo $resultaat;
}

voerProgrammaUit($argv);