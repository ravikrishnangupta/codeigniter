<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');class Changepassword extends CI_Controller {function index() {   $this->load->library('form_validation');   $this->form_validation->set_rules('password', 'Password', 'trim|min_length[5]|max_length[12]|required|matches[cpassword]|md5');   $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');   if($this->form_validation->run() == FALSE)   {     $session_data = $this->session->userdata('logged_in');     $data['username'] = $session_data['username'];     $this->load->helper(array('form'));     $this->load->view('admin_header');     $this->load->view('change_password');     $this->load->view('admin_footer');   }   else   {    $data = array(	    'password' => md5($_REQUEST['password'])	 );	 $this->db->update('users', $data);         redirect('login', 'refresh');   } }}?>