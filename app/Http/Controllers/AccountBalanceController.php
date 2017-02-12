<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flutterwave\Banks;
use Flutterwave\Flutterwave;

class AccountBalanceController extends Controller
{
    //


public function index(){
$merchantKey = ""; //can be found on flutterwave dev portal
$apiKey = ""; //can be found on flutterwave dev portal
$env = "staging"; //this can be production when ready for deployment
Flutterwave::setMerchantCredentials($merchantKey, $apiKey, $env);
	$result = Banks::allbanks();
}
}
