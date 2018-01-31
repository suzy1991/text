<?php
/**
 * Created by mac.
 * User: mac
 * Date: 2018/1/27
 * Time: 上午10:31
 */

class Article_model extends CI_Model
{
    public function add_article($data)
    {
        $this->db->insert('tab_article', $data);
    }

    public function index()
    {
        $this->load->library('pagination');
        $perpage = 3;
        $config['base_url'] = site_url('admin/article/index');
        $config['total_rows'] = $this->db->count_all_results('tab_category');
        $config['per_page'] = $perpage;
        $config['uri_segment'] = 4;
        $config['first_link'] = '第一页';
        $config['last_link'] = '最后一页';
        $config['prev_link'] = '上一页';
        $config['next_link'] = '下一页';
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links(); //创建一个分页的连接
        $offset = $this->uri->segment(4);
        $this->db->limit($perpage, $offset);
        return $data;
    }

    public function article_list()
    {
        $data = $this->db->get('tab_article')->result_array();
        return $data;
    }

    public function model_check_article() {
        $data = $this->db->get('tab_article')->result_array() ;
        return $data ;
    }

    public function page_links(){
        $this->load->library('pagination');
        $perpage = 3;
        $config['base_url'] = site_url('admin/article_list.html');
        $config['total_rows'] = $this->db->count_all_results('tab_article');
        $config['per_page'] = $perpage;
        $config['uri_segment'] = 4;
        $config['first_link'] = '第一页';
        $config['last_link'] = '最后一页';
        $config['prev_link'] = '上一页';
        $config['next_link'] = '下一页';
        $this->pagination->initialize($config);
        $data = $this->pagination->create_links(); //创建一个分页的连接
        // $offset = $this->uri->segment(4);
        // $data['list'] = $this->db->limit($perpage, $offset);
        return $data;
    }

    public function model_check_article_where($data){
        $data = $this->db->get_where('tab_article',$data)->result_array() ;
        return $data ;
    }

    public function del_article($id) {
        $this->db->delete('tab_article',array('id'=>$id));
    }

}