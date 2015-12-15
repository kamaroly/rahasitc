<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',['as'=>'home','uses'=> function () {
    return view('welcome');
}]);


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
		$salt = sha1(time() . mt_rand());
        $newKey = sha1(time() . mt_rand()); //substr($salt, 0, 40);
		dd(strlen($salt),strlen($newKey),strlen(hash("sha256",time())),strlen('ch_17ICxf2eZvKYlo2CGYTb9FAZ'));
	});