<?php

define("GELDEENHEDEN", [50, 20, 10, 5, 2, 1, 0.5, 0.2, 0.1, 0.05]);
define("AANTALCENTENINEURO", 100);

valideerInput($argv);

$teruggave = parseNaarGetal($argv[1]);
$teruggave = converteerNaarDichtstbijzijnde5Cent($teruggave);

if ($teruggave == 0) {
    exit("U krijgt geen geld terug" . PHP_EOL);
}

$resultaat = berekenTeruggaveInMunten($teruggave);

printResultaat($resultaat);

//////////////////
/// Help Functies
//////////////////

function berekenTeruggaveInMunten($teruggave)
{
    $muntenOverzicht = array();

    foreach (GELDEENHEDEN as $geldEenheid) {
        $geldEenheid *= AANTALCENTENINEURO;
        if ($teruggave >= $geldEenheid){
            $aantalKeerMuntPastInRestBedrag = floor($teruggave / $geldEenheid);
            $teruggave = $teruggave % $geldEenheid;

            $muntenOverzicht[strval($geldEenheid)] = $aantalKeerMuntPastInRestBedrag;
        }

    }

    return $muntenOverzicht;
}

function printResultaat($muntenOverzicht) {
    $resultaat = "";

    foreach ($muntenOverzicht as $geldEenheid => $aantal) {
        if($geldEenheid >= AANTALCENTENINEURO) {
            $resultaat .= "$aantal x " . $geldEenheid / AANTALCENTENINEURO . " euro";
        } else {
            $resultaat .= "$aantal x " . $geldEenheid . " cent";
        }
        $resultaat .= PHP_EOL;
    }
    echo $resultaat;
}

function converteerNaarDichtstbijzijnde5Cent($bedrag) {
    return round($bedrag * AANTALCENTENINEURO / 5) * 5;
}

/**
 * Valideer of de applicatie correct is aangeroepen
 *
 * @param $arguments
 */
function valideerInput($arguments)
{
    if (count($arguments) != 2) {
        exit("Verkeerd aantal argumenten. Roep de applicatie aan op de volgende manier: `wissel.php <bedrag>`" . PHP_EOL);
    }
}

/**
 * Probeer de input naar een getal te veranderen, als dit niet lukt dan stopt de applicatie.
 *
 * @param $value
 * @param $veldNaam
 * @return int
 */
function parseNaarGetal($value)
{
    if (!is_numeric($value)) {
        exit("Input moet een valide getal zijn" . PHP_EOL);
    } else {
        return floatval($value);
    }
}

?>