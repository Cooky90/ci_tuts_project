<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Model
{
	//db table
	public $table_name = 'users';

	//primary key
	public $primary_key = 'id';

	//filter
	public $primaryFilter = 'intval';

	//Order by field
	public $order_by = '';

	public function __construct()
	{
		parent::__construct();
	}
}