<?php

namespace App\Http\Controllers;

class RailCipherController extends Controller
{
    //
    public function encodeRailCipher($key,$plaintext)
    {
// create the matrix to cipher plain text
        // key = rows , length(text) = columns
        $rail = array(array());


    // filling the rail matrix to distinguish filled
    // spaces from blank ones
    for ($i=0; $i < $key; $i++)
        for ($j = 0; $j < strlen($plaintext); $j++)
            $rail[$i][$j] = '\n';

    // to find the direction
    $dir_down = false;
    $row = 0, $col = 0;

    for ($i=0; $i < strlen($plaintext); $i++)
    {
        // check the direction of flow
        // reverse the direction if we've just
        // filled the top or bottom rail
        if ($row == 0 || $row == $key-1)
            $dir_down = !$dir_down;

        // fill the corresponding alphabet
        $rail[$row][$col++] = $plaintext[$i];

        // find the next row using direction flag
        $dir_down?$row++ : $row--;
    }

    //now we can construct the cipher using the rail matrix
    $result = "";
    for ($i=0; $i < $key; $i++)
        for ($j=0; $j < strlen($plaintext); $j++)
            if ($rail[$i][$j]!='\n')
                $result = $result . $rail[$i][$j];

    return $result;

    }
}
