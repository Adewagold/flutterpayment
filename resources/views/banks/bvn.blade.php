@extends('layout.dashboard')

@section('chart')

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Bank Verification Number
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="{{route('banks.bvn')}}" method="POST">
                    <div class="form-group">
                        <label for="cardNumber">
                            Enter your BVN</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="bvnNumber" name="bvnNumber" placeholder="Enter Bank Verification Number"
                                required autofocus />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                     <br/>
                    <button type="submit" class="btn btn-success">Verify BVN</button>
                    {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection