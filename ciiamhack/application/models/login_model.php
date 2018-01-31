<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function check_password($username) {
		$data = $this->db->get_where('tab_login',array('username'=>$username))->result_array() ;
		return $data;
	}
}