<?php

namespace Rahasi\Http\Controllers\Api;

use Illuminate\Http\Request;
use Rahasi\Jobs\BillPaymentJob;
use Rahasi\Http\Requests;
use Rahasi\Http\Requests\BillPaymentRequest;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Rahasi\Transformers\BillPaymentTransformer;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use EllipseSynergie\ApiResponse\Laravel\Response;

class BillPaymentApiController extends ApiGuardController
{
    use DispatchesJobs;
    public $data;
	function __construct(Response $response) 
    {
        $this->response = $response;
        
	$this->data  = [
             'msisdn'=>'250726044221',
             'company_id'=>'ELECT',
             'reference'=>'04223731771',
             'amount'=>100,
             'api_key_id'=>'8aaf19d386b3277451fbfd2c8f3b3422d6346d69',
             '_token' =>csrf_token(),
             ];	
	}

    public function all()
    {
        return $this->data;
        return $this->response->withCollection($this->data, new BillPaymentTransformer);
    }

    public function show()
    {
        try {

            return $this->response->withItem($this->data, new BillPaymentTransformer);

        } catch (ModelNotFoundException $e) {

            return $this->response->errorNotFound();

        }
    }


    public function store(BillPaymentRequest $request)
    {
       $data = [
             'msisdn'=>'250726044221',
             'company_id'=>'ELECT',
             'reference'=>'04223731771',
             'amount'=>100,
             'api_key_id'=>'8aaf19d386b3277451fbfd2c8f3b3422d6346d69',
             '_token' =>csrf_token(),
             ];

       $data = (object) $this->data;
       $this->dispatch(new BillPaymentJob($data));

       return $this->data;

    }
}
