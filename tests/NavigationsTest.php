<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NavigationsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDashboard()
    {
        $this->visit('/dashboard')->see('dashboard');
    }

    public function testCustomers()
    {
    	$this->visit('/customers')->see('customers');
    }

    public function testPayments()
    {
    	$this->visit('/payments')->see('payments');
    }

    public function testTransfers()
    {
    	$this->visit('/transfers')->see('transfers');
    }

    public function testBalance()
    {
    	$this->visit('/balance')->see('balance');
    }

    public function testLogs()
    {
    	$this->visit('/logs')->see('logs');
    }

    public function testSettings()
    {
        $this->visit('/settings')->see('settings');
    }

}
