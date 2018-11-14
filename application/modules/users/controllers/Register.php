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
        $this->load->model('User');
    }

    public function index()
    {
        $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('confirm_password', 'Re-enter Password', 'trim|required|min_length[2]|matches[password]');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');

        $this->form_validation->set_message('is_unique', 'The Email you are trying to register is already in use.');
        if($this->form_validation->run() === FALSE)
        {
        $data['title'] = 'Register';
        $data['module'] = 'users';
        $data['view_file'] = 'register';
        echo Modules::run('templates/default_layout', $data);
        }
        else
        {
            $email = $this->input->post['email'];
            $firstname = $this->input->post['firstname'];
            $lastname = $this->input->post['lastname'];
            $password = $this->input->post['password'];
            $gender = $this->input->post['gender'];

            if($gender === 'male')
            {
                $profile_pic = 'male.png';
            }
            else
            {
                $profile_pic = 'female.png';
            }
            // hash password
            $this->load->library('bcrypt');
            $hash = $this->bcrypt->hash_password($password);

            $userData = array(
                'email' => $email,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'password' => $hash,
                'profile_pic' => $profile_pic,
                'gender' => $gender
            );
            //saved in db if id returned
            $data['insert'] = $this->user->save($userData);

            if(!empty($data['insert']))
            {
                $this->session->set_flashdata('UserRegistered', 'You have registered successfully. Please log in.');
                redirect('login');
            }
        }
    }
}
