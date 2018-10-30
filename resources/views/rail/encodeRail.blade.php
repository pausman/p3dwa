@extends ('layouts.master')

@section('content')


    <h2> Rail Fence Cipher Encode</h2>
    <img src="http://cdncontribute.geeksforgeeks.org/wp-content/uploads/Untitled1.jpg"
         id="ccimage">
    <h4 id="ccimagetext">In the Rail Fence Cipher, the plain-text is written downwards and diagonally on successive rails of an imaginary fence. When we reach the bottom rail, we traverse upwards moving diagonally, after reaching the top rail, the direction is changed again. Thus the alphabets of the message are written in a zig-zag manner. After each alphabet has been written, the individual rows are are combined to obtain the cipher-text.</h4>
    @if($textToEncode)
        <p class="text-left ">
            <small><strong>The encoded text is:</strong> <em>{{$ciphertext}}</em>
        </p>
    @endif


    <!-- form to get the parameters to encode by-->
    <form method='GET' action='/caesar/encode-process'>
        <div class='container bg-light text-left'>
            <div class="form-group">
                <label> Enter text to encode:
                    <textarea class="form-control"
                              rows="3"
                              name="textToEncode"
                              cols=60
                    >{{ old('textToEncode') }}</textarea>
                </label>
                @include('modules.fielderrormsg', ['field' => 'textToEncode'])
            </div>
            <div class="form-group">
                <label for='numberOfRails'> Number of Rails:
                    <input type='number' name='numberOfRails' min="1" max="25"
                           value='{{ old('numberOfRails') }}'>
                    @include('modules.fielderrormsg', ['field' => 'numberOfRails'])
                </label>
            </div>
            <input type='submit'
                   class="btn btn-primary"
                   id='theButton'
                   value='Encode'>
        </div>
    </form>
    <!-- error message -->
    @if(count($errors) > 0)
        <div class='alert alert-danger text-left'>
            Please correct the errors to submit the form
        </div>
    @endif
@endsection