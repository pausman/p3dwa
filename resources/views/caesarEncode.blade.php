@extends ('layouts.master')

@section('content')
    <h2> Caesar Cipher Encode</h2>


    <!-- form to get the parameters to encode by-->
    <form method='GET' action='cipher.php'>
        <div class='container bg-light'>

            <div class="form-group">
                <label> Enter text to encode:
                    <textarea class="form-control"
                              rows="3"
                              name="textToEncode"
                              required
                              cols=60
                    ><?= isset($textToEncode) ?
                            sanitize($textToEncode) : 'Plain Text' ?></textarea>
                </label>
            </div>

            <div class="form-group">
                <label for='shiftLength'> Shift length:
                    <input type='number' required name='shiftLength' min="1" max="26"
                           value= <?= isset($shiftLength) ? $shiftLength : '2' ?>>
                </label>
            </div>

            <div class="checkbox">
                <label class="form-check-label"> Shift direction:</label>
            </div>

            <div class="checkbox">
                <input type="radio" name="shiftDirection" value="right"
                <?= (!isset($shiftDirection) or $shiftDirection == 'right') ?
                    'checked' : '' ?>> Rotate Right or Up<br>
                <input type="radio" name="shiftDirection" value="left"
                <?= (isset($shiftDirection) && $shiftDirection == 'left') ?
                    'checked' : '' ?>> Rotate Left or Down<br>
            </div>

            <input type='submit'
                   class="btn btn-primary"
                   id='theButton'
                   value='Encode'>

        </div>
    </form>

@endsection
