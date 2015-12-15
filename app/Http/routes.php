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
			Route::post('/pay',['as'=>'api.v1.billpayment.pay','uses'=>'\Rahasi\Http\Controllers\Api\BillPaymentApiController@store']);
		});
	});

});