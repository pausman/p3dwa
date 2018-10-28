@extends ('layouts.master')

@section('content')


    <h2> Caesar Cipher Encode</h2>
    <img src=" https://ds055uzetaobb.cloudfront.net/image_optimizer/6330426389f23393bd38350e7e3d12a803f640e0.png"
         id="ccimage">
    <h4 id="ccimagetext">A Caesar Cipher replaces each plaintext letter with a different one a fixed number of places up or down the alphabet.The cipher illustrated above uses a right shift of three, so that each occurrence of E in the plaintext becomes B in the ciphertext</h4>
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
                <label for='shiftLength'> Shift length:
                    <input type='number' required name='shiftLength' min="1" max="26"
                           value='{{ old('shiftLength','2') }}'>
                    @include('modules.fielderrormsg', ['field' => 'shiftLength'])
                </label>
            </div>
            <div class="form-group">
                <label class="form-check-label" for='checkbox'> Shift direction:</label>
                <br>
                <input type="radio"
                       name="shiftDirection"
                       value="right" {{ (old('shiftDirection') == 'right') ? 'checked' : '' }} > Rotate Right or Up<br>
                <input type="radio"
                       name="shiftDirection"
                       value="left" {{ (old('shiftDirection') == 'left') ? 'checked' : '' }}> Rotate Left or Down<br>
                @include('modules.fielderrormsg', ['field' => 'shiftDirection'])
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