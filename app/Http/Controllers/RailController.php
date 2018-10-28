<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RailController extends Controller
{
    //
    public function encodeRailCipher(Request $request)
    {
        return view('rail.encodeRail')->with([
            'ciphertext' => $request->session()->get('ciphertext', ''),
            'keyLength' => $request->session()->get('keyLength', 2),
            'textToEncode' => $request->session()->get('textToEncode', ''),
        ]);
    }

    public function ssencodeRailCipher()
    {
        $key = 3;
        $plaintext = 'Furtherreading';
// create the matrix to cipher plain text
        // key = rows , length(text) = columns
        $rail = [[]];

        // filling the rail matrix to distinguish filled
        // spaces from blank ones
        for ($i = 0; $i < $key; $i++)
            for ($j = 0; $j < strlen($plaintext); $j++)
                $rail[$i][$j] = '\n';

        // to find the direction
        $dir_down = false;
        $row = 0;
        $col = 0;

        for ($i = 0; $i < strlen($plaintext); $i++) {
            // check the direction of flow
            // reverse the direction if we've just
            // filled the top or bottom rail
            if ($row == 0 || $row == $key - 1)
                $dir_down = !$dir_down;

            // fill the corresponding alphabet
            $rail[$row][$col++] = $plaintext[$i];

            // find the next row using direction flag
            $dir_down ? $row++ : $row--;
        }

        //now we can construct the cipher using the rail matrix
        $result = "";
        for ($i = 0; $i < $key; $i++)
            for ($j = 0; $j < strlen($plaintext); $j++)
                if ($rail[$i][$j] != '\n')
                    $result = $result . $rail[$i][$j];
        dump($result);
        // return $result;

    }
    // This function receives cipher-text and key
// and returns the original text after decryption
    function decodRailCipher($cipher, $key)
    {
        // create the matrix to cipher plain text
$cipher = "GsGsekfrek eoe";
$key = 3;
        $rail = [[]];

        // filling the rail matrix to distinguish filled
        // spaces from blank ones
        for ($i = 0; $i < $key; $i++)
            for ($j = 0; $j < strlen($cipher); $j++)

                $rail[$i][$j] = '\n';

        // to find the direction

        $row = 0;
        $col = 0;

        // mark the places with '*'
        for ($i = 0; $i < strlen($cipher); $i++) {
            // check the direction of flow
            if ($row == 0) {
                $dir_down = true;
            }
            if ($row == $key - 1)
                $dir_down = false;

            // place the marker
            $rail[$row][$col++] = '*';

            // find the next row using direction flag
            $dir_down ? $row++ : $row--;
        }

// now we can construct the fill the rail matrix
        $index = 0;
        for ($i = 0; $i < $key; $i++)
            for ($j = 0; $j < strlen($cipher); $j++)
                if ($rail[$i][$j] == '*' && $index < strlen($cipher))
                    $rail[$i][$j] = $cipher[$index++];

        // now read the matrix in zig-zag manner to construct
        // the resultant text
        $result = '';

        $row = 0;
        $col = 0;
        for ($i = 0; $i < strlen($cipher); $i++) {
            // check the direction of flow
            if ($row == 0)
                $dir_down = true;
            if ($row == $key - 1)
                $dir_down = false;

            // place the marker
            if ($rail[$row][$col] != '*')
                $result = $result . $rail[$row][$col++];

            // find the next row using direction flag
            $dir_down ? $row++ : $row--;
        }
        dump($result);
//    return result;
    }
}
