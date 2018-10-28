<?php

namespace App\Http\Controllers;

use KKiernan\CaesarCipher;

class PracticeController extends Controller
{

    // from class notes
    public function practice1()
    {
        return ("practice 1");
    }

    public function practice2()
    {
        $cipher = new CaesarCipher();
        $ciphertext = $cipher->encrypt('This is a plain text message that will be encrypted!', 8);
        dump($ciphertext);
        $plaintext = $cipher->decrypt($ciphertext, 8);
        dump($plaintext);
    }

    public function practice3()
    {
        $railtext = "attack at dawn";
        $rtext = encodeRailCipher(3,$railtext);
        dump($rtext);
    }
    public function practice4()
    {
       $t = config('app.credit');
       dump($t);
    }
    public function index($n = null)
    {
        $methods = [];

        # If no specific practice is specified, show index of all available methods
        if (is_null($n)) {
            # Build an array of all methods in this class that start with `practice`
            foreach (get_class_methods($this) as $method) {
                if (strstr($method, 'practice')) {
                    $methods[] = $method;
                }
            }

            # Load the view and pass it the array of methods
            return view('practice')->with(['methods' => $methods]);
        } # Otherwise, load the requested method
        else {
            $method = 'practice' . $n;

            # Invoke the requested method if it exists; if not, throw a 404 error
            return (method_exists($this, $method)) ? $this->$method() : abort(404);
        }
    }
}
