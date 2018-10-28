@extends ('layouts.master')

@section('content')
    <h2>Caesar Cipher</h2>
    <p> The Caesar Cipher, also known as a shift cipher, is one of the oldest and simplest forms of encrypting a message. It is a type of substitution cipher where each letter in the original message is replaced with a letter corresponding to a certain number of letters shifted up or down in the alphabet. Any non alphabetic characters are not changed.</p>
    <a href='/caesar/encodeCipher' class="btn btn-primary btn-lg" >Encode Plaintext</a>
    <a href='/decodeCipher' class="btn btn-primary btn-lg" >Decode Ciphertext</a>

@endsection
