<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Laboratory Exercise No. 4 - Part F & G: Controller
|--------------------------------------------------------------------------
| UsersController loads UsersModel, retrieves every record with all(),
| and passes the result to the users view.
|
| Flow: UsersController -> UsersModel::all() -> $users -> View
*/

class UsersController extends Controller {

	public function __construct()
	{
		parent::__construct();
		$this->call->model('UsersModel');
	}

	/**
	 * GET /users
	 * Retrieves all users and displays them in the view.
	 */
	public function index()
	{
		// 1. Call UsersModel, 2. execute all(), 3. store the records
		$data['users'] = $this->UsersModel->get_all_users();

		// 4 & 5. pass the records to the view and load it
		$this->call->view('users/index', $data);
	}
}
?>
