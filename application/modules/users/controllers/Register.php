<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: ashley
 * Date: 13/11/2018
 * Time: 12:31
 */

class Register extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Register';
        $data['module'] = 'users';
        $data['view_file'] = 'register';
        echo Modules::run('templates/default_layout', $data);
    }
}
