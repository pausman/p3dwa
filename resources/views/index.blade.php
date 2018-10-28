@extends ('layouts.master')

@section('content')
    <h2>Caesar Cipher</h2>
    <p> The Caesar Cipher, also known as a shift cipher, is one of the oldest and simplest forms of encrypting a message. It is a type of substitution cipher where each letter in the original message is replaced with a letter corresponding to a certain number of letters shifted up or down in the alphabet. Any non alphabetic characters are not changed.</p>
    <a href='/caesar/encodeCipher' class="btn btn-primary btn-lg" >Encode with Caesar Cipher</a>

<h2> Rail-Fence Cipher</h2>
    <p>The railfence cipher is a very simple, easy to crack cipher. It is a transposition cipher that follows a simple rule for mixing up the characters in the plaintext to form the ciphertext. The railfence cipher offers essentially no communication security, and it will be shown that it can be easily broken even by hand.</p>
    <a href='/rail/encodeRail' class="btn btn-primary btn-lg" >Encode with Rail-Fence Cipher</a>

@endsection
