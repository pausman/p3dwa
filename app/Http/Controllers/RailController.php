<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RailController extends Controller
{

    /*
     * GET /rail/encodeRail
     */
    public function encodeRailCipher(Request $request)
    {
        return view('rail.encodeRail')->with([
            'ciphertext' => $request->session()->get('ciphertext', ''),
            'numberOfRails' => $request->session()->get('numberOfRails', 2),
            'textToEncode' => $request->session()->get('textToEncode', ''),
        ]);
    }

    /*
     * GET /rail//rail/encode-process
     * Take the form data validate it, encode it and return it.
     */
    public function encodeRailProcess(Request $request)
    {
        # Validate the request data
        $request->validate([
            'textToEncode' => 'required',
            'railsLength' => 'required|numeric|gte:1|lte:10',
        ]);
        # get the text to encode
        $textToEncode = $request->input('textToEncode', null);
        $railsLength = $request->input('railsLength', 3);

        # create the matrix to cipher plain text
        # rows = railsLength , columns = length(textToEncode)
        $rail = [[]];

        # filling the rail matrix to distinguish filled
        # spaces from blank ones
        for ($i = 0; $i < $railsLength; $i++)
            for ($j = 0; $j < strlen($textToEncode); $j++)
                $rail[$i][$j] = '\n';

        # to find the direction up or down the rail
        $dir_down = false;
        $row = 0;
        $col = 0;

        for ($i = 0; $i < strlen($textToEncode); $i++) {
            // check the direction of flow
            // reverse the direction if we've just
            // filled the top or bottom rail
            if ($row == 0 || $row == $railsLength - 1)
                $dir_down = !$dir_down;

            // fill the corresponding alphabet
            $rail[$row][$col++] = $textToEncode[$i];

            // find the next row using direction flag
            $dir_down ? $row++ : $row--;
        }

        //now we can construct the cipher using the rail matrix
        $result = "";
        for ($i = 0; $i < $railsLength; $i++)
            for ($j = 0; $j < strlen($textToEncode); $j++)
                if ($rail[$i][$j] != '\n')
                    $result = $result . $rail[$i][$j];

        return redirect('/rail/encodeRail')->with([
            'ciphertext' => $result,
            'railsLength' => $railsLength,
            'textToEncode' => $textToEncode
        ]);
    }

}
