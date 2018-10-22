<?php

namespace App\Http\Controllers;

use KKiernan\CaesarCipher;
class CipherController extends Controller

{
    //
    public function index()
    {
        return view('welcome');
    }

    // put up  a form to get the info to encode.
    public function encodeCipher()
    {
        return view('caesarEncode');
    }

    public function decodeCipher()
    {
        return view('caesarDecode');
    }

    public function neutralizeShiftDirection()
    {
        return 'If the direction is left take the shift length and subtract it from 26 and return the results';
    }

}
