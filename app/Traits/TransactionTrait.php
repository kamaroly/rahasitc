<?php 
namespace Rahasi\Traits;


trait TransactionTrait
{
	 /**
     * A sure method to generate a unique API key
     *
     * @return string
     */
    public function generateId($type='ch')
    {
    	$newKey = $type.'_'.hash("sha256",time());
        return $newKey;
    }

}
 ?>
