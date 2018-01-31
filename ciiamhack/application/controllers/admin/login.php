<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
		$this->load->view('admin/login.html') ;
	}


	public function login_in () {
		$username = $this->input->post('username') ;
		$password= $this->input->post('password') ;
		$this->load->model('login_model','login') ;
		$user_return = $this->login->check_password($username);
                            
		//判断用户输入的密码和数据库的密码是一直
		$password = md5($password);
		$password_db = $user_return[0]['userpwd'] ;		
		if  ($password != $password_db) error('登录信息错误信息') ;

		//登录信息写入session
                           $sessionData = array (
                            'username' =>$username ,
                            'uid' =>$user_return[0]['uid'],
                            'login_time' =>time() 
                           	);
                            $this->session->set_userdata($sessionData);

                            //$data = $this->session->userdata('username') ;
                            //载入后台首页的视图
                            success('admin/admin/index','登录成功') ;
		
	}


	public function login_out() {
		//销毁session
		$this->session->sess_destroy() ;
		success('admin/login/index','退出成功') ;
	}
}