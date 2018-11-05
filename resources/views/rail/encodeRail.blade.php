@extends ('layouts.master')

@section('content')


    <h2> Rail Fence Cipher Encode</h2>
    <img src="http://cdncontribute.geeksforgeeks.org/wp-content/uploads/Untitled1.jpg"
         alt="Rail Cipher"
         id="ccimage">
    <h4 id="ccimagetext">In the Rail Fence Cipher, the plain-text is written downwards and diagonally on successive rails of an imaginary fence. When we reach the bottom rail, we traverse upwards moving diagonally, after reaching the top rail, the direction is changed again. Thus the alphabets of the message are written in a zig-zag manner. After each alphabet has been written, the individual rows are are combined to obtain the cipher-text.</h4>
    @if($textToEncode)
        <p class="text-left ">
            <small>The encoded text for the string: <span class='result'>{{$textToEncode}}</span>
                   is: <span class='result'>{{$ciphertext}}</span>
        </p>
    @endif
    <!-- error form -->
    @if(count($errors) > 0)
        <div class='alert alert-warning'>
            Please correct the errors below to submit the form
        </div>
    @endif

    <!-- form to get the parameters to encode by-->
    <form method='GET' action='/rail/encode-process'>
        <div class='container bg-light text-left'>
            <div class="form-group">
                <label> Enter text to encode: <span class='require'> *Required </span>
                    <textarea class="form-control"
                              rows="3"
                              name="textToEncode"
                              cols=60
                    >{{old('textToEncode')}}</textarea>
                </label>
                @include('modules.fielderrormsg', ['field' => 'textToEncode'])
            </div>
            <div class="form-group">
                <label for='railsLength'> Number of Rails:
                    <input type='number' name='railsLength' min="1" max="10" id='railsLength'
                           value='{{old("railsLength",3)}}'><span class='require'> *Required Min 1 Max 10 </span>

                    @include('modules.fielderrormsg', ['field' => 'shiftLength'])
                </label>
            </div>
            <input type='submit'
                   class="btn btn-primary"
                   id='theButton'
                   value='Encode'>
        </div>
    </form>

@endsection