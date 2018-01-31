<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin  extends  MY_Controller {


	public function index () {
		//载入默认后台首页
		$this->load->view('admin/index.html') ;
	}

}