<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use KKiernan\CaesarCipher;

class CipherController extends Controller

{
    /*
     * GET /
     * Main Page of the app
     */
    public function index()
    {
        return view('index');
    }

    /*
     * GET /caesar/encodecipher
     * Caesar Cipher Page with form
     */

    public function encodeCipher(Request $request)
    {
        return view('caesar.encodeCaesar')->with([

            'ciphertext' => $request->session()->get('ciphertext', ''),
            'shiftDirection' => $request->session()->get('shiftDirection', 'left'),
            'shiftLength' => $request->session()->get('shiftLength', 2),
            'textToEncode' => $request->session()->get('textToEncode', ''),
        ]);
    }

    /*
     * GET /caesar/encode-process
     * process the form data and display the results
     */
    public function encodeprocess(Request $request)
    {
        # Validate the request data
        $request->validate([
            'textToEncode' => 'required',
            'shiftDirection' => 'required|in:"left", "right"',
            'shiftLength' => 'required|numeric|gte:1|lte:25',
        ]);
        $textToEncode = $request->input('textToEncode', null);

        # If there is text to encode, encode it.
        if ($textToEncode) {
            $ciphertext = '';
            # account for the direction of the shift
            $shiftDirection = $request->input('shiftDirection', 'right');
            $shiftLength = $request->input('shiftLength', 2);
            $shiftLength = $this->normalizeShiftDirection($shiftLength, $shiftDirection);
            $cipher = new CaesarCipher();
            $ciphertext = $cipher->encrypt($textToEncode, $shiftLength);

            return redirect('/caesar/encodeCipher')->with([
                'ciphertext' => $ciphertext,
                'shiftDirection' => $shiftDirection,
                'shiftLength' => $shiftLength,
                'textToEncode' => $textToEncode
            ]);
        }
    }

    /*
     * private function to deal negative shifts
     */
    private function normalizeShiftDirection($shiftLength, $shiftDirection)
    {
        # fix length if the want to shift left
        if ($shiftDirection == 'left') {
            $shiftLength2 = 26 - $shiftLength;
        } else {
            $shiftLength2 = $shiftLength;
        }

        return $shiftLength2;
    }
}