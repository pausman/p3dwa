@extends ('layouts.master')

@section('content')
    <h2> Caesar Cipher Encode</h2>


    <!-- form to get the parameters to encode by-->
    <form method='GET' action='cipher.php'>
        <div class='container bg-light'>

            <div class="form-group">
                <label> Enter text to decode:
                    <textarea class="form-control"
                              rows="3"
                              name="textToEncode"
                              required
                              cols=60
                    ><?= isset($textToEncode) ?
                            sanitize($textToEncode) : 'Cipher Text' ?></textarea>
                </label>
            </div>


            <input type='submit'
                   class="btn btn-primary"
                   id='theButton'
                   value='Decode'>

        </div>
    </form>

@endsection
