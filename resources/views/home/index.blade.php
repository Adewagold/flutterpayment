@extends('layout.frontend')
@section('title')
Fast Pay
@endsection
@section('styles')
<style>
div.book {
    box-shadow: 3px 3px 1px #888888;
    border: 1px solid #d9d9f2;
}
a.size {
font-size: x-large;
font-weight: bold;
}
h2{
	font-weight: bold;
}
</style>
@endsection

@section('contents')
<div class="row">


        <div class="col-sm-4 col-md-4 book" style="height:273px;">
            <h2 align="center">How It Works</h2>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
            <p align="center"><a class="navy-link size" href="#" role="button">Details &raquo;</a></p>
        </div>
        
        <div class="col-sm-4 col-md-3book">
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
        <div class="form-group">
            <div class="col-xs-4 col-md-4">
             <input type="text" name="account" placeholder="acct" class="form-control">   
            </div>
          <div class="col-xs-4 col-md-4">  
            <select name="Banks" class="form-control">
        @foreach($banks as $bank)   
  <option value="{{$bank}}">{{$bank}}</option>
    @endforeach
    </select>
    </div>
       
        {{csrf_field()}}
        </div>  
        <button type="submit" class="btn btn-primary pull-right">Make Payent</button>
        </form>
    </div>

</div>
    </div>
@endsection