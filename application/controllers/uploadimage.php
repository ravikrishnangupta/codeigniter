<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class uploadimage extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		  $config['upload_path'] = './images/uploads';
          $config['allowed_types'] = 'gif|jpg|png';
          $this->load->library('upload', $config);
          $field_name = 'file';
          $this->upload->do_upload($field_name);
          $thumb=$this->upload->data();
          $response = new StdClass;
          $response->link = base_url()."images/uploads/".$thumb['file_name'];
          echo stripslashes(json_encode($response));
	}
}
