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
        $cipher = new CaesarCipher();
        $ciphertext = $cipher->encrypt('This is a plain text message that will be encrypted!', 8);
        dump($ciphertext);
    }

    public function decodeCipher()
    {
        $cipher = new CaesarCipher();
        $ciphertext = $cipher->encrypt('This is a plain text message that will be encrypted!', 8);
        dump($ciphertext);
        $plaintext = $cipher->decrypt($ciphertext, 8);
        dump($plaintext);
    }

    public function neutralizeShiftDirection()
    {
        return 'If the direction is left take the shift length and subtract it from 26 and return the results';
    }

}
