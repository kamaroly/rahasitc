<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BillPaymentTest extends TestCase
{
    /**
     * A basic test example to visit rahasi mfs bill payment.
     *
     * @return void
     */
    public function testVisitBillPayment()
    {
        $this->visit('/api/v1/billpayment')
        	 ->see('04223731771');
    }

    /**
     * Testing paying with bill payment 
     * 
     * api
     * @return void
     */
    public function testPayUsingBillPayment()
    {
        $data = [
                     'msisdn'=>'250726044221',
                     'company_id'=>'ELECT',
                     'reference'=>'04223731771',
                     'amount'=>100,
                     'api_key_id'=>'8aaf19d386b3277451fbfd2c8f3b3422d6346d69',
                     '_token' =>csrf_token(),
                     ];
        $this->makeRequest('post','/api/v1/billpayment/pay',$data)
             ->see('msisdn');
    }
}
