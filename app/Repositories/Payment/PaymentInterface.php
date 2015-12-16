<?php 

namespace  Rahasi\Repositories\Payment;

interface PaymentRepositoryInterface
{	
	/**
	 * Get all payments
	 * @return Eloquent Object
	 */
	public function all();

	/**
	 * Find payment based on the id		
	 * @param  $id 
	 * @return Eloqunet object     
	 */
	public function find($id);
	/**
	 * Store data into payment table		
	 * @param  array  $data
	 * @return new created id
	 */
	public function store(array $data);

	/**
	 * Update payment that is aread in the database
	 * @param  numeric $id  id of the record
	 * @param  array  $data data to update
	 * @return updated eloquent object
	 */
	public function update($id,array $data);

	/**
	 * Remove data from the payment
	 * @param  $id 
	 * @return id of the deleted object
	 */
	public function delete($id);
}
