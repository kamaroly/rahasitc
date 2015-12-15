<?php

namespace Rahasi\Jobs;

use Rahasi\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

class BillPaymentJob extends Job implements SelfHandling
{

    use InteractsWithQueue, SerializesModels;
    /**  @var msisdn */
    public $msisdn;

    /**  @var company_id */
    public $company_id;

    /**  @var reference */
    public $reference;

    /**  @var amount */
    public $amount;

    /**  @var api_key_id */
    public $api_key_id;

    /**  @var _token */
    public $_token;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($command)
    {
        $this->msisdn           = $command->msisdn;                        
        $this->company_id       = $command->company_id;                        
        $this->reference        = $command->reference;                            
        $this->amount           = $command->amount;
        $this->api_key_id       = $command->api_key_id;
        $this->_token           = $command->_token;                                        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return $this->msisdn;
    }
}
