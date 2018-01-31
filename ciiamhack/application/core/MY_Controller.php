<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller  extends CI_Controller {

	public function __construct() {
		parent::  __construct() ;
		$username_session = $this->session->userdata('username') ;
		$uid_session = $this->session->userdata('id') ;

		if (! $username_session || !$uid_session) {
			redirect('admin/login/index') ;
		}

	}


}

