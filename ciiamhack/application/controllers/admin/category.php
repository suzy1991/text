<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller
{


    public function index()
    {
        //载入默认添加分类的管理
        $this->load->view('admin/add_article_category.html');
    }

    public function add_category()
    {

        $this->load->model('category_model', 'category');
        $data['category'] = $this->category->get_category();

        //载入默认添加分类的管理
        $this->load->view('admin/add_article_category.html', $data);
    }


    public function add_cate()
    {
        $data = array(
            'cate_name' => $this->input->post('cat_name'),
            'cate_alias' => $this->input->post('unique_id'),
            'cate_super' => $this->input->post('parent_id'),
            'cate_key' => $this->input->post('keywords'),
            'cate_describe' => $this->input->post('description')
        );

        $this->load->model('category_model', 'cate');
        $this->cate->add_category($data);
        success('admin/category/add_category', '添加成功');
    }

    public function check_category_list()
    {
        //查看分类类别的数据
        $this->load->model('category_model', 'cate');
        $data_cate['category_list'] = $this->cate->check_category_model();
        $this->load->view('admin/article_category.html', $data_cate);
    }

    public function con_edit_category()
    {
        $cid = $this->uri->segment(4);
        //需要根据ID查询结果，然后赋值到下一个html中
        $cate_data = array(
            'id' => $cid
        );
        $this->load->model('category_model', 'cate');
        $cate_return['category'] = $this->cate->model_check_category_where($cate_data);

        $this->load->view('admin/edit_article_category.html', $cate_return);//载入编辑分类的view
    }

    public function del_category()
    {
        $cid = $this->uri->segment(4);
        $this->load->model('category_model', 'cate');
        $this->cate->del_category($cid);
        success('admin/category/check_category_list', '删除成功');
    }

    public function con_update_category()
    {
        $cid = $this->input->post('cid');
        $data = array(
            'cate_name' => $this->input->post('cat_name'),
            'cate_alias' => $this->input->post('unique_id'),
            'cate_super' => $this->input->post('parent_id'),
            'cate_key' => $this->input->post('keywords'),
            'cate_describe' => $this->input->post('description')
        );
        $this->load->model('category_model', 'cate');
        $this->cate->model_update_category($cid, $data);
        success('admin/category/check_category_list', '修改成功');
    }
}