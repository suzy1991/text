<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {


public function get_category() {
	$data = $this->db->get('tab_category')->result_array() ;
              return $data ;
}

public function add_category($data) { 

	$this->db->insert('tab_category' , $data) ;
}

public function check_category_model() {
	$data = $this->db->get('tab_category')->result_array() ;
	return $data ;
}

public function model_check_category_where($data) {
	$data = $this->db->get_where('tab_category',$data)->result_array() ;
	return $data ;
} 

public function model_update_category($id,$data) {
	$this->db->update('tab_category', $data, array('id'=>$id)) ;
}

public function del_category($id) {
	$this->db->delete('tab_category',array('id'=>$id));
}
}