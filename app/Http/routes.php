<?php
Route::get('/',['as'=>'home',function () {
    $title = 'home';
    return view('layouts.default',compact('title'));
}]);

/** NAVIGATION SECTIONS */
Route::get('/dashboard',['as'=>'dashboard','uses'=>'DashboardController@index']);
Route::get('/customers',['as'=>'customers','uses'=>'CustomersController@index']);
Route::get('/payments' ,['as'=>'payments','uses'=>'PaymentsController@index']);
Route::get('/transfers',['as'=>'transfers','uses'=>'TransfersController@index']);
Route::get('/balance'  ,['as'=>'balance','uses'=>'BalanceController@index']);
Route::get('/logs'     ,['as'=>'logs','uses'=>'LogsController@index']);
Route::get('/settings' ,['as'=>'settings','uses'=>'SettingsController@index']);

/** API SECTION */
Route::group(['prefix'=>'api'],function()
{

	/** API VERSION 1 */
	Route::group(['prefix'=>'v1'],function()
	{
		/** BILL PAYMENT API */
	    Route::group(['prefix'=>'billpayment'],function()
		{
			/** bill payment index */
			Route::get('/',['as'=>'api.v1.billpayment.index','uses'=>'\Rahasi\Http\Controllers\Api\BillPaymentApiController@show']);

			/** Bill payment pay */
			Route::any('/pay',['as'=>'api.v1.billpayment.pay','uses'=>'\Rahasi\Http\Controllers\Api\BillPaymentApiController@store']);
		});
	});

});



$router->get('/test',function()
	{

		$response ='
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v1="http://xmlns.tigo.com/GetPurchaseStatusRequest/V1" xmlns:v3="http://xmlns.tigo.com/RequestHeader/V3" xmlns:v2="http://xmlns.tigo.com/ParameterType/V2" xmlns:cor="http://soa.mic.co.af/coredata_1">
   <soapenv:Header xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
      <cor:debugFlag>true</cor:debugFlag>
      <wsse:Security>
         <wsse:UsernameToken>
            <wsse:Username>xxxx</wsse:Username>
            <wsse:Password>xxxx</wsse:Password>
         </wsse:UsernameToken>
      </wsse:Security>
   </soapenv:Header>
   <soapenv:Body>
      <v1:GetPurchaseStatusRequest>
         <v3:RequestHeader>
            <v3:GeneralConsumerInformation>
               <v3:consumerID>XXXXX</v3:consumerID>
               <!--Optional:-->
               <v3:transactionID>56488</v3:transactionID>
               <v3:country>RWA</v3:country>
               <v3:correlationID>56488</v3:correlationID>
            </v3:GeneralConsumerInformation>
         </v3:RequestHeader>
         <v1:requestBody>
            <v1:initiatorAccount>
               <!--You have a CHOICE of the next 2 items at this level-->
              <v1:msisdn>250726049698</v1:msisdn>             
            </v1:initiatorAccount>
            <v1:password>1515</v1:password>
            <v1:transactionId>85300</v1:transactionId>  //RequestId
           
         </v1:requestBody>
      </v1:GetPurchaseStatusRequest>
   </soapenv:Body>
</soapenv:Envelope>';

   $xml = $response;//file_get_contents($response);

// SimpleXML seems to have problems with the colon ":" in the <xxx:yyy> response tags, so take them out 
$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
$xml = simplexml_load_string($xml);
$json = json_encode($xml);
$responseArray = json_decode($json,true);
$collections = new Illuminate\Support\Collection($responseArray);

$responseBody = $collections->get('soapenvBody');

dd(key( $responseBody));
    dd($xml,$json,$responseArray,$collections->get('soapenvBody'));
	});