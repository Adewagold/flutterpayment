<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Flutterwave\Card;
use Flutterwave\Flutterwave;
use Flutterwave\AuthModel;
use Flutterwave\Currencies;
use Flutterwave\Countries;
use Flutterwave\FlutterEncrypt;
use Flutterwave\Bvn;
use Flutterwave\Banks;
use Flutterwave\Account;
use Flutterwave\AccessAccount;
//Use App\Http\Controllers\Banks;
use Session;
Use App\Cards;
//use App\Http\Controllers\Response;
class bankcontroller extends Controller
{
    //
   public $mainBvn;

    public function getBanks(){
	$merchantKey = "tk_unpRyzVWh3"; //can be found on flutterwave dev portal
    $apiKey = "tk_8DX4rjKWdiwPo5yH2gCE"; //can be found on flutterwave dev portal
    $env = "staging"; //this can be production when ready for deployment
    Flutterwave::setMerchantCredentials($merchantKey, $apiKey, $env);
    $bvn = "22173167292";

//$otpOption can either be SMS or VOICE
$result = Bvn::verify($bvn, Flutterwave::SMS); //this will send otp to the telephone used for the bvn registration
dd($result);
//$result is an instance of ApiResponse class which has
//methods like getResponseData(), getStatusCode(), getResponseCode(), isSuccessfulResponse()
if ($result->isSuccessfulResponse()) {
  echo("We have sent an otp to your bvn");
} else {
  echo("Your bvn is incorrect please check again");
  return;
}
    	$result = Banks::allBanks();
    	//dd($result);
        $resultresponse = $result->getResponseData();
        //dd($result->isSuccessfulResponse());
       // dd($resultresponse['data']);
    	return view ('banks.index', ['banks'=>$resultresponse['data']]);
    	//return Response::json(array($result));
    	//return ($result->isSuccessfulResponse());
    	//return response()->json($result [200][$headers]);
    }


public function getBvn(){
    return view('banks.bvn');
}
    public function postBvn(Request $request){

        
    $merchantKey = "tk_unpRyzVWh3"; //can be found on flutterwave dev portal
    $apiKey = "tk_8DX4rjKWdiwPo5yH2gCE"; //can be found on flutterwave dev portal
    $env = "staging"; 
    Flutterwave::setMerchantCredentials($merchantKey, $apiKey, $env);

    //testing account
    $accountNumber = "3040981690";
    $bankCode = "011";
    $resp = Account::enquiry($accountNumber, $bankCode);
    //dd($resp->getResponseData());
//$ref = "66736";
  //  $accountNum = "0921318712";
   // $otp = "12345";
    //$billingAmount = 1000;
    //$narration = "testing";

    //$resp = AccessAccount::validate($ref, $accountNum, $otp, $billingAmount, $narration);
    
    $accountNumber = "0161260434";
    $resp = AccessAccount::initiate($accountNumber);
   // $this->assertTrue($resp->isSuccessfulResponse());
    dd($resp->getResponseData());
    //
    	$bvn =$request->input('bvnNumber');
    	$result = Bvn::verify($bvn, Flutterwave::SMS);
        $data = $result->getResponseData();


    	if ($result->isSuccessfulResponse()) {
            $request->session()->put('bvn', $bvn);
            $request->session()->put('trf', $data['data']['transactionReference']);
            //dd($data['data']['transactionReference']); 
  			return redirect()->route('verify.otp');
            echo("We have sent an otp to your bvn");
}
	else {
		echo("Your bvn is incorrect please check again");
  		return redirect()->route('banks.bvn');
}
//return view($result->isSuccessfulResponse());
    }

public function getCard(){
    return view('banks.card');
}

public function postCard(Request $request){
    $merchantKey = "tk_unpRyzVWh3"; //can be found on flutterwave dev portal
    $apiKey = "tk_8DX4rjKWdiwPo5yH2gCE"; //can be found on flutterwave dev portal
    $env = "staging"; //this can be production when ready for deployment
    Flutterwave::setMerchantCredentials($merchantKey, $apiKey, $env);

    $this->validate($request,[
        'amount'=>'required'
        ]);

$card = [
  "card_no" => $request->input('cardno'),
  "cvv" => $request->input('cvv'),
  "expiry_month" => $request->input('expirymonth'),
  "expiry_year" => $request->input('expiryyear'),
  ];

$authModel = AuthModel::NOAUTH;
$validateOption = Flutterwave::SMS; //this tells flutterwave to send authentication otp via sms
$bvn = ""; //represents the bvn number of the card owner/user
$result = Card::tokenize($card, $authModel, $validateOption, $bvn = "");
//dd($result->getStatusCode());

if ($result->isSuccessfulResponse()) {
 // echo("Card was successfully tokenized");
    $card = [
  "card_no" => $request->input('cardno'),
  "cvv" => $request->input('cvv'),
  "expiry_month" => $request->input('expirymonth'),
  "expiry_year" => $request->input('expiryyear'),
  "card_type" => "" //optional parameter. only needed if card was issued by diamond card
];
$amount=$request->input('amount');
$custId = "76464"; //your users customer id
$currency = Currencies::NAIRA; //currency to charge the card
$authModel = AuthModel::NOAUTH;
$narration = "narration for this transaction";
$responseUrl = "{{route('bank.card')}}"; //callback url
$country = Countries::NIGERIA;
$response = Card::charge($card, $amount, $custId, $currency, $country, $authModel, $narration, $responseUrl);

//$transaction=($request,[
  //  'amount'=>$request->input('amount'),
    //'status'=>'Successful']);
//$transaction->save();
//return redirect()->route('bank.card');
}
else{
    echo("An error occured".$result->responseMessage());
}


}

public function getOTP(Request $request){
   $bvn=$request->session()->get('bvn');
    return view('verify.otp');
}

public function testEnquiry() {
    $accountNumber = "0921318712";
    $bankCode = "058";
    $resp = Account::enquiry($accountNumber, $bankCode);
    $this->assertTrue($resp->isSuccessfulResponse());
    dd($resp);
  }
    public function postOTP(Request $request){
    $merchantKey = "tk_unpRyzVWh3"; //can be found on flutterwave dev portal
    $apiKey = "tk_8DX4rjKWdiwPo5yH2gCE"; //can be found on flutterwave dev portal
    $env = "staging"; 
    Flutterwave::setMerchantCredentials($merchantKey, $apiKey, $env);
        $bvn=$request->session()->get('bvn');
        $trf=$request->session()->get('trf');
        $otp =$request->input('OTP');
        $result2 = Bvn::validate($bvn, $otp, $trf);
if ($result2->isSuccessfulResponse()) {
  echo("Thank you for verifying yourself");
  $details=$result2->getResponseData();
  dd($details['data']['firstName']);
}
 echo("Not found ");
//return view($result->isSuccessfulResponse());
    }

    public function getHomeBanks(){
    $merchantKey = "tk_unpRyzVWh3"; //can be found on flutterwave dev portal
    $apiKey = "tk_8DX4rjKWdiwPo5yH2gCE"; //can be found on flutterwave dev portal
    $env = "staging"; //this can be production when ready for deployment
    Flutterwave::setMerchantCredentials($merchantKey, $apiKey, $env);

    Flutterwave::setMerchantCredentials($merchantKey, $apiKey, $env);
    $bvn = "22173167292";

//$otpOption can either be SMS or VOICE
$result = Bvn::verify($bvn, Flutterwave::SMS); //this will send otp to the telephone used for the bvn registration
//dd($result);
//$result is an instance of ApiResponse class which has
//methods like getResponseData(), getStatusCode(), getResponseCode(), isSuccessfulResponse()
if ($result->isSuccessfulResponse()) {
  echo("We have sent an otp to your bvn");
} else {
  echo("Your bvn is incorrect please check again");
  return;
}
        $result = Banks::allBanks();
        //dd($result);
        $resultresponse = $result->getResponseData();
        //dd($result->isSuccessfulResponse());
        //dd($resultresponse['data']);
        return view ('home.index', ['banks'=>$resultresponse['data']]);
        //return Response::json(array($result));
        //return ($result->isSuccessfulResponse());
        //return response()->json($result [200][$headers]);
    }
}
