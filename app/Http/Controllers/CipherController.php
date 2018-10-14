<?php

namespace App\Http\Controllers;

class CipherController extends Controller
{
    //
    public function index()
    {
        return 'Here is the main page of the app with the form';
    }

    // add the code from the Cipher Class from p2? will wait until next week
    public function encodeCipher()
    {
        return 'take the data from the form, encode it and send the result back';
    }

    public function neutralizeShiftDirection()
    {
        return 'If the direction is left take the shift length and subtract it from 26 and return the results';
    }

}
