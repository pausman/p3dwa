<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use KKiernan\CaesarCipher;
use Illuminate\Validation\Rule;

class CipherController extends Controller

{
    //
    public function index()
    {
        return view('index');
    }

    // put up  a form to get the info to encode.

    public function encodeCipher(Request $request)
    {
        return view('caesar.encodeCaesar')->with([
            'ciphertext' => $request->session()->get('ciphertext', ''),
            'shiftDirection' => $request->session()->get('shiftDirection', 'right'),
            'shiftLength' => $request->session()->get('shiftLength', 2),
            'textToEncode' => $request->session()->get('textToEncode', ''),
        ]);
    }

    // take the data from the form,encode it and return encoded
    public function encodeprocess(Request $request)
    {
        $request->validate([
            'textToEncode' => 'required',
            'shiftDirection' => 'required',Rule::in(['left', 'right']),
            'shiftLength' => 'required','min:1|max:25|size:2',
        ]);
        $textToEncode = $request ->input('textToEncode',null);
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
                'shiftDirection' => $request->input('shiftDirection', 'right'),
                'shiftLength' => $request->input('shiftLength', 2),
                'textToEncode' => $textToEncode
            ]);

        }
    }
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
    // from p2
    public function encodeText($shiftLength, $shiftDirection)
    {
        # account for the direction of the shift
        $shiftLength = $this->normalizeShiftDirection($shiftLength, $shiftDirection);

        # loop through each character in the input striing
        $encodedText = '';
        for ($pos = 0; $pos < strlen($this->textToEncode); $pos++) {
            $currentChar = ord($this->textToEncode[$pos]);

            # only encode alpha characters
            if (ctype_alpha($currentChar)) {
                # Encode upper and lower case
                if ($currentChar >= ord("a") and $currentChar <= ord("z")) {
                    $baseA = ord('a');
                } else {
                    $baseA = ord('A');
                }
                $encodedText[$pos] =
                    chr(((($currentChar + $shiftLength + $baseA) % $baseA) % 26) + $baseA);
            } else {
                # if not alpha just leave it in.
                $encodedText[$pos] = chr($currentChar);
            }
        }

        return $encodedText;
    }
}