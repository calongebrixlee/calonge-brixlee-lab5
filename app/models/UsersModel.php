<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Laboratory Exercise No. 4 - Part E: Model
|--------------------------------------------------------------------------
| UsersModel represents the "users" table created in Part B.
| It extends LavaLust's base Model class, which already provides
| ORM-style helper methods such as all(), find(), insert(), update(),
| and delete() once $table (and $primary_key) are set.
*/

class UsersModel extends Model {

	protected $table = 'users';
	protected $primary_key = 'id';

	/**
	 * Retrieve all user records from the users table.
	 *
	 * @return array
	 */
	public function get_all_users()
	{
		return $this->all();
	}

	/**
	 * Retrieve a single user by id.
	 *
	 * @param int $id
	 * @return object|null
	 */
	public function get_user($id)
	{
		return $this->find($id);
	}
}
?>
