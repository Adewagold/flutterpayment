@extends('layout.dashboard')

@section('chart')
<div class="row">
<div class="col-md-4 col-md-offset-4 ">
  <div class="panel panel-default">
  	<div class="panel-heading">
                    <h3 class="panel-title">
                        Make Payment
                    </h3>
                   </div>
	<form action="{{route('bank.card')}}" method="POST">
	<div class="form-group"> 
<input type="text" name="amount" placeholder="Enter Amount" class="form-control">
	</div>
	
	<div class="form-group"> 
	<div class="input-group">
<input type="text" name="cardno" placeholder="Card 16 digits Number" class="form-control">
	<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span></div> 
	</div>

	<div class="row"> 
		
		<div class="col-xs-4 col-lg-4">
		<div class="form-group">
		<input type="text" name="expirymonth" placeholder="MM" class="form-control">
		</div></div>
		<div class="col-xs-4 col-lg-4">
		<div class="form-group">
		<input type="text" name="expiryyear" placeholder="YY" class="form-control">
		</div></div>
		<div class="col-xs-4 col-md-4">
		<div class="form-group">
		<input type="text" name="cvv" placeholder="CVV" class="form-control">
		</div>
		</div>
		</div>
		{{csrf_field()}}
		</div>	
		<button type="submit" class="btn btn-primary pull-right">Make Payent</button>
	</form>
	</div>
</div>	 
</div>
<div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Payment Form <small>Click here to make payment</small></h5>
                            
                        </div>
                        <div class="ibox-content">
                            <div class="text-center">
                            <a data-toggle="modal" class="btn btn-primary" href="#modal-form">Form in simple modal box</a>
                            </div>
                            <div id="modal-form" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-6 b-r">

                                                    <div class="row">

  <div class="panel panel-default">
  	<div class="panel-heading">
                    <h3 class="panel-title">
                        Make Payment
                    </h3>
                   </div>
	<form action="{{route('bank.card')}}" method="POST">
	<div class="form-group"> 
<input type="text" name="amount" placeholder="Enter Amount" class="form-control">
	</div>
	
	<div class="form-group"> 
	<div class="input-group">
<input type="text" name="cardno" placeholder="Card 16 digits Number" class="form-control">
	<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span></div> 
	</div>

	<div class="row"> 
		
		<div class="col-xs-4 col-lg-4">
		<div class="form-group">
		<input type="text" name="expirymonth" placeholder="MM" class="form-control">
		</div></div>
		<div class="col-xs-4 col-lg-4">
		<div class="form-group">
		<input type="text" name="expiryyear" placeholder="YY" class="form-control">
		</div></div>
		<div class="col-xs-4 col-md-4">
		<div class="form-group">
		<input type="text" name="cvv" placeholder="CVV" class="form-control">
		</div>
		</div>
		</div>
		{{csrf_field()}}
		</div>	
		<button type="submit" class="btn btn-primary pull-right">Make Payent</button>
	</form>
	</div>
</div>	 

                                                </div>
                                                <div class="col-sm-6"><h4>Not a member?</h4>
                                                    <p>You can create an account:</p>
                                                    <p class="text-center">
                                                        <a href=""><i class="fa fa-sign-in big-icon"></i></a>
                                                    </p>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection