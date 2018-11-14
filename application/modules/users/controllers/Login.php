<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: ashley
 * Date: 13/11/2018
 * Time: 12:31
 */

class Login extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User');
    }

    public function index()
    {
    	$data['title'] = 'Login';
        $data['module'] = 'users';
        $data['view_file'] = 'login';
        echo Modules::run('templates/default_layout', $data);
    }

}