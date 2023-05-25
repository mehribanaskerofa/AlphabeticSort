<?php

yeniAd('BMW');

function yeniAd($ad){
    $filename="data.txt";

    $array=readfromFile($filename);

    array_push($array,$ad);
    sort($array);

    writetoFile($filename,$array);

}


function readfromFile($filename):array
{
    $fp = @fopen($filename, 'r');

    if ($fp) {
        $array = explode("\n", fread($fp, filesize($filename)));
    }
    fclose($fp);
    return $array;
}

function writetoFile($filename,$array)
{
    $handle = fopen($filename, 'w');

    if ($handle) {

        foreach ($array as $line) {
            fwrite($handle, $line . PHP_EOL);
        }

        fclose($handle);
    }

}