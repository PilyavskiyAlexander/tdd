@if(count($errors))
    <div class="col-xs-6 col-xs-offset-3">
        <div class="form-group">
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif