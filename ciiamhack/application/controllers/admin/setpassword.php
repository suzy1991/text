<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setpassword extends CI_Controller {


	public function set_password(){
		$data = str_enhtml($this->input->post(NULL,TRUE));
		if (is_array($data)&&count($data)>0) {
			$info['userpwd'] = md5($data['newPassword']);
			$info['mobile']  = $data['buyerMobile'];
			$info['name']    = $data['buyerName'];
			$this->mysql_model->get_count('tab_login','(uid<>'.$this->jxcsys['uid'].') and mobile='.$info['mobile'].'') >0 && str_alert(-1,'该手机号已被使用,请更换手机号码'); 
		    $sql = $this->mysql_model->update('tab_login',$info,'(uid='.$this->jxcsys['uid'].')');
			if ($sql) {
				$this->common_model->logs('密码修改成功 UID：'.$this->jxcsys['uid'].' 真实姓名改为：'.$info['name']);
				str_alert(200,'密码修改成功');
			}
			str_alert(-1,'设置独立密码失败，请稍候重试！');
		} else {
		    $data = $this->mysql_model->get_rows('tab_login','(uid='.$this->jxcsys['uid'].')');    
		    $this->load->view('set_password',$data);
		}
	}
	
	
	public function text(){
	$this->load->view('set_password');}
}